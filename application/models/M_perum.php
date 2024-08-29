<?php
class M_perum extends CI_Model
{

    function m_data_perum()
    {

        // if ($title == 'perumahan') {

        $this->db->select('*');
        $this->db->from('perum');
        // $this->db->where('id_perum');
        $this->db->order_by('order_perum', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_simpan_perum($nm_perum, $kode_perum, $alamat, $map,  $url_map, $deskripsi, $meta_deskripsi, $logo, $video)
    {
        $data = array(
            'nm_perum' => $nm_perum,
            'kode_perum' => $kode_perum,
            'alamat' => $alamat,
            'map' => $map,
            'url_map' => $url_map,
            'deskripsi' => $deskripsi,
            'meta_deskripsi' => $meta_deskripsi,
            'logo' => $logo,
            'video' => $video,
        );
        $result = $this->db->insert('perum', $data);
        return $result;
    }
    function m_edit_perum($id_perum, $nm_perum, $kode_perum, $alamat, $map,  $url_map, $deskripsi, $meta_deskripsi, $video)
    {
        $update = $this->db->set('nm_perum', $nm_perum)
            ->set('kode_perum', $kode_perum)
            ->set('alamat', $alamat)
            ->set('map', $map)
            ->set('url_map', $url_map)
            ->set('deskripsi', $deskripsi)
            ->set('meta_deskripsi', $meta_deskripsi)
            ->set('video', $video)
            ->where('id_perum', $id_perum)
            ->update('perum');
        return $update;
    }
    function m_edit_logo_perum($id_perum, $nm_perum, $kode_perum, $alamat, $map,  $url_map, $deskripsi, $meta_deskripsi, $logo, $video)
    {
        $update = $this->db->set('nm_perum', $nm_perum)
            ->set('kode_perum', $kode_perum)
            ->set('alamat', $alamat)
            ->set('map', $map)
            ->set('url_map', $url_map)
            ->set('deskripsi', $deskripsi)
            ->set('meta_deskripsi', $meta_deskripsi)
            ->set('logo', $logo)
            ->set('video', $video)
            ->where('id_perum', $id_perum)
            ->update('perum');
        return $update;
    }
    function m_status_perum($id_perum, $status_perum)
    {
        $update = $this->db->set('status_perum', $status_perum)
            ->where('id_perum', $id_perum)
            ->update('perum');
        return $update;
    }
    
    function m_move_columns($id_perum, $order_perum){
        $update = $this->db->set('order_perum', $order_perum)
            ->where('id_perum', $id_perum)
            ->update('perum');
        return $update;    
     }
}
