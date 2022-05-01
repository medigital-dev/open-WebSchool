<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{
    public function setMessage($data)
    {
        return $this->db->insert('pesan', $data);
    }

    public function getAll()
    {
        return $this->db->get('pesan')->result_array();
    }

    public function getUnread()
    {
        return $this->db->get_where('pesan', ['is_read' => 0])->result_array();
    }

    public function update($id, $data)
    {
        return $this->db->update('pesan', $data, ['id_pesan' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('pesan', ['id_pesan' => $id]);
    }
}
