<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CLogin_model extends CI_Model
{
    public function getUser($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function getLevel($id)
    {
        return $this->db->get_where('level_user', ['id_level' => $id])->row_array();
    }

    public function getAllLevel()
    {
        return $this->db->get('level_user')->result_array();
    }
}
