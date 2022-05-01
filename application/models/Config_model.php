<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config_model extends CI_Model
{
    public function getUploadActive()
    {
        return $this->db->get_where('config_upload', ['upload_is_active' => 1])->row_array();
    }

    public function updateUploadConfig($data)
    {
        return $this->db->update('config_upload', $data, ['id_config_upload' => 1]);
    }
}
