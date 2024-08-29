<?php
class M_surat extends CI_Model
{

    // function m_architecture()
    // {
    //     $this->db->select('*');
    //     $this->db->from('service');
    //     $this->db->join('project_service', 'project_service.id_service_project = service.id_service');
    //     $this->db->join('foto', 'foto.id_foto_service = project_service.id_project');
    //     $this->db->GROUP_BY('service.id_service');
    //     // $this->db->order_by('id_jp', 'desc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    function m_surat_promo($nik)
    {
        $this->db->select('*');
        $this->db->from('user_promo');
        $this->db->where('nik', $nik);
        // $this->db->ORDER_BY('id_foto', 'RANDOM');
        $query = $this->db->get();
        return $query->result();
    }
}
