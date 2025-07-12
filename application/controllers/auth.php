<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['User_model', 'Mahasiswa_model']);
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        if ($this->session->userdata('user')) {
            redirect('dashboard');
        }

        $this->load->view('auth/login');
    }

    public function login_proses()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $user = $this->User_model->get_by_username($username);

        if ($user && password_verify($password, $user->password)) {
            if (in_array($user->role, ['admin', 'mahasiswa'])) {
                $this->session->set_userdata([
    'user' => [
        'username' => $user->username,  // = nim
        'nama'     => $user->nama,
        'role'     => $user->role
    ]
]);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Akses ditolak. Role tidak valid.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', '❌ Username atau password salah!');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function register_proses()
    {
        $nim = $this->input->post('nim', TRUE);
        $nama = $this->input->post('nama', TRUE);
        $password = password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT);

        // Cek apakah username (NIM) sudah terdaftar
        $existing = $this->db->get_where('users', ['username' => $nim])->row();
        if ($existing) {
            $this->session->set_flashdata('error', '❌ NIM sudah digunakan!');
            redirect('auth/register');
            return;
        }

        $this->db->insert('users', [
            'username' => $nim,  // simpan NIM sebagai username
            'nama'     => $nama,
            'password' => $password,
            'role'     => 'mahasiswa'
        ]);

        $this->session->set_flashdata('success', '✅ Akun berhasil dibuat, silakan login.');
        redirect('auth');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('auth');
    }

    // Seed user awal (jalankan sekali saja, lalu hapus atau comment)
    public function seed_users()
    {
        $admin = [
            'username' => 'admin',
            'nama'     => 'Administrator',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
            'role'     => 'admin'
        ];

        $mahasiswa = [
            'username' => '32602300052',
            'nama'     => 'Valina Puspita Sari',
            'password' => password_hash('32602300052', PASSWORD_BCRYPT),
            'role'     => 'mahasiswa'
        ];

        $this->db->insert('users', $admin);
        $this->db->insert('users', $mahasiswa);

        echo "✅ User admin & mahasiswa berhasil ditambahkan.";
    }
}
