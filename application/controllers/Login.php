<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		if (hasLogin()) {
			redirect(base_url("home"));
		}

		$content['siswa'] = $this->db->query("SELECT * FROM m_siswa")->result();
		$data['content'] = $this->load->view('pages/landing/login', $content, true);
		loadLandingViewData($data);
	}
}
