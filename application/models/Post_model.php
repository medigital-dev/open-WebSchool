<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_model extends CI_Model
{
    public function setPost($data)
    {
        return $this->db->insert('blog', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('blog', ['id' => $id])->row_array();
    }

    public function getAllPost()
    {
        $this->db->order_by('date', 'DESC');
        return $this->db->get('blog')->result_array();
    }

    public function getLatestPost($i)
    {
        $this->db->order_by('date', 'DESC');
        $this->db->limit($i);
        return $this->db->get('blog')->result_array();
    }

    public function getPinned()
    {
        return $this->db->get_where('blog', ['pin' => 1])->row_array();
    }

    public function getPostWithLimit($limit, $start)
    {
        $this->db->order_by('date', 'DESC');
        return $this->db->get('blog', $limit, $start)->result_array();
    }

    public function getPostById($id)
    {
        $this->db->where('id_blog', $id);
        return $this->db->get('blog')->row_array();
    }

    public function getPostByKategori($kategori)
    {
        $this->db->order_by('date', 'DESC');
        return $this->db->get_where('blog', ['kategori' => $kategori])->result_array();
    }

    public function getBySearch($keyword)
    {
        $this->db->order_by('date', 'DESC');
        $this->db->like('judul', $keyword);
        return $this->db->get('blog')->result_array();
    }

    public function getByYearMonth($tahun, $bulan)
    {
        $this->db->order_by('date', 'DESC');
        $this->db->where('tahun', $tahun);
        $this->db->where('bulan', $bulan);
        return $this->db->get('blog')->result_array();
    }

    public function deletePost($id)
    {
        return $this->db->delete('blog', ['id_blog' => $id]);
    }

    public function getPostByLink($link)
    {
        $this->db->order_by('date', 'DESC');
        return $this->db->get_where('blog', ['link' => $link])->row_array();
    }

    public function updatePost($id, $data)
    {
        $this->db->where('id_blog', $id);
        return $this->db->update('blog', $data);
    }
}
