<?php
class M_voucher extends CI_Model
{
    function m_select_data_perum()
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->order_by('nm_perum', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_tipe()
    {
        $this->db->select('*');
        $this->db->from('tipe');
        $this->db->order_by('luas_bangunan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_voucher()
    {
        $this->db->select('*');
        $this->db->from('voucher');
        // $this->db->order_by('nm_perum', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_add_voucher($data)
    {
        $result = $this->db->insert('voucher', $data);
        return $result;
    }
    function m_edit_voucher($id_voucher, $id_perum_voucher, $id_tipe_voucher, $nm_voucher, $wa_voucher, $foto_voucher)
    {
        $update = $this->db->set('id_perum_voucher', $id_perum_voucher)
            ->set('id_tipe_voucher', $id_tipe_voucher)
            ->set('nm_voucher', $nm_voucher)
            ->set('wa_voucher', $wa_voucher)
            ->set('foto_voucher', $foto_voucher)
            ->where('id_voucher', $id_voucher)
            ->update('voucher');
        return $update;
    }
    function m_edit_text_voucher($id_voucher, $id_perum_voucher, $id_tipe_voucher, $nm_voucher, $wa_voucher)
    {
        $update = $this->db->set('id_perum_voucher', $id_perum_voucher)
            ->set('id_tipe_voucher', $id_tipe_voucher)
            ->set('nm_voucher', $nm_voucher)
            ->set('wa_voucher', $wa_voucher)
            ->where('id_voucher', $id_voucher)
            ->update('voucher');
        return $update;
    }
    function m_delete_voucher($id_voucher)
    {
        $delete = $this->db->where('id_voucher', $id_voucher)
            ->delete('voucher');
        return $delete;
    }
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
    function m_detail_tipe($nm_perum, $id_tipe)
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
        $this->db->where('nm_perum', $nm_perum);
        $this->db->where('id_tipe', $id_tipe);
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
    function m_data_detail_voucher($id_perum, $id_tipe)
    {
        $this->db->select('*');
        $this->db->from('voucher');
        $this->db->where('id_perum_voucher', $id_perum);
        $this->db->where('id_tipe_voucher', $id_tipe);
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
