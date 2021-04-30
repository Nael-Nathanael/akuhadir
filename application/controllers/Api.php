<?php

/**
 *
 */
class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		setJsonResponse();
	}

	public function hadir()
	{
		$this->db->delete(
			"kehadiran",
			array(
				"siswa_id" => $_POST['id'],
				"tanggal" => $_POST['tanggal'],
			)
		);

		$this->db->insert(
			"kehadiran",
			array(
				"siswa_id" => $_POST['id'],
				"keterangan" => $_POST['keterangan'],
				"tanggal" => $_POST['tanggal'],
			)
		);

		echo json_encode(
			array(
				"message" => "success"
			)
		);
	}

	public function get_kehadiran()
	{
		$tanggal = $_POST['tanggal'];
		returnQueryAsJsonResponse(
			"SELECT * FROM kehadiran WHERE tanggal = '$tanggal'"
		);
	}

	public function get_today_dicatat()
	{
		$tanggal = $_POST['tanggal'];
		returnQueryAsJsonResponse(
			"SELECT * FROM tanggal WHERE date = '$tanggal'"
		);
	}

	public function set_day_dicatat()
	{
		$tanggal = $_POST['tanggal'];
		$this->db->update("tanggal",
			array(
				"isDicatat" => 1
			),
			array(
				"date" => $tanggal
			)
		);
		returnQueryAsJsonResponse(
			"SELECT * FROM tanggal WHERE date = '$tanggal'"
		);
	}


	public function set_day_tidak_dicatat()
	{
		$tanggal = $_POST['tanggal'];
		$this->db->update("tanggal",
			array(
				"isDicatat" => 0
			),
			array(
				"date" => $tanggal
			)
		);
		returnQueryAsJsonResponse(
			"SELECT * FROM tanggal WHERE date = '$tanggal'"
		);
	}
}
