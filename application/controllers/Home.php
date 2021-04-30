<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		loginRequired();

		$data['tanggal'] = date("Y-m-d");
		$data['siswa'] = $this->db->query("SELECT * FROM m_siswa")->result();

		$data['content'] = $this->load->view('pages/home/index', $data, true);
		$data['js'] = $this->load->view('pages/home/index_js', $data, true);

		loadDashboardViewData($data);
	}

	public function rangkuman()
	{
		loginRequired();

		$ids = $this->db->query("SELECT id FROM m_siswa")->result();

		$content['rangkuman'] = array();
		foreach ($ids as $idsd) {
			$id = $idsd->id;

			$arrayResult = $this->db->query(
				"SELECT
					m_siswa.nama,
					ifnull( a.keterangan, 'A' ) AS keterangan,
					a.date 
				FROM
					m_siswa
				LEFT JOIN (
					SELECT
						a.*,
					CASE
							
							WHEN b.keterangan IS NULL THEN
							'A' ELSE b.keterangan 
						END AS keterangan 
					FROM
						( SELECT tanggal.date, m_siswa.nama, m_siswa.id AS siswa_id FROM tanggal JOIN m_siswa ) a
						LEFT JOIN kehadiran b ON b.tanggal = a.date 
						AND b.siswa_id = a.siswa_id 
					ORDER BY
						date ASC,
						siswa_id ASC 
					) a ON m_siswa.id = a.siswa_id 
				LEFT JOIN tanggal on tanggal.date = a.date
				WHERE
					a.date < NOW() 
					AND a.keterangan <> 'H' 
					AND a.siswa_id = '$id' 
					AND tanggal.isDicatat = '1'
				ORDER BY
					a.date DESC"
			)->result();

			$arraydata = array(
				"id" => $id,
				"detail" => $arrayResult
			);

			array_push($content['rangkuman'], $arraydata);
		}

		$data['content'] = $this->load->view('pages/home/rangkuman', $content, true);

		loadDashboardViewData($data);
	}

	public function rangkuman_detail($id)
	{
		loginRequired();

		$content['detail'] = $this->db->query(
			"SELECT
					m_siswa.nama,
					ifnull( a.keterangan, 'A' ) AS keterangan,
					a.date 
				FROM
					m_siswa
				LEFT JOIN (
					SELECT
						a.*,
					CASE
							
							WHEN b.keterangan IS NULL THEN
							'A' ELSE b.keterangan 
						END AS keterangan 
					FROM
						( SELECT tanggal.date, m_siswa.nama, m_siswa.id AS siswa_id FROM tanggal JOIN m_siswa ) a
						LEFT JOIN kehadiran b ON b.tanggal = a.date 
						AND b.siswa_id = a.siswa_id 
					ORDER BY
						date ASC,
						siswa_id ASC 
					) a ON m_siswa.id = a.siswa_id 
				LEFT JOIN tanggal on tanggal.date = a.date
				WHERE
					a.date < NOW() 
					AND a.keterangan <> 'H' 
					AND a.siswa_id = '$id' 
					AND tanggal.isDicatat = '1'
				ORDER BY
					a.date DESC"
		)->result();

		$data['content'] = $this->load->view('pages/home/rangkuman_detail', $content, true);

		loadDashboardViewData($data);
	}
}
