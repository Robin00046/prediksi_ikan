<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Transaksi');
        $this->load->model('M_Produk');
        $this->load->model('M_User');
        $this->load->library('form_validation');
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }
	public function index()
	{
		$nama_produk = $this->input->get('nama_produk'); // Ambil data nama_produk sesuai input (kalau tidak ada set kosong)

        if (empty($nama_produk)) { // Cek jika nama_produk atau tgl_akhir kosong, maka :
            $grafik = null;  // Panggil fungsi view_all yang ada di grafikModel
            $label = 'Silahkan Isi Filter';
        } else { // Jika terisi
            $grafik = $this->M_Transaksi->grafik($nama_produk);
            $label = 'Filter ' . $nama_produk;
			 // Panggil fungsi view_by_date yang ada di grafikModel
        }

        $data['grafik'] = $grafik;
		$data['tbl_produk'] = $this->M_Produk->get_data();
		$data['user'] = $this->M_User->get_data();
        $data['label'] = $label;
		$data['judul'] = 'Halaman Grafik';
		$this->load->view('templates/main', $data);
		$this->load->view('grafik/grafik',$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/end');
	}
}
