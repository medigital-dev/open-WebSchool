<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('CLogin_model');
        $this->load->model('Identitas_model');

        if (isset($_SESSION['user'])) {
            redirect(base_url('admin'));
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim');
        $this->form_validation->set_message('required', '%s wajib diisi!');

        $data = [
            'title' => 'Masuk ke Halaman Admin'
        ];

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index', $data);
            $this->session->unset_userdata('message');
        } else {
            $this->CLogin();
        }
    }

    private function CLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->CLogin_model->getUser($username);
        $identitas = $this->Identitas_model->get();

        if ($user) {
            $level = $this->CLogin_model->getLevel($user['level']);
            $level = $level['nama_level'];
            if (password_verify($password, $user['password'])) {
                if ($user['is_active'] == 0) {
                    $this->session->set_flashdata('message', 'error|User anda tidak aktif, silahkan hubungi administrator!');
                    redirect('auth');
                }
                $data = [
                    'id' => $user['id_user'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'telepon' => $user['telepon'],
                    'level' => $level
                ];

                $this->session->set_userdata('user', $data);

                if ($identitas) {
                    $dataSekolah = [
                        'nama' => $identitas['nama_sekolah'],
                        'logo' => $identitas['logo']
                    ];
                } else {
                    $dataSekolah = [
                        'nama' => '',
                        'logo' => ''
                    ];
                }
                $this->session->set_userdata('sekolah', $dataSekolah);
                $this->session->set_flashdata('message', 'success|Login sukses!');
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', 'error|Password Salah!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', 'error|Username tidak ditemukan!');
            redirect('auth');
        }
    }
}
