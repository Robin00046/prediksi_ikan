<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Transaksi');
        $this->load->model('M_Produk');
        $this->load->model('M_User');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['transaksi'] = $this->M_Transaksi->get_data();
        $data['judul'] = 'Halaman Transaksi';
        $this->load->view('templates/main', $data);
        $this->load->view('transaksi/transaksi', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah";
        $data['tbl_produk'] = $this->M_Produk->get_data();
        $data['user'] = $this->M_User->get_data();
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('id_produk', 'id_produk', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required');
        $this->form_validation->set_rules('total_harga', 'total_harga', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/main');
            $this->load->view('transaksi/v_tambah', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/end');
        } else {
            $this->M_Transaksi->tambahtransaksi();
            $this->decrementStock($this->input->post('id_produk'), $this->input->post('jumlah_barang'));
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('transaksi');
        }
    }
    public function hapus($id)
    {
        $query = $this->M_Transaksi->gettransaksi($id)->row();
		$quantity = $query->jumlah_barang;
		$this->incrementStock($query->id_produk,$quantity);
        $this->M_Transaksi->hapustransaksi($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('transaksi');
    }
    public function ubah($id)
    {
        $data['judul'] = "Halaman ubah";
        $data['transaksi'] = $this->M_Transaksi->gettransaksi($id);
        $data['tbl_produk'] = $this->M_Produk->get_data();
        $data['user'] = $this->M_User->get_data();
        $this->form_validation->set_rules('id_produk', 'id_produk', 'required');
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('jumlah_barang', 'jumlah_barang', 'required');
        $this->form_validation->set_rules('total_harga', 'total_harga', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/main', $data);
            $this->load->view('transaksi/v_ubah', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/end');
        } else {
            $this->M_Transaksi->ubahtransaksi();
            $this->decrementStock($this->input->post('id_produk'), $this->input->post('jumlah_barang'));
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('transaksi');
        }
    }
    public function decrementStock($id, $quantity)
    {
        $curQuantity = $this->M_Produk->getproduk($id)->row()->total_stok;
        $newQuantity =  (int) $curQuantity - (int)$quantity;
        $data2 = [
            'total_stok' => $newQuantity,
        ];
        $this->M_Produk->editData($data2, $id);
    }
    public function incrementStock($id, $quantity)
    {
        $curQuantity = $this->M_Produk->getproduk($id)->row()->total_stok;
        $newQuantity =  (int) $curQuantity + (int)$quantity;
        $data2 = [
            'total_stok' => $newQuantity,
        ];
        $this->M_Produk->editData($data2, $id);
    }
    public function filter()
    {
        $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $transaksi = $this->M_Transaksi->get_data();  // Panggil fungsi view_all yang ada di TransaksiModel
            $url_cetak = 'transaksi/cetak';
            $label = 'Semua Data Transaksi';
        } else { // Jika terisi
            $transaksi = $this->M_Transaksi->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel
            $url_cetak = 'transaksi/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir;
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
        }


        $data['transaksi'] = $transaksi;
        $data['url_cetak'] = base_url('/' . $url_cetak);
        $data['label'] = $label;
        $data['judul'] = 'Transaksi Berdasarkan Tanggal';
        $this->load->view('templates/main', $data);
        $this->load->view('transaksi/list', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
    }

    public function cetak()
    {
        $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $transaksi = $this->M_Transaksi->get_data();  // Panggil fungsi view_all yang ada di TransaksiModel
            $label = 'Semua Data Transaksi';
        } else { // Jika terisi
            $transaksi = $this->M_Transaksi->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
        }

        $data['label'] = $label;
        $data['transaksi'] = $transaksi;

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
