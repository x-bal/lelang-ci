<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();

        $this->load->model("Lelang_M");
        $this->load->model("History_M");
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
            'title' => 'Dashboard',
            'lelang' => $this->Lelang_M->getMasyarakat($this->session->userdata('id_user')),
            'penawaran' => $this->History_M->getMasyarakat($this->session->userdata('id_user'))
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/index');
        $this->load->view('layouts/footer');
    }

    public function lelang()
    {
        guard([3]);
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
        $id = $this->session->userdata('id_user');

        if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
            $data['profile'] = $this->User_M->petugas($id);
        } else {
            $data['profile'] = $this->User_M->masyarakat($id);
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/profile');
        $this->load->view('layouts/footer');
    }

    public function updateProfile()
    {
        $idUser = $this->session->userdata('id_user');

        $data = [
            'nama' => $this->input->post('nama', true),
            'telp' => $this->input->post('no_tlp', true)
        ];

        if ($this->session->userdata('level_id') == 1 || $this->session->userdata('level_id') == 2) {
            $petugas = $this->User_M->petugas($idUser);
            if ($this->input->post('password', true) != null) {
                $password = [
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
                ];
                $this->User_M->update($idUser, $password);
                $this->Petugas_M->update($petugas['id_petugas'], $data);

                $this->session->set_flashdata('success', 'Profile berhasil diupdate');
                redirect(base_url('dashboard'));
            } else {
                $password = ['password' => $petugas['password']];
                $this->Petugas_M->update($petugas['id_petugas'], $data);
                $this->User_M->update($idUser, $password);

                $this->session->set_flashdata('success', 'Profile berhasil diupdate');
                redirect(base_url('dashboard'));
            }
        } else {
            $masyarakat = $this->User_M->masyarakat($idUser);
            if ($this->input->post('password', true) != null) {
                $password = ['password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)];

                $this->User_M->update($idUser, $password);
                $this->Masyarakat_M->update($masyarakat['id_masyarakat'], $data);
                $this->session->set_flashdata('success', 'Profile berhasil diupdate');
                redirect(base_url('dashboard'));
            } else {
                $password = ['password' => $masyarakat['password']];
                $this->User_M->update($idUser, $password);
                $this->Masyarakat_M->update($masyarakat['id_masyarakat'], $data);

                $this->session->set_flashdata('success', 'Profile berhasil diupdate');
                redirect(base_url('dashboard'));
            }
        }
    }
}
