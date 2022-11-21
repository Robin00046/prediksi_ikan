<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Produk');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['tbl_produk'] = $this->M_Produk->get_data();
        $data['judul'] = 'Halaman Produk';
        $this->load->view('templates/main', $data);
        $this->load->view('produk/produk', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah";
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
        $this->form_validation->set_rules('jenis_produk', 'jenis_produk', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('total_stok', 'total_stok', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/main', $data);
            $this->load->view('produk/v_tambah');
            $this->load->view('templates/footer');
            $this->load->view('templates/end');
        } else {
            $this->M_Produk->tambahproduk();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('Produk');
        }
    }
    public function hapus($id)
    {
        $this->M_Produk->hapusproduk($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('Produk');
    }
    public function ubah($id)
    {
        $data['judul'] = "Halaman ubah";
        $data['produk'] = $this->M_Produk->getproduk($id)->row_array();
        // var_dump($data['produk']);
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'required');
        $this->form_validation->set_rules('jenis_produk', 'jenis_produk', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('total_stok', 'total_stok', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/main', $data);
            $this->load->view('produk/v_ubah', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/end');
        } else {
            $this->M_Produk->ubahproduk();
            
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('produk');
        }
    }
}
