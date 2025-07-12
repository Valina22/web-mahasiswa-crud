<?php
class Update_form extends CI_Controller {
    // Method untuk menampilkan profil pengguna
    public function index() {
        // Ambil data dari database atau session dan pass ke view
        $data['nama'] = $this->session->userdata('nama');
        $data['nim'] = $this->session->userdata('nim');
        $data['jurusan'] = $this->session->userdata('jurusan');
        $data['alamat'] = $this->session->userdata('alamat');
        $data['tanggal_lahir'] = $this->session->userdata('tanggal_lahir');
        $data['jenis_kelamin'] = $this->session->userdata('jenis_kelamin');
        
        $this->load->view('dashboard', $data);
    }

    // Method untuk menampilkan form update profile
    public function update_form() {
        // Logika untuk menampilkan form update profile
        $data['nama'] = $this->session->userdata('nama');
        $data['nim'] = $this->session->userdata('nim');
        $data['jurusan'] = $this->session->userdata('jurusan');
        $data['alamat'] = $this->session->userdata('alamat');
        $data['tanggal_lahir'] = $this->session->userdata('tanggal_lahir');
        $data['jenis_kelamin'] = $this->session->userdata('jenis_kelamin');
        
        // Load form update profil (buat file view untuk form update)
        $this->load->view('update_form', $data);
    }
}
