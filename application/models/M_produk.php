<?php
class M_produk extends CI_Model
{

    function m_data_perum($lokasi, $id_company)
    {
        if ($lokasi == '') {
            $this->db->select('*');
            $this->db->from('perum');
            $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
            $this->db->where('perum.id_company_perum', $id_company);
            $this->db->ORDER_BY('order_perum', 'asc');
            // $this->db->ORDER_BY('id_perum', 'RANDOM');
            $query = $this->db->get();
            return $query->result();
        } else {
            $this->db->select('*');
            $this->db->from('perum');
            $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
            $this->db->where('perum.id_company_perum', $id_company);
            $this->db->like('perum.lokasi', $lokasi);
            $this->db->ORDER_BY('order_perum', 'asc');
            // $this->db->ORDER_BY('id_perum', 'RANDOM');
            $query = $this->db->get();
            return $query->result();
        }
    }

    function m_data_tipe($lokasi)
    {
        if ($lokasi == '') {
            $this->db->select('*');
            $this->db->from('tipe');
            $this->db->ORDER_BY('luas_bangunan', 'asc');
            $query = $this->db->get();
            return $query->result();
        } else {
            $this->db->select('*');
            $this->db->from('tipe');
            $this->db->Join('perum', 'tipe.id_tipe_perum = perum.id_perum');
            $this->db->like('perum.lokasi', $lokasi);
            $this->db->ORDER_BY('luas_bangunan', 'asc');
            $query = $this->db->get();
            return $query->result();
        }
    }
}
