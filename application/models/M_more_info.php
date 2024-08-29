<?php
class M_more_info extends CI_Model
{

    function m_data_more_info($id_company)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->Join('marketperum', 'marketperum.id_marketperum = perum.id_perum');
        $this->db->Join('marketing', 'marketing.id_marketing = marketperum.idmarketing');
        $this->db->where('perum.id_company_perum', $id_company);
        $this->db->where('marketperum.status_marketperum', 'aktif');
        $this->db->ORDER_BY('marketperum.order_marketing', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_cs()
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->Join('marketperum', ' marketperum.idmarketing = marketing.id_marketing ');
        $this->db->where('marketing.id_marketing', '10');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_detail_cs($nm_marketing, $id_perum)
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->Join('marketperum', ' marketperum.idmarketing = marketing.id_marketing ');
        $this->db->where('marketperum.id_marketperum', $id_perum);
        $this->db->where('marketing.nm_marketing', $nm_marketing);
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_foto_st()
    {
        $this->db->select('*');
        $this->db->from('serah_terima');
        $this->db->order_by('id_st', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}
