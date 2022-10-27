<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('templates/aute_header');
        $this->load->view('auth/login');
        $this->load->view('templates/aute_footer');
    }

    public function registration()
    {
        // FORM VALIDASI DENGAN MENGGUNAKAKAN CODEIGNITER, ADA DI DOKUMENTASI UNTUK RULESNYA
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pendafataran Akun Pengguna';
            $this->load->view('templates/aute_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/aute_footer');
        } else {
            echo "Data berhasil ditambahkan";
        }
    }
}
