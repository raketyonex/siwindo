<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function register($username, $email, $password, $role) {
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role' => $role
        );

        return $this->db->insert('users', $data);
    }

    public function login($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row_array();
    }
}