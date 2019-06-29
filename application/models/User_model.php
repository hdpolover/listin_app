<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUserData()
    {
        $result = $this->db->get_where('users', ['user_id' => $this->session->userdata('user_id')]);

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    public function updateUserProfile($data)
    {
        $this->db->set('username', $data['username']);
        $this->db->set('email', $data['email']);
        $this->db->set('image', $data['image']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('users');
    }

    public function updateUserPassword($data)
    {
        $this->db->set('password', $data['password']);
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('users');
    }
}
