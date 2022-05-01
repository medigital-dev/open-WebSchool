<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_model extends CI_Model
{
    public function setData($data)
    {
        return $this->db->insert('pages', $data);
    }

    public function getAll()
    {
        return $this->db->get('pages')->result_array();
    }

    public function getByUrl($url)
    {
        return $this->db->get_where('pages', ['url' => $url])->row_array();
    }

    public function getByIdPage($id)
    {
        return $this->db->get_where('pages', ['id_page' => $id])->row_array();
    }

    public function delete($id)
    {
        return $this->db->delete('pages', ['id_page' => $id]);
    }

    public function update($idBlog, $data)
    {
        return $this->db->update('pages', $data, ['id_page' => $idBlog]);
    }
}
