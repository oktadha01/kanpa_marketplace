<?php
class M_foto extends CI_Model
{

    function m_data_perum()
    {

        $this->db->select('*');
        $this->db->from('perum');
        $this->db->order_by('id_perum', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_tipe()
    {

        $this->db->select('*');
        $this->db->from('perum');
        $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
        $this->db->order_by('tipe.id_tipe', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_foto_perum($id_foto_tipe)
    {
        $this->db->select('*');
        $this->db->from('foto');
        $this->db->where('id_foto_tipe', $id_foto_tipe);
        // $this->db->order_by('id_foto', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_add_foto($data)
    {
        $result = $this->db->insert('foto', $data);
        return $result;
    }
    function m_edit_foto($id_foto, $foto_tipe, $label_foto)
    {
        $update = $this->db->set('foto_tipe', $foto_tipe)
            ->set('label_foto', $label_foto)
            ->where('id_foto', $id_foto)
            ->update('foto');
        return $update;
    }
    function m_edit_label_foto($id_foto, $label_foto)
    {
        $update = $this->db->set('label_foto', $label_foto)
            ->where('id_foto', $id_foto)
            ->update('foto');
        return $update;
    }
    function m_delete_foto($id_foto)
    {
        $delete = $this->db->where('id_foto', $id_foto)
            ->delete('foto');
        return $delete;
    }

    function m_set_foto_header($id_foto_perum, $header_foto, $kategori_foto)
    {
        $update = $this->db->set('header_foto', $header_foto)
            ->set('kategori_foto', $kategori_foto)
            ->where('id_foto_perum', $id_foto_perum)
            ->update('foto_header');
        return $update;
    }
    function m_add_foto_header($data)
    {
        $result = $this->db->insert('foto_header', $data);
        return $result;
    }
    function m_add_outher_header($data)
    {
        $result = $this->db->insert('foto_header', $data);
        return $result;
    }
    function m_show_foto_dashboard($id_foto_header, $status_foto_header)
    {
        $update = $this->db->set('status_foto_header', $status_foto_header)
            ->where('id_foto_header', $id_foto_header)
            ->update('foto_header');
        return $update;
    }
    function m_edit_foto_header($id_foto_header, $kategori_foto, $text_wa, $url_siteplan)
    {
        if ($kategori_foto == 'promo') {
            $update = $this->db->set('text_wa', $text_wa)
                ->where('id_foto_header', $id_foto_header)
                ->update('foto_header');
            return $update;
        } else if ($kategori_foto == 'siteplan') {
            $update = $this->db->set('url_siteplan', $url_siteplan)
                ->where('id_foto_header', $id_foto_header)
                ->update('foto_header');
            return $update;
        }
    }
    function m_delete_foto_header($id_foto_header)
    {
        $delete = $this->db->where('id_foto_header', $id_foto_header)
            ->delete('foto_header');
        return $delete;
    }
}
