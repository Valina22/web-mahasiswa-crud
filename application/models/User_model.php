<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Ambil user berdasarkan username
public function get_by_username($username) {
    return $this->db->get_where('users', ['username' => $username])->row();
}


    // Tambah user baru (opsional)
    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }
}
