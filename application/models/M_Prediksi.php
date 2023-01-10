<?php

class M_Prediksi extends CI_Model
{
    public function get_data($nama_produk)
    {
        $this->db->join('data_produk', 'data_produk.id_produk = prediksi.data_produk_fk');
        $this->db->where("data_produk.nama_produk",$nama_produk);

        return $this->db->get('prediksi')->result();
    }
}
