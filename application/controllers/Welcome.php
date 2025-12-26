<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation'); 
    }

	public function index()
	{
		$data['content'] = 'home';
		$this->load->view('layout', $data);
	}

	public function register_form()
	{
		// ส่งไปที่ view
		$data['day_options']   = get_day_options();
		$data['month_options'] = get_month_options();
		$data['year_options']  = get_year_options(1980);

		// $this->output->clear_all_cache();
		// // ปิด browser cache
		// $this->output
		// ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
		// ->set_header("Cache-Control: post-check=0, pre-check=0", false)
		// ->set_header("Pragma: no-cache");

		$data['faculties'] = $this->Program_model->get_faculty();
		$data['content'] = 'register_form';
		$this->load->view('layout', $data);
	}

	public function get_program()
    {
        $fac_id = $this->input->post('fac_id');
        
        $programs = $this->Program_model->get_program_by_faculty($fac_id);

       	echo json_encode($programs); // ส่งกลับเป็น JSON
    }

	public function submit_registration()
	{
		$this->form_validation->set_rules('school_name', 'โรงเรียน/สถาบันเครือข่าย', 'trim|required');
		$this->form_validation->set_rules('school_province', 'จังหวัดของโรงเรียน', 'trim|required');

		$this->form_validation->set_rules('full_name', 'ชื่อผู้สมัคร', 'trim|required');

		$this->form_validation->set_rules('birth_day', 'วันเกิด', 'required');
		$this->form_validation->set_rules('birth_month', 'เดือนเกิด', 'required');
		$this->form_validation->set_rules('birth_year', 'ปีเกิด', 'required');

		$this->form_validation->set_rules('cid', 'เลขประจำตัวประชาชน', 'trim|required|exact_length[13]|numeric');

		$this->form_validation->set_rules('address_number', 'ที่อยู่ เลขที่', 'trim|required');
		$this->form_validation->set_rules('address_subdistrict', 'ตำบล/แขวง', 'trim|required');
		$this->form_validation->set_rules('address_district', 'อำเภอ/เขต', 'trim|required');
		$this->form_validation->set_rules('address_province', 'จังหวัด', 'trim|required');
		$this->form_validation->set_rules('address_zipcode', 'รหัสไปรษณีย์', 'trim|required|numeric');

		$this->form_validation->set_rules('phone', 'เบอร์โทรศัพท์', 'trim|required|numeric|min_length[9]|max_length[10]');

		$this->form_validation->set_rules('education_level', 'ระดับการศึกษา', 'required');
		$this->form_validation->set_rules('gpa', 'เกรดเฉลี่ยสะสม', 'trim|required|decimal'); // ถ้าเกรดเป็นทศนิยม

		$this->form_validation->set_rules('fac_id', 'คณะ', 'required');
		$this->form_validation->set_rules('pro_id', 'สาขาวิชา', 'required');

		// ---------- ถ้าตรวจสอบแล้วไม่ผ่าน ----------
		if ($this->form_validation->run() === FALSE) {

			// โหลดข้อมูลเดิมกลับไปให้ฟอร์ม
			$data['day_options']   = get_day_options();
			$data['month_options'] = get_month_options();
			$data['year_options']  = get_year_options(1980);
			$data['faculties']     = $this->Program_model->get_faculty();

			$data['content'] = 'register_form';
			$this->load->view('layout', $data); // แสดงฟอร์มเดิม พร้อม error
			return;
		}

		// ---------- ถ้าตรวจสอบผ่าน ค่อยบันทึก ----------
			$data = array(
				'school_name'          => $this->input->post('school_name'),
				'school_province'      => $this->input->post('school_province'),

				'full_name'            => $this->input->post('full_name'),
				'birth_day'            => $this->input->post('birth_day'),
				'birth_month'          => $this->input->post('birth_month'),
				'birth_year'           => $this->input->post('birth_year'),

				'cid'                  => $this->input->post('cid'),
				'ethnicity'            => $this->input->post('ethnicity'),
				'nationality'          => $this->input->post('nationality'),
				'religion'             => $this->input->post('religion'),

				'address_number'       => $this->input->post('address_number'),
				'address_moo'          => $this->input->post('address_moo'),
				'address_soi'          => $this->input->post('address_soi'),
				'address_road'         => $this->input->post('address_road'),
				'address_subdistrict'  => $this->input->post('address_subdistrict'),
				'address_district'     => $this->input->post('address_district'),
				'address_province'     => $this->input->post('address_province'),
				'address_zipcode'      => $this->input->post('address_zipcode'),
				'phone'                => $this->input->post('phone'),

				'education_level'      => $this->input->post('education_level'),
				'gpa'                  => $this->input->post('gpa'),

				'fac_id'               => $this->input->post('fac_id'),
				'pro_id'               => $this->input->post('pro_id'),

				'family_income'        => $this->input->post('family_income'),
				'special_ability'      => $this->input->post('special_ability'),
				'achievements'         => $this->input->post('achievements'),

				'created_at'           => date("Y-m-d H:i:s")
			);

			$insert = $this->db->insert('applicant', $data);
			$id = $this->db->insert_id();

			if ($insert) {

				redirect(base_url('index.php/welcome/register_upload_form/'.$id));

				// redirect(base_url('index.php/member/view/'.$id));

			} else {

				$this->session->set_flashdata('error', 'มีข้อผิดพลาด ไม่สามารถบันทึกข้อมูลได้');
				redirect(base_url('index.php/welcome/register'));
			}
	}

	public function register_upload_form($id)
	{	
		$id = $this->uri->segment(3);
		$applicant = $this->db
        ->where('id', $id)
        ->get('applicant')
        ->row();

		$data['applicant'] = $applicant;
		$data['content'] = 'register_upload_form';
		$this->load->view('layout', $data);

	}

	public function upload_success()
	{
		$data['content'] = 'upload_doc';
		$this->load->view('layout', $data);
	}

}
