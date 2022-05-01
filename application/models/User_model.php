<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('user')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function getByUsername($username)
    {
        return $this->db->get_where('user', ['username' => $username])->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('user', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('user', $data, ['id_user' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('user', ['id_user' => $id]);
    }
}
