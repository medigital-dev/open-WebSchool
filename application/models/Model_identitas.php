<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_identitas extends CI_Model
{
    protected $table = 'identitas';
    protected $primaryKey = 'id_sekolah';

    public function get($where = [])
    {
        $this->db->where($where);
        $this->db->from($this->table);
        return $this->db->get()->result_array();
    }

    public function save($data = [])
    {
        if (empty($this->get([$this->primaryKey => $data[$this->primaryKey]])) || !isset($data[$this->primaryKey])) {
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
