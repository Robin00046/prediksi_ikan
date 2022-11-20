<?php

class M_Produk extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('data_produk')->result();
    }
    public function tambahproduk()
    {
        $data = [
            'nama_produk' => $this->input->post('nama_produk', true),
            'jenis_produk' => $this->input->post('jenis_produk', true),
            'harga' => $this->input->post('harga', true),
            'satuan' => $this->input->post('satuan', true),
            'total_stok' => $this->input->post('total_stok', true),
        ];
        $this->db->insert('data_produk', $data);
    }
    public function hapusproduk($id)
    {
        $this->db->delete('data_produk', ['id_produk' => $id]);
    }
    public function getproduk($id)
    {
        return $this->db->get_where('data_produk', ['id_produk' => $id]);
    }
    public function ubahproduk()
    {
        $data = [
            'nama_produk' => $this->input->post('nama_produk', true),
            'jenis_produk' => $this->input->post('jenis_produk', true),
            'harga' => $this->input->post('harga', true),
            'satuan' => $this->input->post('satuan', true),
            'total_stok' => $this->input->post('total_stok', true),
        ];
        $this->db->where('id_produk', $this->input->post('id_produk'));
        $this->db->update('data_produk', $data);
    }
    public function editData($data, $id)
    {
        $this->db->select('data_produk');
        $this->db->where('id_produk', $id);
        $this->db->update('data_produk', $data);
    }
    public function cariproduk()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('data_produk')->result_array();
    }
}
