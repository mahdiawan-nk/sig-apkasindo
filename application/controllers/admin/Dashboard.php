<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect(base_url('admins'));
        }
    }

    public function index()
    {
        $data=[
            'pages'=>'admins/dashboard',
            'pages_title'=>'Dashboard'
        ];
        $this->load->view('template/admins/main',$data);
        
    }
}

/* End of file Dashboard.php and path \application\controllers\Admin\Dashboard.php */
