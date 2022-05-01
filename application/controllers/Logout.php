<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->session->unset_userdata('user');
        $this->session->set_flashdata('message', 'success|Logout sukses!');
        redirect(base_url('admin'));
    }
}
