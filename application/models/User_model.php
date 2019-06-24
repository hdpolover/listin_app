<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUserData()
    {
        $result = $this->db->get_where('users', ['username' => $this->session->userdata('username')]);

        if($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }
}
