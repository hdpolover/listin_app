<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function register($enc_password)
    {
        // User data array
        $data = array(
            'username' => $this->input->post('fname'),
            'name' => $this->input->post('fname'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
            'image' => 'default.jpg',
            'role_id' => 2
        );

        // Insert user
        return $this->db->insert('users', $data);
    }

    public function login($email)
    {
        // Validate
        $this->db->where('email', $email);

        $result = $this->db->get('users');

        if($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }
}
