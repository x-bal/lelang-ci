<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function login()
    {
        // Tampung inputan username & password ke dalam variable
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        // Cari data user dari table users berdasarkan username dan tampung ke dalam variable
        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        // Buat kondisi apakah data user ditemukan atau tidak
        if($user){
            // Buat kondisi apakah password yang dimasukan sesuai dengan password dari database
            if(password_verify($password, $user['password'])){
                // Buat session untuk login
                $this->session->set_userdata([
                    'login' => true,
                    'username' => $user['username'],
                    'level_id' => $user['level_id']
                ]);
                
                // Buat session flash data untuk kirim pesan
                $this->session->set_flashdata('success', 'Selamat datang kembali');
                redirect(base_url('dashboard'));
            }else{
                
            }
        }
    }
}
