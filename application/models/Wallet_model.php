<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet_model extends CI_Model
{
    public function insertPayment($data)
    {
        $data = array(
            'tr_date' => $data['payment_date'],
            'detail_amount' => $data['detail_amount'],
            'action' => "deposit",
            'list_id' => $data['list_id']
        );

        $this->db->insert('list_details', $data);
    }

    public function getWalletValue()
    {
        $this->db->select('sum(detail_amount)');
        $this->db->from('list_details');
        $this->db->join('lists', 'lists.list_id = list_details.list_id', 'left');
        $this->db->join('users', 'users.user_id = lists.user_id', 'left');
        $this->db->where('users.user_id', $this->session->userdata('user_id'));

        $result = $this->db->get();

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }
}
