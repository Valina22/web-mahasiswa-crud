<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mengambil semua data dari tabel tertentu
    public function get_all($table) {
        return $this->db->get($table)->result();
    }

    // Fungsi untuk mengambil satu data berdasarkan kondisi
    public function get_by_id($table, $where) {
        return $this->db->get_where($table, $where)->row();
    }

    // Fungsi untuk menyimpan data
    public function insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    // Fungsi untuk memperbarui data
    public function update($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }

    // Fungsi untuk menghapus data
    public function delete($table, $where) {
        return $this->db->delete($table, $where);
    }

    // Fungsi untuk menghitung total data
    public function count_all($table) {
        return $this->db->count_all($table);
    }

    // Fungsi untuk custom query (jika dibutuhkan)
    public function custom_query($sql) {
        return $this->db->query($sql)->result();
    }
}