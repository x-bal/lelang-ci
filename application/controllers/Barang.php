<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model yang dibutuhkan
        $this->load->model('Barang_M');
        $this->load->library('form_validation');
        $this->load->helper('rupiah_helper');

        // Panggil method auth yang dibuat di helper
        auth();
    }

    public function index()
    {
        // Panggil method guard dari helper
        guard([1, 2]);

        // Buat variable untuk menampung data yang akan kita kirim
        $data = [
            'title' => 'Data Barang',
            'barang' =>  $this->Barang_M->get()
        ];

        // Load view yang akan kita tuju
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/index');
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        guard([1, 2]);

        // Buat variable untuk menampung data yang akan kita kirimkan ke view
        $data = [
            'title' => 'Tambah Barang',
        ];

        // Loag view untuk tambah barang
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/create');
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        guard([1, 2]);

        // buat validasi atau aturan untuk inputan di form tambah barang
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required', [
            'required' => 'Nama barang tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('harga_awal', 'Harga awal', 'required', [
            'required' => 'Harga awal tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi tidak boleh kosong'
        ]);

        // Buat kondisi untuk validasinya
        if ($this->form_validation->run() == false) {
            // Jika validasinya bernilai true atau validasinya tidak sesuai, Maka kembalikan ke method create
            $this->create();
        } else {
            // Jika validasinya benar maka ->

            // Buat config untuk upload gambar barang
            $config = [
                'allowed_types' => 'jpg|png|jpeg|jfif',
                'upload_path' => './assets/images/barang',
                'detect_mime' => true,
                'encrypt_name' => true
            ];

            // Load library untuk upload *bawaan ci
            $this->load->library('upload', $config);

            // Buat kondisi apakah inputan images melakukan upload dan sesuai dengan aturan di config
            if ($this->upload->do_upload('images')) {
                // Jika ada dan sesuai maka tampung nama gambar yang kita upload ke dalam variable image
                $image = $this->upload->data('file_name');
            } else {
                // Jika tidak ada dan tidak sesuai, maka tampilkan pesan error nya
                echo $this->upload->display_errors();
            }

            // Tampung isi dari variable image tadi ke dalam variable imageName
            $imageName = $image;

            // Tampung semua data inputan dari form ke dalam sebuah variable
            $data = [
                'nama_barang' => $this->input->post('nama_barang', true),
                'harga_awal' => $this->input->post('harga_awal', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'images' => $imageName
            ];

            // Masukkan data dalam variable data ke table barang dengan memanggil modelnya
            $this->Barang_M->insert($data);

            // Buat pesan untuk notifikasi
            $this->session->set_flashdata('success', 'Barang berhasil ditambahkan');
            redirect(base_url('barang'));
        }
    }

    // public function show($id)
    // {
    //     $data = [
    //         'title' => 'Detail Barang',
    //         'barang' => $this->Barang_M->first($id)
    //     ];

    //     $this->load->view('layouts/header', $data);
    //     $this->load->view('layouts/sidebar', $data);
    //     $this->load->view('barang/show');
    //     $this->load->view('layouts/footer');
    // }

    public function edit($id)
    {
        guard([1, 2]);

        // Tampung data yang akan kita kirim ke dalam sebuah variable
        $data = [
            'title' => 'Edit Barang',
            // Ambil data barang (1 baris data)
            'barang' => $this->Barang_M->first($id)
        ];

        // Load view untuk edit barang
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/edit');
        $this->load->view('layouts/footer');
    }

    public function update($id)
    {
        guard([1, 2]);

        // Buat validasi aturan untuk inputan edit barang
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required', [
            'required' => 'Nama barang tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('harga_awal', 'Harga awal', 'required', [
            'required' => 'Harga awal tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi tidak boleh kosong'
        ]);

        // Sama seperti di method store
        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $config = [
                'allowed_types' => 'jpg|png|jpeg|jfif',
                'upload_path' => './assets/images/barang',
                'detect_mime' => true,
                'encrypt_name' => true
            ];

            $this->load->library('upload', $config);

            // Karena edit maka kita beri pilihan apakah gambarnya akan diganti atau tidak
            if ($_FILES['images']['name'] == null) {
                // Jika gambar tidak diganti atau inputan images tidak diisi, maka gunakan gambar lama
                $image = $this->input->post('image_awal');
            } else {
                // Jika inputan images di isi maka
                if ($this->upload->do_upload('images')) {
                    // Upload gambar baru, tampung namanya ke dalam variable
                    $image = $this->upload->data('file_name');
                    // Hapus gambar yang lama
                    unlink(FCPATH . 'assets/images/barang/' . $this->input->post('image_awal'));
                } else {
                    echo $this->upload->display_errors();
                }
            }

            // Sama dengan method store
            $imageName = $image;

            $data = [
                'nama_barang' => $this->input->post('nama_barang', true),
                'harga_awal' => $this->input->post('harga_awal', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'images' => $imageName
            ];

            // Panggil model update barang
            $this->Barang_M->update($id, $data);

            // Beri pesan notifikasi
            $this->session->set_flashdata('success', 'Barang berhasil diupdate');
            redirect(base_url('barang'));
        }
    }

    public function destroy($id)
    {
        guard([1, 2]);

        // ambil data barang (1 baris)
        $barang = $this->Barang_M->first($id);
        // Hapus gambarnya
        unlink(FCPATH . 'assets/images/barang/' . $barang['images']);
        // Delete data barang nya
        $this->Barang_M->delete($id);

        $this->session->set_flashdata('success', 'Barang berhasil dihapus');
        redirect(base_url('barang'));
    }
}
