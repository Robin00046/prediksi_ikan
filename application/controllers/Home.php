<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Halaman Utama';
        $this->load->view('templates/main', $data);
        $this->load->view('home/home');
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
    }
}
