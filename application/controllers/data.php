<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Data_model'); // Load model tanpa perlu simpan ke variabel
    }

    public function index()
    {
        // Untuk menampilkan views dari folder mahasiswa file index.php
        $this->load->view('mahasiswa/index');
    }

    public function valina()
    {
        $this->load->view('mahasiswa/valina');
    }
}
