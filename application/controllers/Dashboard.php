<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('dashboard/index');
        $this->load->view('layouts/footer');
    }
}
