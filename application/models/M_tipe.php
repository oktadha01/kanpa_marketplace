<?php
class M_tipe extends CI_Model
{

    function m_data_perum()
    {

        $this->db->select('*');
        $this->db->from('perum');
        $this->db->order_by('id_perum', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_tipe_perum($id_tipe_perum)
    {
        $this->db->select('*');
        $this->db->from('tipe');
        $this->db->where('id_tipe_perum', $id_tipe_perum);
        $this->db->order_by('id_tipe', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_add_data_tipe($data)
    {
        $result = $this->db->insert('tipe', $data);
        return $result;
    }
    function m_edit_data_tipe($kategori_tipe, $lantai, $luas_tanah, $luas_bangunan, $hrg, $satuan_hrg, $promo, $balkon, $taman, $carport, $r_tamu, $r_keluarga, $k_tidur, $k_mandi, $r_makan, $dapur, $vr, $id_tipe)
    {

        $update = $this->db->set('kategori_tipe', $kategori_tipe)
            ->set('lantai', $lantai)
            ->set('luas_tanah', $luas_tanah)
            ->set('luas_bangunan', $luas_bangunan)
            ->set('hrg', $hrg)
            ->set('satuan_hrg', $satuan_hrg)
            ->set('promo', $promo)
            ->set('balkon', $balkon)
            ->set('taman', $taman)
            ->set('carport', $carport)
            ->set('r_tamu', $r_tamu)
            ->set('r_keluarga', $r_keluarga)
            ->set('k_tidur', $k_tidur)
            ->set('k_mandi', $k_mandi)
            ->set('r_makan', $r_makan)
            ->set('dapur', $dapur)
            ->set('vr', $vr)
            ->where('id_tipe', $id_tipe)
            ->update('tipe');
        return $update;
    }

    function m_delete_data_tipe($id_tipe)
    {
        $delete = $this->db->where('id_tipe', $id_tipe)
            ->delete('tipe');
        return $delete;
    }
    function m_add_denah_tipe($id_tipe, $denah, $action)
    {
        if ($action == 'lt1') {
            $update = $this->db->set('denah_lt1', $denah)
                ->where('id_tipe', $id_tipe)
                ->update('tipe');
            return $update;
        } else {
            $update = $this->db->set('denah_lt2', $denah)
                ->where('id_tipe', $id_tipe)
                ->update('tipe');
            return $update;
        }
    }

    // function m_edit_data_lokasi_terdekat($id_lokasi_terdekat, $nm_lokasi_terdekat, $jarak_lokasi_terdekat)
    // {
    //     $update = $this->db->set('nm_lokasi_terdekat', $nm_lokasi_terdekat)
    //         ->set('jarak_lokasi_terdekat', $jarak_lokasi_terdekat)
    //         ->where('id_lokasi_terdekat', $id_lokasi_terdekat)
    //         ->update('lokasi_terdekat');
    //     return $update;
    // }
}
