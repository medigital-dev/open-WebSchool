<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_menu extends CI_Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';

    public function get($where = [])
    {
        $this->db->from($this->table);
        $this->db->order_by('urutan', 'ASC');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function save($data = [])
    {
        if (!isset($data[$this->primaryKey])) {
            return $this->db->insert($this->table, $data);
        } else {
            return $this->db->update($this->table, $data, [$this->primaryKey => $data[$this->primaryKey]]);
        }
    }

    public function delete($where = [])
    {
        return $this->db->delete($this->table, $where);
    }
}
