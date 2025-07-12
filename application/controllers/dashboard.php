<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa_model');

        // Cegah akses tanpa login
        if (!$this->session->userdata('user')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        
        // Cek apakah user belum login
        if (!$user || !isset($user['role'])) {
            redirect('auth');
            return;
        }

        $role = $user['role'];

        $data = [
            'role' => $role,
            'mahasiswa_list'   => $this->Mahasiswa_model->get_all_mahasiswa(),
            'total_mahasiswa'  => $this->Mahasiswa_model->count_all(),
            'total_aktif'      => $this->Mahasiswa_model->count_by_status('aktif'),
            'total_cuti'       => $this->Mahasiswa_model->count_by_status('cuti')
        ];

        $this->load->view('dashboard', $data);
    }

    public function tambah_mahasiswa($data)
    {
        $user = $this->session->userdata('user');
        if (!in_array($user['role'], ['admin', 'mahasiswa'])) {
            redirect('dashboard');
        }

        return $this->db->insert('data_mahasiswa', [
            'nim'            => $data['nim'],
            'nama'           => $data['nama'],
            'program_studi'  => $data['program_studi'],
            'alamat'         => $data['alamat'],
            'tgl_lahir'      => $data['tgl_lahir'],
            'jenis_kelamin'  => $data['jenis_kelamin'],
            'status'         => $data['status']
        ]);
    }

    public function simpan()
    {
        $user = $this->session->userdata('user');
        if (!in_array($user['role'], ['admin', 'mahasiswa'])) {
            redirect('dashboard');
        }

        $data = [
            'nim'            => $this->input->post('nim'),
            'nama'           => $this->input->post('nama'),
            'alamat'         => $this->input->post('alamat'),
            'program_studi'  => $this->input->post('program_studi'),
            'tgl_lahir'      => $this->input->post('tgl_lahir'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'status'         => $this->input->post('status')
        ];

        $this->Mahasiswa_model->tambah_mahasiswa($data);
        redirect('dashboard');
    }

    public function edit($nim)
    {
        $user = $this->session->userdata('user');
        if ($user['role'] !== 'admin') {
            redirect('dashboard');
        }

       $data['mahasiswa'] = (array) $this->Mahasiswa_model->get_by_nim($nim);
        $this->load->view('mahasiswa/form', $data);
    }

    public function update_mahasiswa()
    {
        $user = $this->session->userdata('user');
        if ($user['role'] !== 'admin') {
            redirect('dashboard');
        }

        $nim = $this->input->post('nim');
        $data = [
            'nama' => $this->input->post('namamahasiswa'),
            'program_studi' => $this->input->post('program_studi'),
            'alamat' => $this->input->post('alamat'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'status' => $this->input->post('status')
        ];

        // Upload via input file biasa
        if (!empty($_FILES['foto']['name'])) {
            $foto = $_FILES['foto'];
            $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
            $newFileName = 'foto_' . $nim . '.' . $ext;
            $uploadPath = FCPATH . 'uploads/foto_profil/' . $newFileName;

            $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
            if (in_array(strtolower($ext), $allowed_ext)) {
                if (move_uploaded_file($foto['tmp_name'], $uploadPath)) {
                    $data['foto'] = $newFileName;
                }
            }
        }

        // 1. CROP BASE64 DIPRIORITASKAN
$cropped = $this->input->post('cropped_image');
if ($cropped) {
    $imgData = explode(',', $cropped);
    if (count($imgData) === 2) {
        $decoded = base64_decode($imgData[1]);
        $newFileName = 'foto_' . $nim . '.png';
        $uploadPath = FCPATH . 'uploads/foto_profil/' . $newFileName;
        file_put_contents($uploadPath, $decoded);
        $data['foto'] = $newFileName;
    }
} else if (!empty($_FILES['foto']['name'])) {
    // 2. JIKA TIDAK CROP, MAKA PAKAI FILE ASLI
    $foto = $_FILES['foto'];
    $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $newFileName = 'foto_' . $nim . '.' . $ext;
    $uploadPath = FCPATH . 'uploads/foto_profil/' . $newFileName;

    $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
    if (in_array(strtolower($ext), $allowed_ext)) {
        if (move_uploaded_file($foto['tmp_name'], $uploadPath)) {
            $data['foto'] = $newFileName;
        }
    }
}


        $this->Mahasiswa_model->update($nim, $data);
redirect('dashboard'); // ⬅️ Kembali ke halaman dashboard
    }

    public function delete($nim)
    {
        $user = $this->session->userdata('user');
        if ($user['role'] !== 'admin') {
            redirect('dashboard');
        }

        $this->Mahasiswa_model->delete($nim);
        redirect('dashboard');
    }

    public function profile()
    {
        $user = $this->session->userdata('user');
        if (!in_array($user['role'], ['admin', 'mahasiswa'])) {
            redirect('dashboard');
        }

        if ($user['role'] == 'mahasiswa') {
            $nim = $user['username'];
            $data['mahasiswa'] = $this->Mahasiswa_model->get_by_nim($nim);
        } else {
            $data['mahasiswa'] = null;
        }

        $this->load->view('profile', $data);
    }

    public function tambah()
    {
        $user = $this->session->userdata('user');
        if (!in_array($user['role'], ['admin', 'mahasiswa'])) {
            redirect('dashboard');
        }

        $this->load->view('mahasiswa/tambah');
    }

    public function hapus_foto($nim)
    {
        $user = $this->session->userdata('user');
        if (!in_array($user['role'], ['admin', 'mahasiswa'])) {
            redirect('dashboard');
        }

        $mahasiswa = $this->Mahasiswa_model->get_by_nim($nim);

        if ($mahasiswa && !empty($mahasiswa->foto)) {
            $filePath = FCPATH . 'uploads/foto_profil/' . $mahasiswa->foto;
            if (file_exists($filePath)) {
                unlink($filePath); // hapus file dari server
            }

            // Update database
            $this->Mahasiswa_model->update($nim, ['foto' => null]);
        }

        redirect('dashboard/profile');
    }

    public function update_profile()
{
    $user = $this->session->userdata('user');
    if ($user['role'] !== 'mahasiswa') {
        redirect('dashboard');
    }

    $nim = $user['username']; // anggap username = NIM
    $data = [
        'nama' => $this->input->post('nama'),
        'program_studi' => $this->input->post('program_studi'),
        'alamat' => $this->input->post('alamat'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'status' => $this->input->post('status')
    ];

    // Cek upload cropped base64 terlebih dahulu
    $cropped = $this->input->post('cropped_image');
    if ($cropped) {
        $imgData = explode(',', $cropped);
        if (count($imgData) === 2) {
            $decoded = base64_decode($imgData[1]);
            $newFileName = 'foto_' . $nim . '.png';
            $uploadPath = FCPATH . 'uploads/foto_profil/' . $newFileName;
            file_put_contents($uploadPath, $decoded);
            $data['foto'] = $newFileName;
        }
    } else if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto'];
        $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $newFileName = 'foto_' . $nim . '.' . $ext;
        $uploadPath = FCPATH . 'uploads/foto_profil/' . $newFileName;

        $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array(strtolower($ext), $allowed_ext)) {
            if (move_uploaded_file($foto['tmp_name'], $uploadPath)) {
                $data['foto'] = $newFileName;
            }
        }
    }

    $this->Mahasiswa_model->update($nim, $data);
    redirect('dashboard/profile');
}
}
