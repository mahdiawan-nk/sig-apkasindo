<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datakeanggotaan extends CI_Controller
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
        $this->db->select('a.*,b.nama_dpd');
        $this->db->join('dpd_wilayah b', 'a.id_dpd=b.id_dpd', 'inner');
        $dataTable = $this->db->get('dpd_keanggotaan a')->result();
        $data = [
            'pages' => 'admins/keanggotaan/view',
            'pages_title' => 'Master DPD Wilayah',
            'data' => json_encode(['data'=>$dataTable]),
            'dpd_wilayah' => $this->db->get('dpd_wilayah')->result()
        ];
        $this->load->view('template/admins/main', $data);
    }


    function jsondata(){
        $this->db->select('a.*,b.nama_dpd');
        $this->db->join('dpd_wilayah b', 'a.id_dpd=b.id_dpd', 'inner');
        $dataTable = $this->db->get('dpd_keanggotaan a')->result();

        $this->output->set_content_type('application/json')->set_output(json_encode($dataTable));
        
    }

    public function importexcel()
    {
        $idDpd = $this->input->post('id_dpd');

        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $no_kta = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $kode_keanggotaan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $temp_data[] = array(
                        'id_dpd'    => $idDpd,
                        'nama'    => $nama,
                        'no_kta'    => $no_kta,
                        'kode_keanggotaan'  => $kode_keanggotaan,
                    );
                }
            }


            $insert = $this->db->insert_batch('dpd_keanggotaan', $temp_data);

            if ($insert) {
                redirect(base_url('admin/datakeanggotaan'), 'refresh');
            } else {
                redirect(base_url('admin/datakeanggotaan'), 'refresh');
            }
        } else {
            echo "Tidak ada file yang masuk";
        }
    }

    public function save()
    {
        $dataPost = $this->input->post();
        $insert = $this->db->insert('dpd_keanggotaan', $dataPost);

        if ($insert) {
            redirect(base_url('admin/datakeanggotaan'), 'refresh');
        } else {
            redirect(base_url('admin/datakeanggotaan'), 'refresh');
        }
        
    }

    public function update($id)
    {
        $dataPost = $this->input->post();
        $this->db->where('id_keanggotaan', $id);
        $update = $this->db->update('dpd_keanggotaan', $dataPost);

        if ($update) {
            redirect(base_url('admin/datakeanggotaan'), 'refresh');
        } else {
            redirect(base_url('admin/datakeanggotaan'), 'refresh');
        }
        
    }

    public function delete($id)
    {
        $this->db->where('id_keanggotaan', $id);
        $delete = $this->db->delete('dpd_keanggotaan');
        if ($delete) {
            redirect(base_url('admin/datakeanggotaan'), 'refresh');
        } else {
            redirect(base_url('admin/datakeanggotaan'), 'refresh');
        }
    }
}

/* End of file DataPengurus.php and path \application\controllers\Admin\DataPengurus.php */
