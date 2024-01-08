<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data = [
			'jmldpd' => $this->db->count_all_results('dpd_wilayah'),
			'jmlanggota' => $this->db->count_all_results('dpd_keanggotaan'),
			'jmlstruktur' => $this->db->count_all_results('dpd_struktural'),
			'tentang' => $this->db->get('tentang')->row()->isi

		];
		$data['halaman'] = 'sites/home';
		$this->load->view('template/sites/main', $data);
	}

	function dpdlist()
	{
		$this->db->order_by('kode_wilayah', 'asc');

		$dataWilayah = $this->db->get('dpd_wilayah')->result_array(); // jumlah row 11
		foreach ($dataWilayah as $key => $item) {
			$this->db->where('id_dpd', $item['id_dpd']);
			$dataWilayah[$key]['jmlanggota'] = $this->db->count_all_results('dpd_keanggotaan');
		}
		$data['data'] = $dataWilayah;
		$data['halaman'] = 'sites/listdpd';
		$this->load->view('template/sites/main', $data);
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	function statistik()
	{
		$this->db->select('a.*,b.nama_dpd');
		$this->db->join('dpd_wilayah b', 'a.id_dpd=b.id_dpd', 'inner');
		$getDataLahan = $this->db->get('dpd_luaslahan a')->result();
		$data['data'] = $getDataLahan;
		$data['chart'] = $this->chart();
		$data['halaman'] = 'sites/statistik';
		$this->load->view('template/sites/main', $data);
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function chart()
	{
		$this->db->select('tahun');
		$this->db->group_by('tahun');
		$dataTahun = $this->db->get('dpd_luaslahan')->result();

		$dataDpd = $this->db->get('dpd_wilayah')->result();

		$data = array();

		foreach ($dataDpd as $item) {
			$dataLuasPeriode = array();

			foreach ($dataTahun as $tahun) {
				$this->db->select('tahun,luas_lahan');
				$this->db->where('id_dpd', $item->id_dpd);
				$this->db->where('tahun', $tahun->tahun);
				$dataLuas = $this->db->get('dpd_luaslahan')->row_array();

				if ($dataLuas) {
					$dataLuasPeriode[] = [
						'tahun' => $tahun->tahun,
						'luas_lahan' => $dataLuas['luas_lahan']
					];
				} else {
					$dataLuasPeriode[] =
						[
							'tahun' => $tahun->tahun,
							'luas_lahan' => 0
						];
				}
			}

			$data[] = [
				'name' => $item->nama_dpd,
				'data' => $dataLuasPeriode
			];
		}

		$result = [
			'datatahun' => $dataTahun,
			'datachart' => $data
		];
		return json_encode($result);
	}
}
