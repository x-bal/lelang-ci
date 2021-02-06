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

        $this->load->model("Lelang_M");
        $this->load->model("User_M");
        $this->load->model("Dashboard_M");
        $this->load->model("Masyarakat_M");
        $this->load->model("Petugas_M");
        $this->load->helper('rupiah_helper');
        $this->load->library('form_validation');
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

    public function lelang()
    {
        $data = [
            'title' => 'Lelang Barang',
            'lelang' => $this->Lelang_M->barangLelang()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/lelang');
        $this->load->view('layouts/footer');
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile'
        ];
        $id=$this->session->userdata('id_user');

        if($this->session->userdata('level_id')==1 || $this->session->userdata('level_id') ==2)
        {
            $data['profile'] = $this->Petugas_M->user($id);
        }else {
            $data['profile'] = $this->Masyarakat_M->user($id);
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/profile');
        $this->load->view('layouts/footer');
    }

    public function updateProfile()
    {
        $idUser=$this->session->userdata('id_user');

        $data=[
            'nama' => $this->input->post('nama', true),
            'telp' => $this->input->post('no_tlp',true)
        ];

        if ($this->session->userdata('level_id')==1 || $this->session->userdata('level_id') ==2)
        {
            $petugas=$this->Petugas_M->user($idUser);
            $this->Petugas_M->update($petugas['id_petugas'],$data);
            redirect(base_url('dashboard'));
        }else{
            $masyarakat=$this->Masyarakat_M->user($id_user);
            $this->Masyarakat_M->update($masyarakat['id_masyarakat'],$data);
            redirect(base_url('dashboard'));
        }
    }

}
