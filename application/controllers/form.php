<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_Model'); // Pastikan model dimuat
    }

    public function index()
    {
        $this->load->view('mahasiswa/index');
    }

    public function valina()
    {
        $this->load->view('mahasiswa/valina');
    }

    public function form()
    {
        $this->load->view('mahasiswa/form_mahasiswa');
    }

    public function form_proses()
    {
        $data = array(
            'nama'   => $this->input->post('namamahasiswa'),
            'nim'    => $this->input->post('nim'),
            'alamat' => $this->input->post('alamat')
        );

        // Simpan ke database
        if ($this->Data_Model->insert('data_mahasiswa', $data)) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error";
        }
    }
}
