<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NA extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'Tag',
            'user' => $_SESSION['user'],
            'sidebar' => '404'
        ];

        $this->load->view('template/sbadmin/header', $data);
        $this->load->view('template/sbadmin/sidebar');
        $this->load->view('template/sbadmin/navbar');
        $this->load->view('404/index');
        $this->load->view('template/sbadmin/footer');
        $this->session->unset_userdata('post');
    }
}
