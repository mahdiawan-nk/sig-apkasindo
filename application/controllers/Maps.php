<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maps extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $kode = $this->input->get('kode');
        if ($kode) {
            $this->db->where('kode_wilayah', $kode);
        }
        $this->db->order_by('kode_wilayah', 'asc');

        $dataWilayah = $this->db->get('dpd_wilayah')->result_array(); // jumlah row 11
        foreach ($dataWilayah as $key => $item) {
            $dataStruktural = $this->db->get_where('dpd_struktural', ['id_dpd' => $item['id_dpd']])->result();
            $this->db->where('id_dpd', $item['id_dpd']);
            $dataWilayah[$key]['jmlanggota'] = $this->db->count_all_results('dpd_keanggotaan');
            if ($dataStruktural) {
                $dataWilayah[$key]['struktural'] = $dataStruktural;
            } else {
                $dataWilayah[$key]['struktural'] = null;
            }
        }
        $data['data'] = json_decode(json_encode($dataWilayah));
        $data['halaman'] = 'sites/maps';
        $this->load->view('template/sites/main', $data);
    }

    public function proxy()
    {
        // Tangani permintaan GET
        $url = $this->input->get('url');
        $response = $this->get_data_from_url($url);

        // Set header agar respons terlihat seperti data JSON
        header('Content-Type: application/json');
        echo $response;
    }

    private function get_data_from_url($url)
    {
        // Lakukan permintaan HTTP ke URL tujuan menggunakan cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}

/* End of file Maps.php and path \application\controllers\Maps.php */
