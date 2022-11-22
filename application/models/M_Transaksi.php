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
}
