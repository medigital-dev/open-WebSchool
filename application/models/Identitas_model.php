<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identitas_model extends CI_Model
{
    public function get()
    {
        return $this->db->get('identitas')->row_array();
    }

    public function set($data)
    {
        return $this->db->insert('identitas', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('identitas', $data, ['id_sekolah' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('identitas', ['id_sekolah' => $id]);
    }
}
