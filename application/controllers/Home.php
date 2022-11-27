<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
    public function index()
    {
        $data['judul'] = 'Tes';
        $this->load->view('templates/main');
        // $this->load->view('templates/headers', $data);
        $this->load->view('home/home');
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
    }
}
