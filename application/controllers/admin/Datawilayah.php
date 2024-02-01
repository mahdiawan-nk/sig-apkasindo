<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datawilayah extends CI_Controller
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
            'pages' => 'admins/wilayah/view',
            'pages_title' => 'Master DPD Wilayah',
            'data' => $this->db->get('dpd_wilayah')->result()

        ];
        $this->load->view('template/admins/main', $data);
    }

    public function create()
    {
        $data = [
            'pages' => 'admins/wilayah/create',
            'pages_title' => 'Create DPD Wilayah',
        ];
        $this->load->view('template/admins/main', $data);
    }

    public function edit($args)
    {
        $data = [
            'pages' => 'admins/wilayah/edit',
            'pages_title' => 'Edit DPD Wilayah',
            'data' => $this->db->get_where('dpd_wilayah',['id_dpd'=>$args])->row()
        ];
        $this->load->view('template/admins/main', $data);
    }

    public function save($args = null)
    {
        $dataPost = $this->input->post();

        if ($args == null) {
            $this->db->insert('dpd_wilayah', $dataPost);
        } else {
            $this->db->where('id_dpd', $args);
            $this->db->update('dpd_wilayah', $dataPost);
        }


        redirect(base_url('admin/datawilayah'), 'refresh');
    }

    public function delete($args)
    {
        $this->db->delete('dpd_wilayah',['id_dpd'=>$args]);
        redirect(base_url('admin/datawilayah'), 'refresh');
        
    }
}

/* End of file DataWilayah.php and path \application\controllers\Admin\DataWilayah.php */
