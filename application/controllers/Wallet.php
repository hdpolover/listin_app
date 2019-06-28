<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Wallet';
        $data['user'] = $this->user_model->getUserData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wallet/index', $data);
        $this->load->view('templates/footer');
    }
}
