<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Halaman Grafik';
		$this->load->view('templates/main', $data);
		$this->load->view('grafik/grafik');
		$this->load->view('templates/footer');
		$this->load->view('templates/end');
	}
}
