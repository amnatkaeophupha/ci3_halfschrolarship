<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
		$this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation'); 
		$this->load->library('upload');
    }

	public function index()
	{
		$data['content'] = 'home';
		$this->load->view('layout', $data);
	}

	public function view($id)
	{	
		$data['day_options']   = get_day_options();
		$data['month_options'] = get_month_options();
		$data['year_options']  = get_year_options(1980);
		
		$id = $this->uri->segment(3);
		$data['faculties'] = $this->Program_model->get_faculty();
		$data['applicant'] = $this->db
			->where('id', $id)
			->get('applicant')
			->row();

		if (!$data['applicant']) {
			$this->session->set_flashdata('error', 'ไม่พบข้อมูลผู้สมัครตามเลขบัตรที่ระบุ');
			redirect('welcome/index');
    		exit;
		}

		$data['content'] = 'register_edit';
		$this->load->view('layout', $data);
	}


	public function search()
    {
        // รับเลขบัตรจากฟอร์ม
        $cid = $this->input->post('cid');

        // ตรวจสอบเบื้องต้น
        if(strlen($cid) != 13 || !is_numeric($cid))
        {
            $this->session->set_flashdata('error', 'กรุณาระบุเลขประจำตัวประชาชนให้ถูกต้อง');
            redirect('welcome'); // หน้าแรก หรือหน้า form ค้นหา
        }

        // ค้นหาผู้สมัคร
        $applicant = $this->db
            ->where('cid', $cid)
            ->get('applicant')
            ->row();

        if($applicant)
        {
			 redirect('member/view/'.$applicant->id);
        }
        else
        {
            $this->session->set_flashdata('error', 'ไม่พบข้อมูลผู้สมัครตามเลขบัตรที่ระบุ');
            redirect('welcome/index');
        }
    }

	public function update_member()
	{
		$id = $this->input->post('id');
		// ---------------- กำหนดกติกา validate คร่าว ๆ ----------------
		$this->form_validation->set_rules('school_name', 'โรงเรียน/สถาบันเครือข่าย', 'trim|required');
		$this->form_validation->set_rules('school_province', 'จังหวัดของโรงเรียน', 'trim|required');
		$this->form_validation->set_rules('full_name', 'ชื่อผู้สมัคร', 'trim|required');
		$this->form_validation->set_rules('cid', 'เลขประจำตัวประชาชน', 'trim|required|exact_length[13]|numeric');
		$this->form_validation->set_rules('address_number', 'ที่อยู่ เลขที่', 'trim|required');
		$this->form_validation->set_rules('address_subdistrict', 'ตำบล/แขวง', 'trim|required');
		$this->form_validation->set_rules('address_district', 'อำเภอ/เขต', 'trim|required');
		$this->form_validation->set_rules('address_province', 'จังหวัด', 'trim|required');
		$this->form_validation->set_rules('address_zipcode', 'รหัสไปรษณีย์', 'trim|required|numeric');
		$this->form_validation->set_rules('phone', 'เบอร์โทรศัพท์', 'trim|required|numeric');
		$this->form_validation->set_rules('education_level', 'ระดับการศึกษา', 'required');
		$this->form_validation->set_rules('gpa', 'เกรดเฉลี่ยสะสม', 'trim|required');

		$this->form_validation->set_rules('fac_id', 'คณะ', 'required');
		$this->form_validation->set_rules('pro_id', 'สาขาวิชา', 'required');

		// ---------------- ถ้า validate ไม่ผ่าน ----------------
		if ($this->form_validation->run() === FALSE) {

			// โหลดข้อมูลเดิมกลับไปหน้าแก้ไข
			$applicant = $this->db
				->where('id', $id)
				->get('applicant')
				->row();

			if (!$applicant) {
				$this->session->set_flashdata('error', 'ไม่พบข้อมูลผู้สมัคร');
				redirect('welcome/index');
			}

			// ถ้าใช้ตัวเลือกวัน/เดือน/ปี + faculties ต้องเตรียมให้เหมือนตอนแรก
			$this->load->model('Program_model');
			$data['applicant']     = $applicant;
			$data['faculties']     = $this->Program_model->get_faculty();
			$data['day_options']   = get_day_options();
			$data['month_options'] = get_month_options();
			$data['year_options']  = get_year_options(1980);

			$data['content'] = 'register_edit';
			$this->load->view('layout', $data);
			return;
		}

		// ---------------- เตรียมข้อมูลสำหรับ update ----------------
		$update = array(
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
		);

		// ---------------- สั่ง update ----------------
		$this->db->where('id', $id);
		$result = $this->db->update('applicant', $update);

		if ($result) {
		
			$this->session->set_flashdata('success', 'แก้ไขข้อมูลใบสมัครเรียบร้อยแล้ว');
		
		} else {
		
			$this->session->set_flashdata('error', 'เกิดข้อผิดพลาด ไม่สามารถแก้ไขข้อมูลได้');
		
		}

		redirect(base_url('index.php/member/view/'.$id));
	
		
	}

	public function upload()
	{
		$id = $this->input->post('id');
		
		$upload_path = './uploads/applicant/';
    
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, true);
		}

		// map ชื่อ field => คำต่อท้ายไฟล์
		$file_fields = array(
			'file_cid'        => 'cid',
			'file_house'      => 'house',
			'file_transcript' => 'transcript',
			'file_portfolio'  => 'portfolio'
		);

		$data_update = array();
    	$upload_errors = array();

		foreach ($file_fields as $field_name => $suffix) {

			// เช็คว่ามีการเลือกไฟล์มาหรือไม่
			if (!empty($_FILES[$field_name]['name'])) {

				// หาสกุลไฟล์เดิม
				$ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);

				// ตั้งชื่อไฟล์ใหม่ : id_ชื่อ เช่น 15_cid.pdf
				$new_name = $id . '_' . $suffix . '.' . strtolower($ext);				
				$full_path = $upload_path . $new_name;

				// ลบไฟล์เดิมก่อนอัปโหลดใหม่
				if (file_exists($full_path)) {
					unlink($full_path);
				}
				
				// config upload
				$config['upload_path']   = $upload_path;
				$config['allowed_types'] = 'pdf|jpg|jpeg|png';
				$config['max_size']      = 10000; // 10MB
				$config['file_name']     = $new_name;
				$config['overwrite']     = TRUE;

				$this->upload->initialize($config);

				if (!$this->upload->do_upload($field_name)) {

					// เก็บ error ไว้ (แต่ไม่หยุดทันที เผื่อ field อื่นอัปโหลดได้)
					$upload_errors[$field_name] = $this->upload->display_errors('', '');

				} else {

					$upload_data = $this->upload->data();

					// เก็บชื่อไฟล์ (หรือ path) ลง array สำหรับ update DB
					// ถ้าต้องการเก็บเฉพาะชื่อไฟล์:
					$data_update[$field_name] = $upload_data['file_name'];

					// ถ้าต้องการเก็บ path เต็ม:
					// $data_update[$field_name] = 'uploads/applicant/' . $upload_data['file_name'];
				}
			}
		}

		// ถ้ามีไฟล์ที่อัปโหลดสำเร็จ → update ตาราง applicant
		if (!empty($data_update)) {
			$this->db->where('id', $id);
			$this->db->update('applicant', $data_update);
		}

		// จัดการข้อความแจ้งเตือน
		if (!empty($upload_errors)) {
			// รวบข้อความ error ไว้แจ้งเตือน
			$msg = "อัปโหลดบางไฟล์ไม่สำเร็จ:<br>";
			foreach ($upload_errors as $field => $err) {
				$msg .= "- {$field} : {$err}<br>";
			}
			$this->session->set_flashdata('error', $msg);
		} else {
			$this->session->set_flashdata('success', 'อัปโหลดเอกสารเรียบร้อยแล้ว');
		}

		if($this->input->post('goto_pages')=='welcome/register_upload_form'){

			redirect(base_url('index.php/welcome/register_upload_form/'.$id));
		
		}else{
		
			redirect(base_url('index.php/member/view/'.$id));
		}
		

	}
}
