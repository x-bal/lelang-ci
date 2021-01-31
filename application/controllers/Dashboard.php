<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Buat kondisi jika user tidak melakukan login, maka akan di kembalikan ke halaman login
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/index');
        $this->load->view('layouts/footer');
    }
}
