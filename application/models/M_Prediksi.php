<?php

class M_Prediksi extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('prediksi')->result();
    }
    public function tambahprediksi()
    {
        $data = [
            'bulan1' => $this->input->post('bulan1', true),
            'bulan2' => $this->input->post('bulan2', true),
            'bulan3' => $this->input->post('bulan3', true),
            'id_user' => $this->input->post('id_user', true),
            'hasil' => $this->input->post('hasil', true),
        ];
        $this->db->insert('prediksi', $data);
    }
    public function hapusprediksi($id)
    {
        $this->db->delete('prediksi', ['id_prediksi' => $id]);
    }
    public function getprediksi($id)
    {
        return $this->db->get_where('prediksi', ['id_prediksi' => $id]);
    }
    public function ubahprediksi()
    {
        $data = [
            'bulan1' => $this->input->post('bulan1', true),
            'bulan2' => $this->input->post('bulan2', true),
            'bulan3' => $this->input->post('bulan3', true),
            'id_user' => $this->input->post('id_user', true),
            'hasil' => $this->input->post('hasil', true),
        ];
        $this->db->where('id_prediksi', $this->input->post('id_prediksi'));
        $this->db->update('prediksi', $data);
    }
    public function editData($data, $id)
    {
        $this->db->select('prediksi');
        $this->db->where('id_prediksi', $id);
        $this->db->update('prediksi', $data);
    }
    public function cariprediksi()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('prediksi')->result_array();
    }
}
