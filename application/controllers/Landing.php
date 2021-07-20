<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

	public function index()
	{
		if (hasLogin()) {
			redirect(base_url("home"));
		}

		$content['siswa'] = $this->db->query("SELECT * FROM m_siswa")->result();
		$data['content'] = $this->load->view('pages/landing/cekHadir', $content, true);
		loadLandingViewData($data);
	}

	public function cek_hadir()
	{
		$id = $_GET['id'];
		
		
		$content['nama'] = $this->db->query("SELECT nama FROM m_siswa where id = $id")->row()->nama;
		
		$tanggal = date("Y-m-d");
		$dicatatOrNot = $this->db->query(
			"SELECT * FROM tanggal WHERE date = '$tanggal'"
		)->row()->isDicatat;

		if ($dicatatOrNot == "1") {

			$content['hari_ini'] = $this->db->query(
				"SELECT 
				case
					when keterangan = 'A' then 'Alpa'
					when keterangan = 'I' then 'Izin'
					when keterangan = 'S' then 'Sakit'
					when keterangan = 'T' then 'Terlambat'
				end as keterangan 
			 FROM kehadiran WHERE siswa_id = '$id' and tanggal = '$tanggal'"
			);

			$content['hari_ini'] = $content['hari_ini']->num_rows() > 0 ? $content['hari_ini']->row()->keterangan : "Alpa";
		} else {
			$content['hari_ini'] = "Kosong";
		}

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

		$data['content'] = $this->load->view('pages/landing/kehadiran', $content, true);
		loadLandingViewData($data);
	}
}
