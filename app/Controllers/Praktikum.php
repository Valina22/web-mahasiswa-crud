<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Praktikum extends BaseController
{
    public function profil()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->where('nim', '32602300052')->first();

        return view('mahasiswa/profil_mahasiswa', $data);
    }

    public function tambah()
{
    $model = new \App\Models\MahasiswaModel();

    $model->insert([
        'nim' => '32602300052',
        'nama' => 'Valina Puspita Sari',
        'prodi' => 'Teknik Informatika'
    ]);

    return "Data berhasil ditambahkan!";
}

public function tampil()
{
    $model = new \App\Models\MahasiswaModel();
    $data['mahasiswa'] = $model->findAll();

    return view('mahasiswa/tampil_data', $data);
}


}
