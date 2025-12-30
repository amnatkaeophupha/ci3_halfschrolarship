<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');
		$this->load->model('Program_model');
		$this->load->model('Address_model'); 
	
    }

	public function index()
	{
		$data['applicants'] = $this->db
        ->select('a.*, p.pro_name')
        ->from('applicant AS a')
        ->join('program AS p', 'a.pro_id = p.pro_id', 'left')
        ->order_by('a.id', 'ASC')
        ->get()
        ->result();


		$data['content'] = 'home';
		$this->load->view('layout', $data);
	}

	public function register_form()
	{
		// ส่งไปที่ view
		$data['day_options']   = get_day_options();
		$data['month_options'] = get_month_options();
		$data['year_options']  = get_year_options(1980);

		  // โหลดข้อมูลจังหวัด
        $data['provinces'] = $this->Address_model->get_provinces();

		$data['content'] = 'register_form';
		$this->load->view('layout', $data);
	}

    // AJAX: ดึงอำเภอตามจังหวัด
    public function get_amphoe()
    {
        $province_code = $this->input->post('province_code');
        $amphoes = $this->Address_model->get_amphoe_by_province($province_code);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($amphoes);
    }

	 // AJAX: ดึงตำบล + zip ตามอำเภอ
    public function get_district()
    {
        $amphoe_code = $this->input->post('amphoe_code');
        $districts = $this->Address_model->get_district_by_amphoe($amphoe_code);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($districts);
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
;
		$this->form_validation->set_rules('address_subdistrict', 'ตำบล/แขวง', 'trim|required');
		$this->form_validation->set_rules('address_district', 'อำเภอ/เขต', 'trim|required');
		$this->form_validation->set_rules('address_province', 'จังหวัด', 'trim|required');

		$this->form_validation->set_rules('phone', 'เบอร์โทรศัพท์', 'trim|required|numeric|min_length[9]|max_length[10]');

		$this->form_validation->set_rules('education_level', 'ระดับการศึกษา', 'required');
		$this->form_validation->set_rules('gpa', 'เกรดเฉลี่ยสะสม', 'trim|required|decimal'); // ถ้าเกรดเป็นทศนิยม

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

		// --------------- ⭐ ตรวจเลขบัตรประชาชนซ้ำ ⭐ ------------------
		$cid = $this->input->post('cid');

		$exists = $this->db->where('cid', $cid)->get('applicant')->row();

		if ($exists) {
			$this->session->set_flashdata('error',
				'เลขบัตรประชาชนนี้ถูกใช้สมัครแล้ว กรุณาตรวจสอบข้อมูลของคุณ หรือใช้เลขบัตรที่ถูกต้อง'
			);

			redirect(base_url('index.php/welcome/register_form'));
			return;
		}
		// -------------------------------------------------------------


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

	public function register_upload_form()
	{	
		$id = $this->uri->segment(3);
		$applicant = $this->db
        ->where('id', $id)
        ->get('applicant')
        ->row();

		if (!$applicant) {
			$this->session->set_flashdata('error', 'ไม่พบผู้สมัครที่ระบุ');
			redirect(base_url('index.php/welcome'));
			return;
		}

		$data['applicant'] = $applicant;
		$data['content'] = 'register_upload_form';
		$this->load->view('layout', $data);

	}

	public function confirm_upload()
	{
		$id = $this->input->post('id');

		if (empty($id)) {
			$this->session->set_flashdata('error', 'ไม่พบรหัสผู้สมัคร');
			redirect('welcome/index');
			return;
		}

		// ดึงข้อมูลผู้สมัคร
		$applicant = $this->db->where('id', $id)->get('applicant')->row();

		if (!$applicant) {
			$this->session->set_flashdata('error', 'ไม่พบข้อมูลผู้สมัคร');
			redirect('welcome/index');
			return;
		}

		// ตรวจเอกสารครบไหม
		$has_cid        = !empty($applicant->file_cid);
		$has_transcript = !empty($applicant->file_transcript);
		$has_portfolio  = !empty($applicant->file_portfolio);

		if (!($has_cid && $has_transcript && $has_portfolio)) {
			// กันกรณีคนยิง request มาตรง ๆ ทั้งที่ยังไม่ครบ
			$this->session->set_flashdata('error', 'เอกสารยังไม่ครบ ไม่สามารถบันทึกการอัปโหลดได้');
			redirect(base_url('index.php/welcome/register_upload_form/'.$id));
			return;
		}

		// บันทึกสถานะลงระบบ (ปรับชื่อ field ตามที่คุณใช้จริง)
		$this->db->where('id', $id)->update('applicant', [
			'upload_status' => 'completed',   // หรือ 1 ถ้าใช้ tinyint
			'updated_at'    => date('Y-m-d H:i:s')
		]);

		$this->session->set_flashdata('success', 'บันทึกข้อมูลการอัปโหลดเอกสารเรียบร้อยแล้ว');
		// จะให้กลับไปหน้าไหนต่อ เลือกได้ เช่น ไปหน้า admin list หรือหน้าแรก
		redirect(base_url('index.php/welcome/registration_success/'.$id));
	}

	public function registration_success($id)
	{
		// ดึงข้อมูลผู้สมัครมาแสดงชื่อ
		$applicant = $this->db->where('id', $id)->get('applicant')->row();

		if (!$applicant) {
			$this->session->set_flashdata('error', 'ไม่พบข้อมูลผู้สมัคร');
			redirect('welcome/index');
			return;
		}

		$data['applicant'] = $applicant;
		$data['content']   = 'registration_success';
		$this->load->view('layout', $data);
	}

}
