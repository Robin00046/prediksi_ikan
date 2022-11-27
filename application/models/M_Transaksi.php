<?php

class M_transaksi extends CI_Model
{
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('data_produk', 'data_produk.id_produk = transaksi.id_produk');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->order_by("tanggal", "DESC");
        $query = $this->db->get();
        return $query->result();
    }
    public function tambahtransaksi()
    {
        $data = [
            'id_produk' => $this->input->post('id_produk', true),
            'id_user' => $this->input->post('id_user', true),
            'jumlah_barang' => $this->input->post('jumlah_barang', true),
            'tanggal' => $this->input->post('tanggal', true),
            'total_harga' => $this->input->post('total_harga', true),
        ];
        $this->db->insert('transaksi', $data);
    }
    public function hapustransaksi($id)
    {
        $this->db->delete('transaksi', ['id_transaksi' => $id]);
    }
    public function gettransaksi($id)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id]);
    }
    public function ubahtransaksi()
    {
        $data = [
            'id_produk' => $this->input->post('id_produk', true),
            'id_user' => $this->input->post('id_user', true),
            'jumlah_barang' => $this->input->post('jumlah_barang', true),
            'tanggal' => $this->input->post('tanggal', true),
            'total_harga' => $this->input->post('total_harga', true),
        ];
        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('transaksi', $data);
    }
    public function caritransaksi()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('transaksi')->result_array();
    }
    public function view_by_date($tgl_awal, $tgl_akhir)
    {
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);
        $this->db->join('data_produk', 'data_produk.id_produk = transaksi.id_produk');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where('DATE(tanggal) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir); // Tambahkan where tanggal nya
        
        return $this->db->get('transaksi')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }
    public function grafik($nama_produk)
    {
        $this->db->join('data_produk', 'data_produk.id_produk = transaksi.id_produk');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where("nama_produk",$nama_produk);

        return $this->db->get('transaksi')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }
    public function filter($tgl,$tgl2)
    {
        $this->db->join('data_produk', 'data_produk.id_produk = transaksi.id_produk');
        $this->db->join('user', 'user.id_user = transaksi.id_user');
        $this->db->where("date_format(tanggal, '%M')=", $tgl);
        $this->db->where("date_format(tanggal, '%Y')=", $tgl2);
        
        return $this->db->get('transaksi')->result(); // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter 
    }
    public function dropdownbulan()
    {
        $this->db->distinct()
        ->select("date_format(tanggal,'%M') as bulan");
        $query = $this->db->get('transaksi');
        return $query->result();
    }
    public function dropdowntahun()
    {
        $this->db->distinct()
        ->select("date_format(tanggal,'%Y') as tahun");
        $query = $this->db->get('transaksi');
        return $query->result();
    }
    public function prediksi($nama_produk)
	{

		return $this->db->query("SELECT * ,tanggal, Avg(jumlah_barang) OVER(ORDER BY id_transaksi rows between 3 PRECEDING AND CURRENT ROW) AS prediksi, Avg(jumlah_barang) OVER(ORDER BY id_transaksi rows between 6 PRECEDING AND CURRENT ROW) AS prediksin from transaksi
        join data_produk on data_produk.id_produk = transaksi.id_produk
        where nama_produk= '$nama_produk' ORDER BY tanggal DESC")->result();
	}
}
