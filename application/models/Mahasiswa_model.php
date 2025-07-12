<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Cek apakah mahasiswa sudah ada (misal berdasarkan nim)
    public function cek_mahasiswa($data) {
        return $this->db->get_where('data_mahasiswa', $data)->row();
    }

    // Tambah data mahasiswa
    public function tambah_mahasiswa($data) {
        return $this->db->insert('data_mahasiswa', [
            'nim'            => $data['nim'],
            'nama'           => $data['nama'],
            'program_studi'  => $data['program_studi'],
            'alamat'         => $data['alamat'],
            'tgl_lahir'      => $data['tgl_lahir'],
            'jenis_kelamin'  => $data['jenis_kelamin'],
            'status'         => $data['status'] ?? 'aktif' // default ke 'aktif' kalau tidak dikirim
        ]);
    }

    // Ambil data berdasarkan NIM
    public function get_by_nim($nim) {
        return $this->db->get_where('data_mahasiswa', ['nim' => $nim])->row();
    }

    // Update data berdasarkan NIM
    public function update($nim, $data) {
        return $this->db->where('nim', $nim)
                        ->update('data_mahasiswa', $data);
    }

    // Hapus data mahasiswa
    public function delete($nim) {
        return $this->db->delete('data_mahasiswa', ['nim' => $nim]);
    }

    // Ambil semua data mahasiswa (❗ sekarang menyertakan kolom `status`)
    public function get_all_mahasiswa() {
    return $this->db->select('nim, nama, program_studi, alamat, tgl_lahir, jenis_kelamin, status') // <- tambahkan status
                    ->from('data_mahasiswa')
                    ->get()
                    ->result_array();
}

    // Hitung semua data
    public function count_all() {
        return $this->db->count_all('data_mahasiswa');
    }

    // Hitung berdasarkan status: 'aktif' atau 'cuti'
    public function count_by_status($status) {
        return $this->db->where('status', $status)->count_all_results('data_mahasiswa');
    }
}
