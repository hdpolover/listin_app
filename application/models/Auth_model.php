<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function register($enc_password)
    {
        // User data array
        $data = array(
            'username' => $this->input->post('username'),
            'name' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
            'image' => 'default.jpg',
            'role_id' => 2
        );

        // Insert user
        return $this->db->insert('users', $data);
    }

    public function login($username, $password)
    {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('users');

        if($result->num_rows() == 1) {
            return $result->row(0)->user_id;
        } else {
            return false;
        }
    }
}
