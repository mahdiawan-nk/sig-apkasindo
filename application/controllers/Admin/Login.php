<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            redirect(base_url('admin/dashboard'));
        } else {
            $this->load->view('admins/login');
        }
    }

    public function checklogin()
    {
        $postForm = $this->input->post();
        $postForm['password'] = md5($postForm['password']);

        $postForm = (object)$postForm;
        $getUser = $this->admin->validateuser($postForm)->row();

        if ($getUser) {

            $array = array(
                'login' => TRUE,
                'username' => $getUser->nama_pengguna
            );

            $this->session->set_userdata($array);

            redirect(base_url('admin/dashboard'));
        } else {
            redirect(base_url('admins'));
        }
    }

    public function Logout()
    {
        $array = array(
            'username' => null,
            'login' => FALSE
        );
        $this->session->unset_userdata($array); //clear session
        $this->session->sess_destroy(); //tutup session
        redirect(base_url('admins'));
    }
}

/* End of file Login.php and path \application\controllers\Admin\Login.php */
