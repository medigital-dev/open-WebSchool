<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('Model_web_config', 'm_webConfig');
        $this->load->model('Model_media_sosial', 'm_mediaSosial');
        $this->load->model('Model_identitas', 'm_identitas');
        $this->load->model('Model_menu', 'm_menu');
        $this->load->model('Model_home_content', 'm_homeContent');
    }

    public function index()
    {
        $webConfig = $this->m_webConfig->get();
        $mediaSosial = $this->m_mediaSosial->get();
        $identitas = $this->m_identitas->get();
        $mainMenu = $this->m_menu->get(['parent_id' => 0]);
        $allMenu = $this->m_menu->get();
        $dataHome = $this->m_homeContent->get();

        $data = [
            'title' => ($webConfig) ? $webConfig[0]['judul'] . ' | Homepage' : 'webSchool',
            'webConfig' => $webConfig,
            'menuUtama' => $mainMenu,
            'allMenu' => $allMenu,
            'dataMedsos' => $mediaSosial,
            'identitas' => $identitas,
            'homeContent' => $dataHome,
        ];

        $this->load->view('template/public/header-new', $data);
        $this->load->view('public/index');
        $this->load->view('template/public/footer-new');
    }
}
