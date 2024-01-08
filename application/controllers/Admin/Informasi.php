<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect(base_url('admins'));
        }
    }

    public function index()
    {
        $data = [
            'pages' => 'admins/informasi/view',
            'pages_title' => 'Inforamsi Apkasindo',
            'data' => $this->db->get('tentang')->row()

        ];
        $this->load->view('template/admins/main', $data);
    }

    function save()
    {
        if ($this->input->post('id_') == 0) {
            $this->db->insert('tentang', ['isi' => $this->input->post('isi')]);
        } else {
            $this->db->where('id_tentang', $this->input->post('id_'));
            $this->db->update('tentang', ['isi' => $this->input->post('isi')]);
        }
        redirect(base_url('admin/informasi'), 'refresh');
    }
}

/* End of file Informasi.php and path \application\controllers\Admin\Informasi.php */
