<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tag_model extends CI_Model
{
    public function getAllTag()
    {
        return $this->db->get('tag')->result_array();
    }
    public function getTag($data)
    {
        return $this->db->get_where('tag', ['nama_tag' => $data])->row_array();
    }

    public function setTag($data)
    {
        return $this->db->insert('tag', $data);
    }

    public function getTagById($id)
    {
        return $this->db->get_where('tag', ['id_tag' => $id])->row_array();
    }

    public function getByName($name)
    {
        return $this->db->get_where('tag', ['nama_tag' => $name])->row_array();
    }

    public function getBySlug($slug)
    {
        return $this->db->get_where('tag', ['slug_tag' => $slug])->row_array();
    }

    public function deleteTag($id)
    {
        $this->db->delete('blog_tag', ['id_tag' => $id]);
        return $this->db->delete('tag', ['id_tag' => $id]);
    }

    public function setTagAndBlog($data)
    {
        return $this->db->insert('blog_tag', $data);
    }

    public function getTagBlogByIdBlog($idBlog)
    {
        return $this->db->get_where('blog_tag', ['id_blog' => $idBlog])->result_array();
    }

    public function deleteBlogTagByIdBlog($idBlog)
    {
        return $this->db->delete('blog_tag', ['id_blog' => $idBlog]);
    }

    public function getPostByIdTag($id)
    {
        return $this->db->get_where('blog_tag', ['id_tag' => $id])->result_array();
    }

    public function updateTag($id, $data)
    {
        return $this->db->update('tag', $data, ['id_tag' => $id]);
    }
}
