<?php
class M_estimasi_hrg extends CI_Model
{

    function m_filter_price($price_min, $price_max, $satuan_hrg)
    {
        $this->db->select('*');
        $this->db->from('tipe');
        $this->db->where('hrg >=', $price_min);
        $this->db->where('hrg <=', $price_max);
        $this->db->where('satuan_hrg', $satuan_hrg);
        $this->db->Join('perum', 'perum.id_perum = tipe.id_tipe_perum');
        // $this->db->ORDER_BY('id_foto', 'RANDOM');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            // return $query->row_array();
        }else{
            // echo 'ya';
        }
        return $query->result();
    }
    function m_data_perum()
    {
        $this->db->select('*');
        $this->db->from('perum');

        // $this->db->where('label_foto', 'dashboard');
        $this->db->ORDER_BY('id_perum', 'desc');
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