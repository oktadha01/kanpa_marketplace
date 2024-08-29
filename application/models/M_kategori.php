<?php
class M_kategori extends CI_Model
{

    function m_data_perum($kategori)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
        $this->db->where('tipe.kategori_tipe', $kategori);
        $this->db->ORDER_BY('perum.order_perum', 'asc');
        // $this->db->ORDER_BY('id_perum', 'RANDOM');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_tipe()
    {
        $this->db->select('*');
        $this->db->from('tipe');
        $this->db->ORDER_BY('luas_bangunan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    
}
