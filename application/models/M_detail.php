<?php
class M_detail extends CI_Model
{
    function m_detail_perum($nm_perum)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->where('nm_perum', $nm_perum);
        // $this->db->order_by('id_service', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_detail_fasilitas($nm_perum)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->where('nm_perum', $nm_perum);
        $this->db->Join('fasilitas', 'fasilitas.id_fasilitas_perum = perum.id_perum');
        $query = $this->db->get();
        return $query->result();
    }
    function m_detail_lokasi_terdekat($nm_perum)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->where('nm_perum', $nm_perum);
        $this->db->Join('lokasi_terdekat', 'lokasi_terdekat.id_lokasi_terdekat_perum = perum.id_perum');
        $query = $this->db->get();
        return $query->result();
    }
    function m_detail_tipe($nm_perum)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->where('nm_perum', $nm_perum);
        $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_detail_tipe($nm_perum, $luas_bangunan, $luas_tanah)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
        // $this->db->Join('foto', 'foto.id_foto_tipe = tipe.id_tipe');
        $this->db->where('perum.nm_perum', $nm_perum);
        $this->db->where('tipe.luas_bangunan', $luas_bangunan);
        $this->db->where('tipe.luas_tanah', $luas_tanah);
        // $this->db->where('foto.label_foto', 'display');
        $query = $this->db->get();
        return $query->result();
    }
    function m_detail_marketing($nm_perum)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->where('nm_perum', $nm_perum);
        $this->db->Join('marketperum', 'marketperum.id_marketperum = perum.id_perum');
        $this->db->Join('marketing', 'marketing.id_marketing = marketperum.idmarketing');
        $this->db->ORDER_BY('marketing.id_marketing', 'RANDOM');
        $this->db->LIMIT(1);
        $query = $this->db->get();
        return $query->result();
    }
    function m_detail_cs()
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->Join('marketperum', ' marketperum.idmarketing = marketing.id_marketing ');
        $this->db->where('marketing.id_marketing', '10');
        $query = $this->db->get();
        return $query->result();
    }

    function m_view_tipe($nm_perum, $luas_bangunan, $luas_tanah)
    {
        $sql = "SELECT * FROM tipe, perum WHERE tipe.luas_bangunan = '$luas_bangunan' AND tipe.luas_tanah = '$luas_tanah' AND perum.nm_perum = '$nm_perum'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data_view) {
                $id_tipe = $data_view->id_tipe;
                $add_view = $data_view->view_tipe + 1;
            }
        }
        $update_view = $this->db->set('view_tipe', $add_view)
            ->where('id_tipe', $id_tipe)
            ->update('tipe');
        return $update_view;
    }
}
