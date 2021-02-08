<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_M');
        $this->load->model('Masyarakat_M');
        $this->load->library('form_validation');
    }

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
        if ($user) {
            // Buat kondisi apakah password yang dimasukan sesuai dengan password dari database
            if (password_verify($password, $user['password'])) {
                // Buat session untuk login
                $this->session->set_userdata([
                    'login' => true,
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'level_id' => $user['level_id']
                ]);

                // Buat session flash data untuk kirim pesan
                $this->session->set_flashdata('success', 'Selamat datang kembali');
                redirect(base_url('dashboard'));
            } else {
                $this->session->set_flashdata('failed', 'Password salah');
                redirect(base_url());
            }
        }else{
            $this->session->set_flashdata('failed', 'Username tidak ditemukan');
            redirect(base_url());
        }
    }

    public function signup()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', [
            'required' => 'Username tidak boleh kosong',
            'is_unique' => 'Username tidak tersedia'
        ]);

        $this->form_validation->set_rules('email', 'email', 'valid_email|required|is_unique[users.email]', [
            'required' => 'Email tidak boleh kosong',
            'unique' => 'Email tidak tersedia',
            'valid_email' => 'Gunakan email yang valid'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'nama tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('telp', 'No Telp', 'required', [
            'required' => 'No Telp tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $dataUser = [
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'level_id' => 3,
            ];

            $user = $this->User_M->insert($dataUser);

            $data = [
                'nama' => $this->input->post('nama', true),
                'telp' => $this->input->post('telp', true),
                'user_id' => $user
            ];

            $this->Masyarakat_M->insert($data);

            $this->session->set_flashdata('success', 'Akun berhasil diregistrasi');
            redirect(base_url());
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        redirect(base_url());
    }
}
