<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_M');
        $this->load->library('form_validation');
        $this->load->helper('rupiah_helper');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' =>  $this->Barang_M->get()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/index');
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/create');
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required', [
            'required' => 'Nama barang tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('harga_awal', 'Harga awal', 'required', [
            'required' => 'Harga awal tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi tidak boleh kosong'
        ]);

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

            if ($this->upload->do_upload('images')) {
                $image = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }

            $imageName = $image;

            $data = [
                'nama_barang' => $this->input->post('nama_barang', true),
                'harga_awal' => $this->input->post('harga_awal', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'images' => $imageName
            ];

            $this->Barang_M->insert($data);

            $this->session->set_flashdata('success', 'Barang berhasil ditambahkan');
            redirect(base_url('barang'));
        }
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail Barang',
            'barang' => $this->Barang_M->first($id)
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/show');
        $this->load->view('layouts/footer');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Barang',
            'barang' => $this->Barang_M->first($id)
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/edit');
        $this->load->view('layouts/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required', [
            'required' => 'Nama barang tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('harga_awal', 'Harga awal', 'required', [
            'required' => 'Harga awal tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', [
            'required' => 'Deskripsi tidak boleh kosong'
        ]);

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

            if ($_FILES['images']['name'] == null) {
                $image = $this->input->post('image_awal');
            } else {
                if ($this->upload->do_upload('images')) {
                    $image = $this->upload->data('file_name');
                    unlink(FCPATH . 'assets/images/barang/' . $this->input->post('image_awal'));
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $imageName = $image;

            $data = [
                'nama_barang' => $this->input->post('nama_barang', true),
                'harga_awal' => $this->input->post('harga_awal', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'images' => $imageName
            ];

            $this->Barang_M->update($id, $data);

            $this->session->set_flashdata('success', 'Barang berhasil diupdate');
            redirect(base_url('barang'));
        }
    }

    public function destroy($id)
    {
        $barang = $this->Barang_M->first($id);
        unlink(FCPATH . 'assets/images/barang/' . $barang['images']);
        $this->Barang_M->delete($id);

        $this->session->set_flashdata('success', 'Barang berhasil dihapus');
        redirect(base_url('barang'));
    }
}
