<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wishlist_model extends CI_Model
{
    public function createPlan($plan_data)
    {
        $data = array(
            'title' => $plan_data[0],
            'description' => $plan_data[1],
            'est_cost' => $plan_data[2],
            'goal_date' => $plan_data[3],
            'created_on' => $plan_data[4],
            'save_freq' => $plan_data[5],
            'save_amount' => $plan_data[6],
            'trans_needed' => $plan_data[7],
            'status' => 'on_going',
            'user_id' => $this->session->userdata('user_id')
        );

        $this->db->insert('lists', $data);
    }

    public function getPlans()
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));

        $result = $this->db->get('lists');

        if ($result->num_rows() > 0) {
            return $result->result_array();
        } else {
            return false;
        }
    }
}
