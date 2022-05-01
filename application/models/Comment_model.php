<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{
    public function getAllComment()
    {
        $this->db->order_by('date_comment', 'DESC');
        return $this->db->get('komentar')->result_array();
    }

    public function getByIdKomentar($id)
    {
        return $this->db->get_where('komentar', ['id_komentar' => $id])->row_array();
    }

    public function getAllPublicComment()
    {
        $this->db->order_by('date_comment', 'DESC');
        return $this->db->get_where('komentar', ['parent_comment' => null])->result_array();
    }

    public function getAllChildComment()
    {
        $this->db->order_by('date_comment', 'DESC');
        return $this->db->get_where('komentar', ['parent_comment!=' => null])->result_array();
    }

    public function getCommentByIdPost($id)
    {
        $this->db->order_by('date_comment', 'DESC');
        return $this->db->get_where('komentar', ['id_blog' => $id])->result_array();
    }

    public function getByIdPostNIsParent($id)
    {
        $this->db->order_by('date_comment', 'DESC');
        return $this->db->get_where('komentar', ['id_blog' => $id, 'parent_comment' => null])->result_array();
    }

    public function getByIdPostNIsChild($idPost)
    {
        $this->db->order_by('date_comment', 'DESC');
        return $this->db->get_where('komentar', ['id_blog' => $idPost, 'parent_comment!=' => null])->result_array();
    }

    public function setPublikKomentar($data)
    {
        return $this->db->insert('komentar', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('komentar', ['id_komentar' => $id]);
    }

    public function update($id, $data)
    {
        return $this->db->update('komentar', $data, ['id_komentar' => $id]);
    }

    public function getUnread()
    {
        $this->db->order_by('date_comment', 'DESC');
        return $this->db->get_where('komentar', ['is_read' => 0])->result_array();
    }
}
