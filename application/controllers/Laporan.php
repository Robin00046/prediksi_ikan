<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function index()
	{

		$tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
		$tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

		if (empty($tgl_awal) or empty($tgl_akhir)) { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
			$transaksi = $this->M_Transaksi->get_data()->result();;  // Panggil fungsi view_all yang ada di TransaksiModel
			$url_cetak = 'aktanotaris/cetak';
			$label = 'Semua Data Akta Notaris';
		} else { // Jika terisi
			$transaksi = $this->M_Transaksi->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel
			$url_cetak = 'aktanotaris/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir;
			$tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
			$tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
			$label = 'Periode Tanggal ' . $tgl_awal . ' s/d ' . $tgl_akhir;
		}


		$data['transaksi'] = $transaksi;
		$data['url_cetak'] = base_url('/' . $url_cetak);
		$data['label'] = $label;
		$data['judul'] = 'Akta Notaris Berdasarkan Tanggal';
		$this->load->view('templates/main');
		$this->load->view('laporan/laporan');
		$this->load->view('templates/footer');
		$this->load->view('templates/end');
	}
}
