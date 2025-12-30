<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Address_model');
    	$this->load->library('form_validation'); 
		$this->load->library('upload');
		$this->load->library(array('session', 'form_validation'));
    }

	public function index()
	{
		$data['content'] = 'home';
		$this->load->view('layout', $data);
	}

	public function view($id=null)
	{	
		$data['day_options']   = get_day_options();
		$data['month_options'] = get_month_options();
		$data['year_options']  = get_year_options(1980);
		
		$id = $this->uri->segment(3);

		$data['applicant'] = $this->db
			->where('id', $id)
			->get('applicant')
			->row();

		if (!$data['applicant']) {
			$this->session->set_flashdata('error', 'ไม่พบข้อมูลผู้สมัครตามเลขบัตรที่ระบุ');
			redirect('welcome/index');
    		exit;
		}

		// โหลดจังหวัดทั้งหมด
        $data['provinces'] = $this->Address_model->get_provinces();
        // โหลดอำเภอของจังหวัดที่บันทึกไว้ (ถ้ามี)
        $data['amphoes'] = array();
        if (!empty($data['applicant']->address_province)) {
            $data['amphoes'] = $this->Address_model
                ->get_amphoe_by_province($data['applicant']->address_province);
        }

        // โหลดตำบลของอำเภอที่บันทึกไว้ (ถ้ามี)
        $data['districts'] = array();
        if (!empty($data['applicant']->address_district)) {
            $data['districts'] = $this->Address_model
                ->get_district_by_amphoe($data['applicant']->address_district);
        }
        // เอาไว้ใช้แสดง dropdown สาขาเหมือนฟอร์มสมัคร
        $data['program'] = $this->db->query('SELECT * FROM program');

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
		$this->form_validation->set_rules('address_subdistrict', 'ตำบล/แขวง', 'trim|required');
		$this->form_validation->set_rules('address_district', 'อำเภอ/เขต', 'trim|required');
		$this->form_validation->set_rules('address_province', 'จังหวัด', 'trim|required');
		$this->form_validation->set_rules('phone', 'เบอร์โทรศัพท์', 'trim|required|numeric');
		$this->form_validation->set_rules('education_level', 'ระดับการศึกษา', 'required');
		$this->form_validation->set_rules('gpa', 'เกรดเฉลี่ยสะสม', 'trim|required');

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

		redirect(base_url('index.php/welcome/register_upload_form/'.$id));
	
	}

	public function upload_file()
	{
		$id = $this->input->post('id');

		if (empty($id)) {
			$this->session->set_flashdata('error', 'ไม่พบรหัสผู้สมัคร');
			redirect('welcome/index');
			return;
		}

		// ตรวจว่ามีผู้สมัครจริงไหม
		$applicant = $this->db->where('id', $id)->get('applicant')->row();
		if (!$applicant) {
			$this->session->set_flashdata('error', 'ไม่พบข้อมูลผู้สมัคร');
			redirect('welcome/index');
			return;
		}

		// --- ตรวจว่าฟอร์มนี้เป็นไฟล์ประเภทไหน ---
		$file_field = null;   // ชื่อ input file ใน $_FILES
		$db_column  = null;   // ชื่อคอลัมน์ในตาราง applicant
		$suffix     = null;   // ส่วนท้ายชื่อไฟล์ เช่น cid, transcript, portfolio
		$label      = null;   // เอาไว้แสดงในข้อความ error/success

		if (!empty($_FILES['file_cid']['name'])) {
			$file_field = 'file_cid';
			$db_column  = 'file_cid';
			$suffix     = 'cid';
			$label      = 'สำเนาบัตรประจำตัวประชาชน';
		} elseif (!empty($_FILES['file_transcript']['name'])) {
			$file_field = 'file_transcript';
			$db_column  = 'file_transcript';
			$suffix     = 'transcript';
			$label      = 'สำเนาใบแสดงผลการเรียน / ใบรับรองผลการเรียน';
		} elseif (!empty($_FILES['file_portfolio']['name'])) {
			$file_field = 'file_portfolio';
			$db_column  = 'file_portfolio';
			$suffix     = 'portfolio';
			$label      = 'เอกสาร Portfolio';
		}

		if ($file_field === null) {
			$this->session->set_flashdata('error', 'กรุณาเลือกไฟล์ก่อนอัปโหลด');
			redirect('welcome/register_upload_form/'.$id);
			return;
		}

		// --- ตรวจสอบนามสกุลไฟล์ ---
		$file_ext = strtolower(pathinfo($_FILES[$file_field]['name'], PATHINFO_EXTENSION));
		$allowed_ext = ['jpg', 'jpeg', 'png', 'pdf'];

		if (!in_array($file_ext, $allowed_ext)) {
			$this->session->set_flashdata('error', 'ชนิดไฟล์ของ '.$label.' ไม่ถูกต้อง ต้องเป็น JPG, PNG หรือ PDF เท่านั้น');
			redirect('welcome/register_upload_form/'.$id);
			return;
		}

		// --- ตั้งค่า upload ---
		$upload_path = FCPATH . 'uploads/applicant/';

		$config['upload_path']      = $upload_path;
		$config['allowed_types']    = 'jpg|jpeg|png|pdf';
		$config['max_size']         = 10000; // 10MB
		$config['file_ext_tolower'] = TRUE;
		$config['remove_spaces']    = TRUE;
		$config['overwrite']        = TRUE; // อัปโหลดทับไฟล์เดิม
		$config['file_name']        = $id . '_' . $suffix . '.' . $file_ext; // เช่น 4_cid.pdf, 4_transcript.jpg

		// ถ้าโฟลเดอร์ยังไม่มีก็สร้าง
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, TRUE);
		}

		// โหลด/ตั้งค่า upload library
		$this->load->library('upload');
		$this->upload->initialize($config);

		// --- ทำการอัปโหลด ---
		if (!$this->upload->do_upload($file_field)) {
			$this->session->set_flashdata('error', 'อัปโหลด '.$label.' ล้มเหลว: '.$this->upload->display_errors('', ''));
			redirect('welcome/register_upload_form/'.$id);
			return;
		}

		// ข้อมูลไฟล์ใหม่
		$upload_data = $this->upload->data();
		$newFileName = $upload_data['file_name'];  // ปกติจะเท่ากับ $config['file_name']

		// --- ลบไฟล์เก่าที่เป็นคนละนามสกุลของเอกสารเดียวกัน ---
		foreach (['jpg','jpeg','png','pdf'] as $ext) {
			$candidate = $upload_path . $id . '_' . $suffix . '.' . $ext;
			if ($candidate !== $upload_path . $newFileName && file_exists($candidate)) {
				@unlink($candidate);
			}
		}

		// --- บันทึกชื่อไฟล์ใหม่ลง DB ---
		$this->db->where('id', $id)->update('applicant', [
			$db_column => $newFileName
		]);

		$this->session->set_flashdata('success', 'อัปโหลดไฟล์ '.$label.' สำเร็จ และบันทึกเป็น '.$newFileName);
		redirect(base_url('index.php/welcome/register_upload_form/'.$id));
	}





}
