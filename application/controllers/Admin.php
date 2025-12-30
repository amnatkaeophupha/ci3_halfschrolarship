<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation']);

        // บังคับให้ต้องล็อกอินก่อน ยกเว้นหน้า login / do_login / logout
        $allowed = ['login', 'do_login', 'logout'];

        if (!in_array($this->router->method, $allowed)) {
            if (!$this->session->userdata('admin_logged_in')) {
                redirect('admin/login');
            }
        }
    }

    // ------------------ หน้า login ------------------
    public function login()
    {
        // ถ้าล็อกอินอยู่แล้ว ให้เด้งไปหน้ารายชื่อสมัคร
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/applicant_list');
        }

        $data['content'] = 'admin_login'; // view login
        $this->load->view('layout', $data);
    }

    public function do_login()
    {
        $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'trim|required');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $data['content'] = 'admin_login';
            $this->load->view('layout', $data);
            return;
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // ดึงข้อมูล admin จาก DB
        $admin = $this->db
            ->where('username', $username)
            ->get('admin_users')
            ->row();

        if (!$admin) {
            $this->session->set_flashdata('error', 'ไม่พบชื่อผู้ใช้นี้ในระบบ');
            redirect('admin/login');
            return;
        }

        // ตรวจรหัสผ่าน
        if (!password_verify($password, $admin->password)) {
            $this->session->set_flashdata('error', 'รหัสผ่านไม่ถูกต้อง');
            redirect('admin/login');
            return;
        }

        // สำเร็จ → set session
        $this->session->set_userdata([
            'admin_logged_in' => TRUE,
            'admin_id'        => $admin->id,
            'admin_username'  => $admin->username,
            'admin_name'      => $admin->fullname,
        ]);

        redirect('admin/applicant_list');
    }

    // ------------------ ออกจากระบบ ------------------
    public function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_name');

        $this->session->set_flashdata('success', 'ออกจากระบบเรียบร้อยแล้ว');
        redirect('admin/login');
    }

    // ------------------ รายชื่อผู้สมัคร (ต้องล็อกอิน) ------------------
    public function applicant_list()
    {
        $data['applicants'] = $this->db
            ->select('a.*, p.pro_name')
            ->from('applicant AS a')
            ->join('program AS p', 'a.pro_id = p.pro_id', 'left')
            ->order_by('a.id', 'ASC')
            ->get()
            ->result();

        $data['content'] = 'admin_applicant_list';
        $this->load->view('layout', $data);
    }
}
