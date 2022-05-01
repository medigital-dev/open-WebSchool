<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_model extends CI_Model
{
    public function set($data)
    {
        return $this->db->insert('upload', $data);
    }

    public function deleteByName($name)
    {
        return $this->db->delete('upload', ['nama_file' => $name]);
    }

    public function update($id, $data)
    {
        return $this->db->update('upload', $data, ['id_upload' => $id]);
    }

    public function getAll()
    {
        $this->db->order_by('date_upload', 'DESC');
        return $this->db->get('upload')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('upload', ['id_upload' => $id])->row_array();
    }

    public function deleteById($id)
    {
        return $this->db->delete('upload', ['id_upload' => $id]);
    }
}
