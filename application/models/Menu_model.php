<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getAll()
    {
        $this->db->order_by('urutan', 'ASC');
        return $this->db->get('menu')->result_array();
    }

    public function getMainMenu()
    {
        $this->db->order_by('urutan', 'ASC');
        return $this->db->get_where('menu', ['parent_id' => 0])->result_array();
    }

    public function getChildMenu()
    {
        $this->db->order_by('urutan', 'ASC');
        return $this->db->get_where('menu', ['parent_id !=' => 0])->result_array();
    }

    public function getByParentId($id)
    {
        $this->db->order_by('urutan', 'ASC');
        return $this->db->get_where('menu', ['parent_id' => $id])->result_array();
    }

    public function getDefaultMenu()
    {
        $this->db->order_by('urutan', 'ASC');
        return $this->db->get_where('menu', ['tipe' => 'Default'])->result_array();
    }

    public function getLinkMenu()
    {
        $this->db->order_by('urutan', 'ASC');
        return $this->db->get_where('menu', ['tipe' => 'Link'])->result_array();
    }

    public function getDropdownMenu()
    {
        $this->db->order_by('urutan', 'ASC');
        return $this->db->get_where('menu', ['tipe' => 'Dropdown'])->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('menu', ['id_menu' => $id])->row_array();
    }

    public function set($data)
    {
        return $this->db->insert('menu', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('menu', $data, ['id_menu' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('menu', ['id_menu' => $id]);
    }
}
