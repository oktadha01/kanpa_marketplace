<?php
class M_marketing extends CI_Model
{
    function m_data_marketing()
    {
        $this->db->select('*');
        $this->db->from('marketing');
        // $this->db->Join('perum', 'perum.id_perum = marketing.perum_id');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_perum()
    {
        $this->db->select('*');
        $this->db->from('perum');
        // $this->db->Join('perum', 'perum.id_marketperum = marketing.id_marketing ');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_foto_st()
    {
        $this->db->select('*');
        $this->db->from('serah_terima');
        // $this->db->order_by('id_st', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_simpan_data_marketing($nm_marketing, $foto_marketing, $foto_header)
    {
        $data = array(
            'nm_marketing' => $nm_marketing,
            'foto_marketing' => $foto_marketing,
            'foto_header' => $foto_header,
        );
        $result = $this->db->insert('marketing', $data);
        return $result;
    }
    function m_simpan_data_marketperum($id_marketing, $id_perum, $bitly)
    {
        $data = array(
            'idmarketing' => $id_marketing,
            'id_marketperum' => $id_perum,
            'bitly' => $bitly,
        );
        $result = $this->db->insert('marketperum', $data);
        return $result;
    }

    function m_switch_data_marketperum($id_market, $status)
    {
        $update = $this->db->set('status_marketperum', $status)
            ->where('id_market', $id_market)
            ->update('marketperum');
        return $update;
    }

    function m_delete_data_marketperum($id_market)
    {
        $delete = $this->db->where('id_market', $id_market)
            ->delete('marketperum');
        return $delete;
    }
    function m_edit_data_foto_marketing($id_marketing, $nm_marketing, $foto_marketing)
    {
        $update = $this->db->set('nm_marketing', $nm_marketing)
            ->set('foto_marketing', $foto_marketing)
            ->where('id_marketing', $id_marketing)
            ->update('marketing');
        return $update;
    }
    function m_edit_data_foto_marketing_header($id_marketing, $nm_marketing, $foto_marketing_header)
    {
        $update = $this->db->set('nm_marketing', $nm_marketing)
            ->set('foto_header', $foto_marketing_header)
            ->where('id_marketing', $id_marketing)
            ->update('marketing');
        return $update;
    }
    function m_edit_data_marketing($id_marketing, $nm_marketing)
    {
        $update = $this->db->set('nm_marketing', $nm_marketing)
            ->where('id_marketing', $id_marketing)
            ->update('marketing');
        return $update;
    }
    function m_delete_data_marketing($id_marketing)
    {
        $delete_marketing = $this->db->where('id_marketing', $id_marketing)
            ->delete('marketing');
        $delete_marketperum = $this->db->where('idmarketing', $id_marketing)
            ->delete('marketperum');

        return $delete_marketing;
        return $delete_marketperum;
    }
    function m_simpan_data_foto_st($data)
    {
        $result = $this->db->insert('serah_terima', $data);
        return $result;
    }
    function m_delete_data_st($id_st){
        $delete = $this->db->where('id_st', $id_st)
        ->delete('serah_terima');
    return $delete;
    }
}
