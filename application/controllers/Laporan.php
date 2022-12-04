<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $tgl1 = $this->input->get('tgl1'); // Ambil data tgl sesuai input (kalau tidak ada set kosong)
        $tgl2 = $this->input->get('tgl2'); // Ambil data tgl sesuai input (kalau tidak ada set kosong)
        
        if (empty($tgl1) and empty($tgl2)) { // Cek jika tgl atau tgl_akhir kosong, maka :
            $filter = $this->M_Transaksi->get_data();  // Panggil fungsi view_all yang ada di filterModel
            $url_cetak = 'Laporan/cetak';
            $label = 'Semua Data';
        } else { // Jika terisi
            $filter = $this->M_Transaksi->filter($tgl1,$tgl2);
            $url_cetak = 'Laporan/cetak?tgl1=' . $tgl1.'&tgl2='.$tgl2;
            // var_dump($filter);
            $label = 'Filter Bulan '  . $tgl1 .' Tahun '. $tgl2 ;
            // Panggil fungsi view_by_date yang ada di filterModel
        }
        $data['label'] = $label;
        $data['url_cetak'] = base_url('/' . $url_cetak);
        $data['filter'] = $filter;
		$data['dropdownbulan'] = $this->M_Transaksi->dropdownbulan();
		$data['dropdowntahun'] = $this->M_Transaksi->dropdowntahun();
		$data['judul'] = 'Halaman Filter';
		$this->load->view('templates/main');
        $this->load->view('templates/headers', $data);
		$this->load->view('transaksi/filter',$data);
		$this->load->view('templates/footer');
		$this->load->view('templates/end');
    }
    public function cetak()
    {
        $tgl1 = $this->input->get('tgl1'); // Ambil data tgl sesuai input (kalau tidak ada set kosong)
        $tgl2 = $this->input->get('tgl2'); // Ambil data tgl sesuai input (kalau tidak ada set kosong)
        
        if (empty($tgl1) and empty($tgl2)) { // Cek jika tgl atau tgl_akhir kosong, maka :
            $filter = $this->M_Transaksi->get_data();  // Panggil fungsi view_all yang ada di filterModel
            // $url_cetak = 'laporan/cetak';
            $label = 'Semua Data';
        } else { // Jika terisi
            $filter = $this->M_Transaksi->filter($tgl1,$tgl2);
            // $url_cetak = 'laporan/cetak?tgl1=' . $tgl1.'tgl2='.$tgl2;
            // var_dump($filter);
            $label = 'Filter Bulan '  . $tgl1 .' Tahun '. $tgl2 ;
            // Panggil fungsi view_by_date yang ada di filterModel
        }
        $data['label'] = $label;
        $data['filter'] = $filter;
        
        $this->load->view('transaksi/cetak', $data);
        //     ob_start();
        //     $html = ob_get_contents();
        //     ob_end_clean();
        
        //     require './assets/libraries/html2pdf/autoload.php'; // Load plugin html2pdfnya
        
        //     $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'F4', 'en');  // Settingan PDFnya
        //     $pdf->WriteHTML($html);
        //     $pdf->Output('laporan.pdf', 'D');
    }
}
