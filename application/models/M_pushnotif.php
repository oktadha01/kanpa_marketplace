<?php
class M_pushnotif extends CI_Model
{
    function m_delete_subscribers($endpoint)
    {
        $delete = $this->db->where_in('endpoint', $endpoint)
            ->delete('push_subscribers');
        return $delete;
    }
}
