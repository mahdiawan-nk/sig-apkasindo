<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datakebun extends CI_Controller
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
        $this->db->select('a.*,b.nama_dpd');
        $this->db->join('dpd_wilayah b', 'a.id_dpd=b.id_dpd', 'inner');
        $getDataLahan = $this->db->get('dpd_luaslahan a')->result();
        $data = [
            'pages' => 'admins/statistik/view',
            'pages_title' => 'Master DPD Wilayah',
            'data' => $getDataLahan,
            'dpd_wilayah' => $this->db->get('dpd_wilayah')->result()

        ];
        $this->load->view('template/admins/main', $data);
    }

    public function save($args = null)
    {
        $dataPost = $this->input->post();

        if ($args == null) {
            $this->db->insert('dpd_luaslahan', $dataPost);
        } else {
            $this->db->where('id_luaslahan', $args);
            $this->db->update('dpd_luaslahan', $dataPost);
        }


        redirect(base_url('admin/datakebun'), 'refresh');
    }

    public function delete($args)
    {
        $this->db->delete('dpd_luaslahan', ['id_luaslahan' => $args]);
        redirect(base_url('admin/datakebun'), 'refresh');
    }
}

/* End of file Datakebun.php and path \application\controllers\Admin\Datakebun.php */
