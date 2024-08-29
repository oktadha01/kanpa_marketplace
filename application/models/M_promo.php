<?php
class M_promo extends CI_Model
{
    function m_data_perum()
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->ORDER_BY('id_perum','desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_simpan_user_promo($data)
    {
        $result = $this->db->insert('user_promo', $data);
        return $result;
    }
}
