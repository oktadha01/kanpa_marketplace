<?php
class M_lokasi_terdekat extends CI_Model
{

    function m_data_perum()
    {

        $this->db->select('*');
        $this->db->from('perum');
        $this->db->order_by('id_perum', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_lokasi_terdekat_perum($id_lokasi_terdekat_perum)
    {
        $this->db->select('*');
        $this->db->from('lokasi_terdekat');
        $this->db->where('id_lokasi_terdekat_perum', $id_lokasi_terdekat_perum);
        $this->db->order_by('id_lokasi_terdekat', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_add_data_lokasi_terdekat($id_lokasi_terdekat_perum, $nm_lokasi_terdekat, $jarak_lokasi_terdekat)
    {
        $data = array(
            'id_lokasi_terdekat_perum' => $id_lokasi_terdekat_perum,
            'nm_lokasi_terdekat' => $nm_lokasi_terdekat,
            'jarak_lokasi_terdekat' => $jarak_lokasi_terdekat,
        );
        $result = $this->db->insert('lokasi_terdekat', $data);
        return $result;
    }
    function m_edit_data_lokasi_terdekat($id_lokasi_terdekat, $nm_lokasi_terdekat, $jarak_lokasi_terdekat)
    {
        $update = $this->db->set('nm_lokasi_terdekat', $nm_lokasi_terdekat)
            ->set('jarak_lokasi_terdekat', $jarak_lokasi_terdekat)
            ->where('id_lokasi_terdekat', $id_lokasi_terdekat)
            ->update('lokasi_terdekat');
        return $update;
    }
    function m_delete_data_lokasi_terdekat($id_lokasi_terdekat)
    {
        $delete = $this->db->where('id_lokasi_terdekat', $id_lokasi_terdekat)
            ->delete('lokasi_terdekat');
        return $delete;
    }
}
