<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medsos_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('media_sosial')->row_array();
    }

    public function set($data)
    {
        return $this->db->insert('media_sosial', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('media_sosial', $data, ['id_medsos' => $id]);
    }
}
