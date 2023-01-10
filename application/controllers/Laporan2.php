<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan2 extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Prediksi');
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
            $prediksi = null;  // Panggil fungsi view_all yang ada di grafikModel
            $url_cetak = 'Laporan2/cetak';
            $label = 'Silahkan Isi Nama Ikan';
        } else { // Jika terisi
            
            $prediksi = $this->M_Transaksi->prediksi($nama_produk);
            $url_cetak = "Laporan2/cetak?nama_produk=$nama_produk";
            $label = 'Prediksi ' . $nama_produk;
			 // Panggil fungsi view_by_date yang ada di grafikModel
        }
        $data['url_cetak'] = $url_cetak;
        $data['prediksi'] = $prediksi;
        $data['tbl_produk'] = $this->M_Produk->get_data();
        $data['label'] = $label;
		$data['judul'] = 'Halaman Prediksi';
		$data['produk'] = $nama_produk;
		$this->load->view('templates/main');
        $this->load->view('templates/headers', $data);
		$this->load->view('transaksi/filter2',$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/end');
    }
    public function cetak()
    {
        $nama_produk = $this->input->get('nama_produk'); // Ambil data nama_produk sesuai input (kalau tidak ada set kosong)
        $prediksi = $this->M_Prediksi->get_data($nama_produk);
        // dd($prediksi);

        if (empty($nama_produk)) { // Cek jika nama_produk atau tgl_akhir kosong, maka :
            $prediksi = null;  // Panggil fungsi view_all yang ada di grafikModel
            $label = 'Silahkan Isi Nama Ikan';
        } else { // Jika terisi
            
        $prediksi = $this->M_Transaksi->prediksi($nama_produk);
            $label = 'Prediksi ' . $nama_produk;
			 // Panggil fungsi view_by_date yang ada di grafikModel
        }

        $data['prediksi'] = $prediksi;
        $data['label'] = $label;
        $this->load->view('transaksi/cetak2', $data);
        //     ob_start();
        //     $html = ob_get_contents();
        //     ob_end_clean();
        
        //     require './assets/libraries/html2pdf/autoload.php'; // Load plugin html2pdfnya
        
        //     $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'F4', 'en');  // Settingan PDFnya
        //     $pdf->WriteHTML($html);
        //     $pdf->Output('laporan.pdf', 'D');
    }
}
