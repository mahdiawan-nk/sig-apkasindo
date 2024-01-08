<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPengurus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
            redirect(base_url('admins'));
        }
        $this->load->library('excel');
    }

    public function index()
    {
        $data = [
            'pages' => 'admins/pengurus/view',
            'pages_title' => 'Master DPD Pengurus',
            'dpd_wilayah' => $this->db->get('dpd_wilayah')->result()
        ];
        $this->load->view('template/admins/main', $data);
    }

    function jsondata()
    {
        $this->db->select('a.*,b.nama_dpd');
        $this->db->join('dpd_wilayah b', 'a.id_dpd=b.id_dpd', 'inner');
        $dataTable = $this->db->get('dpd_struktural a')->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($dataTable));
    }

    public function save()
    {
        $dataPost = $this->input->post();
        $insert = $this->db->insert('dpd_struktural', $dataPost);

        if ($insert) {
            redirect(base_url('admin/datapengurus'), 'refresh');
        } else {
            redirect(base_url('admin/datapengurus'), 'refresh');
        }
    }

    public function importexcel()
    {
        // $idDpd = $this->input->post('id_dpd');

        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $idDpd = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $nama = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $jenis = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $no_hp = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $temp_data[] = array(
                        'id_dpd'    => $idDpd,
                        'nama'    => $nama,
                        'no_hp'    => $no_hp,
                        'jenis'  => $jenis,
                    );
                }
            }


            $insert = $this->db->insert_batch('dpd_struktural', $temp_data);

            if ($insert) {
                redirect(base_url('admin/datapengurus'), 'refresh');
            } else {
                redirect(base_url('admin/datapengurus'), 'refresh');
            }
        } else {
            echo "Tidak ada file yang masuk";
        }
    }

    public function update($id)
    {
        $dataPost = $this->input->post();
        $this->db->where('id_struktural', $id);
        $update = $this->db->update('dpd_struktural', $dataPost);

        if ($update) {
            redirect(base_url('admin/datapengurus'), 'refresh');
        } else {
            redirect(base_url('admin/datapengurus'), 'refresh');
        }
    }
    public function delete($args)
    {
        $this->db->delete('dpd_struktural', ['id_struktural' => $args]);
        redirect(base_url('admin/datapengurus'), 'refresh');
    }
}

/* End of file DataPengurus.php and path \application\controllers\Admin\DataPengurus.php */
