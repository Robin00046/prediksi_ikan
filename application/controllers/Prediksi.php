<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prediksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Prediksi');
        $this->load->model('M_Produk');
        $this->load->model('M_User');
        $this->load->library('form_validation');
        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }
    public function index()
    {
        $data['prediksi'] = $this->M_Prediksi->get_data();
        $data['judul'] = 'Halaman Prediksi';
        $this->load->view('templates/main', $data);
        $this->load->view('prediksi/prediksi', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah";
        $data['user'] = $this->M_User->get_data();
        $this->form_validation->set_rules('bulan1', 'bulan1', 'required');
        $this->form_validation->set_rules('bulan2', 'bulan2', 'required');
        $this->form_validation->set_rules('bulan3', 'bulan3', 'required');
        $this->form_validation->set_rules('hasil', 'hasil', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/main', $data);
            $this->load->view('prediksi/v_tambah', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/end');
        } else {
            $this->M_Prediksi->tambahprediksi();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('prediksi');
        }
    }
    public function hapus($id)
    {
        $this->M_Prediksi->hapusprediksi($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('prediksi');
    }
    public function ubah($id)
    {
        $data['judul'] = "Halaman Ubah Prediksi";
        $data['prediksi'] = $this->M_Prediksi->getprediksi($id)->row_array();
        $data['user'] = $this->M_User->get_data();
        // var_dump($data['produk']);
        $this->form_validation->set_rules('bulan1', 'bulan1', 'required');
        $this->form_validation->set_rules('bulan2', 'bulan2', 'required');
        $this->form_validation->set_rules('bulan3', 'bulan3', 'required');
        $this->form_validation->set_rules('hasil', 'hasil', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/main', $data);
            $this->load->view('prediksi/v_ubah', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/end');
        } else {
            $this->M_Prediksi->ubahprediksi();
            
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('prediksi');
        }
    }
}
