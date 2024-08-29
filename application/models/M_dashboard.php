<?php
class M_dashboard extends CI_Model
{

    function m_data_outher_header()
    {
        $this->db->select('*');
        $this->db->from('foto_header');
        $this->db->where('id_foto_perum', 'outher_header');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_fotoslide_subsidi()
    {
        $this->db->select('*');
        $this->db->from('foto_header');
        $this->db->where('id_foto_perum', 'header_sub');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_fotoslide_perumahan($id_company)
    {
        $this->db->select('foto_header.*,perum.id_company_perum');
        $this->db->from('foto_header');
        $this->db->Join('perum', 'perum.id_perum = foto_header.id_foto_perum');
        $this->db->where('id_company_perum', $id_company);

        $this->db->where('status_foto_header', 'show-dashboard');
        $this->db->where('kategori_foto', 'perumahan');
        // $this->db->ORDER_BY('id_foto', 'RANDOM');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_fotoslide_promo()
    {
        $this->db->select('*');
        $this->db->from('foto_header');
        $this->db->where('status_foto_header', 'show-dashboard');
        $this->db->where('kategori_foto', 'promo');
        // $this->db->ORDER_BY('id_foto', 'RANDOM');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_tipe_desc()
    {
        $this->db->select('*');
        $this->db->from('tipe');
        $this->db->Join('perum', 'perum.id_perum = tipe.id_tipe_perum');
        $this->db->GROUP_BY('id_tipe_perum');
        $this->db->ORDER_BY('hrg', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_perum($id_company)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->where('id_company_perum', $id_company);
        $this->db->where('status_perum', 'Direkomendasikan');
        $this->db->ORDER_BY('order_perum', 'asc');
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
    function m_data_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->ORDER_BY('id_berita', 'desc');
        $this->db->LIMIT(4);
        $query = $this->db->get();
        return $query->result();
    }

    function m_detail_marketing()
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->where('nm_marketing', 'Customer Service');
        $this->db->Join('marketperum', 'marketperum.idmarketing = marketing.id_marketing');
        // $this->db->Join('marketing', 'marketing.id_marketing = marketperum.idmarketing');
        $query = $this->db->get();
        return $query->result();
    }
}
