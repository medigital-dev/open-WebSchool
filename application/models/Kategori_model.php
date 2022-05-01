<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function getAllKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategori($nama)
    {
        return $this->db->get_where('kategori', ['nama_kategori' => $nama])->row_array();
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
    }

    public function getKategoriByName($name)
    {
        return $this->db->get_where('kategori', ['nama_kategori' => $name])->row_array();
    }

    public function getKategoriBySlug($slug)
    {
        return $this->db->get_where('kategori', ['slug_kategori' => $slug])->row_array();
    }

    public function setKategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function deleteKategori($id)
    {
        return $this->db->delete('kategori', ['id_kategori' => $id]);
    }

    public function updateKategori($id, $data)
    {
        return $this->db->update('kategori', $data, ['id_kategori' => $id]);
    }
}
