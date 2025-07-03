<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class FormController extends Controller
{
    // Tampilkan form input
    public function index()
    {
        return view('form_view');
    }

    // Tangani POST data dari form
    public function submit()
    {
        $nama           = $this->request->getPost('nama');
        $nim            = $this->request->getPost('nim');
        $kelas          = $this->request->getPost('kelas');
        $matakuliah     = $this->request->getPost('matakuliah');
        $dosen_pengampu = $this->request->getPost('dosen_pengampu');
        $asisten        = $this->request->getPost('asisten');

        return view('hasil_view', [
            'nama'          => $nama,
            'nim'           => $nim,
            'kelas'         => $kelas,
            'matakuliah'    => $matakuliah,
            'dosen_pengampu'=> $dosen_pengampu,
            'asisten'       => $asisten
        ]);
    }
}
