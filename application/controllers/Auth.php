<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('User_M');
        $this->load->model('Masyarakat_M');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // guest adalah helper buatan
        guest();

        // Load view untuk login
        $this->load->view('auth/login');
    }

    public function register()
    {
        guest();

        // load view untuk registrasi
        $this->load->view('auth/register');
    }

    public function login()
    {
        guest();


        // Tampung inputan username & password ke dalam variable
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);

        // Cari data user dari table users berdasarkan username dan tampung ke dalam variable
        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        // Buat kondisi apakah data user ditemukan atau tidak
        if ($user) {
            // Buat kondisi apakah password yang dimasukan sesuai dengan password dari database
            if (password_verify($password, $user['password'])) {
                // Buat session login untuk di kirimkan ke dashboard
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
                // Buat pesan jika password salah
                $this->session->set_flashdata('failed', 'Password salah');
                redirect(base_url());
            }
        } else {
            // Buat pesan jika user tidak ditemukan
            $this->session->set_flashdata('failed', 'Username tidak ditemukan');
            redirect(base_url());
        }
    }

    public function signup()
    {
        guest();

        // Buat validasi atau aturan untuk inputan registrasi
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

        // Buat kondisi untuk validasinya
        if ($this->form_validation->run() == false) {
            // Jika validasinya false atau tidak sesuai maka kembalikan ke method register
            $this->register();
        } else {
            // Jika validasinya benar maka
            // Tampung setiap inputan ke dalam sebuah variable
            $dataUser = [
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'level_id' => 3,
            ];

            // Insert data ke table user dengan memanggil modelnya
            $user = $this->User_M->insert($dataUser);

            // Buat inputan untuk dimasukan kedalam table masyarakat
            $data = [
                'nama' => $this->input->post('nama', true),
                'telp' => $this->input->post('telp', true),
                'user_id' => $user
            ];

            // Masukkan ke dalam table masyarakat dengan memanggil model nya
            $this->Masyarakat_M->insert($data);

            // Beri pesan ketika registrasi berhasil
            $this->session->set_flashdata('success', 'Akun berhasil diregistrasi');
            redirect(base_url());
        }
    }

    public function logout()
    {
        // Hapus semua session yang kita buat tadi di method login
        session_unset();
        session_destroy();
        redirect(base_url());
    }
}
