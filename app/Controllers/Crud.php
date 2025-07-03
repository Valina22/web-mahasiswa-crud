<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Crud extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = new MahasiswaModel();
    }

    // Tampilkan daftar mahasiswa
    public function index()
    {
        $all = $this->db->findAll();
        return view('crud/view', ['mahasiswa' => $all]);
    }

    // Tambah data baru
    public function tambah()
{
    if ($this->request->getPost('nim')) {
        $data = [
            'nim'             => $this->request->getPost('nim'),
            'nama'            => $this->request->getPost('nama'),
            'prodi'           => $this->request->getPost('prodi'),
            'universitas'     => $this->request->getPost('universitas'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];

        $this->db->insert($data);

        return redirect()->to(base_url('/crud'));
    } else {
        return view('crud/upload');
    }
}

    // Tampilkan halaman edit
    public function edit($nim)
    {
        $mahasiswa = $this->db->find($nim);

        if (!$mahasiswa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Mahasiswa dengan NIM $nim tidak ditemukan.");
        }

        return view('crud/edit', ['edit' => $mahasiswa]); // kirim data ke view
    }

    // Proses update data
    public function update()
    {
        $oldNim = $this->request->getPost('nim');
        $data = [
    'nim'         => $this->request->getPost('newNim') ?: $oldNim,
    'nama'        => $this->request->getPost('newNama') ?: $this->request->getPost('nama'),
    'prodi'       => $this->request->getPost('newProdi') ?: $this->request->getPost('prodi'),
    'universitas' => $this->request->getPost('newUniversitas') ?: $this->request->getPost('universitas'),
    'no_hp'       => $this->request->getPost('new_no_hp') ?: $this->request->getPost('no_hp'),
];

        $this->db->update($oldNim, $data);
        return redirect()->to('/crud');
    }

    // Hapus data
    public function hapus($nim)
    {
        $this->db->delete($nim);
        return redirect()->to('/crud');
    }
}
