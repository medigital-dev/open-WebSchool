<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_tag_model extends CI_Model
{
    public function getByIdTag($id_tag)
    {
        return $this->db->get_where('blog_tag', ['id_tag' => $id_tag])->result_array();
    }

    public function getAll()
    {
        return $this->db->get('blog_tag')->result_array();
    }
}
