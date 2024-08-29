<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_login extends CI_Model
{

    public function run($input)
    {
        $query = $this->db->get_where('user', array('username' => $input['username']));
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (md5($input['password']) == ($data_user->password)) {
                $this->session->set_userdata('id_user', $data_user->id_user);
                $this->session->set_userdata('username', $data_user->username);
                $this->session->set_userdata('privilage', $data_user->privilage);
                $this->session->set_userdata('is_login', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}
