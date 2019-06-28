<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->user_model->getUserData();
        $data['wallet_value'] = $this->getWallet();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        //check if user has wishlists
        $data['plans'] = $this->wishlist_model->getPlans();
        if ($data['plans'] == false) {
            $this->load->view('user/index', $data);
        } else {
            $this->load->view('user/dashboard', $data);
        }
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->user_model->getUserData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function new()
    {
        $data['title'] = 'New';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/new');
        $this->load->view('templates/footer');
    }

    public function getWallet() {
        $wallet_value = $this->wallet_model->getWalletValue();
        if ($wallet_value['sum(detail_amount)'] != null) {
            return $wallet_value['sum(detail_amount)'];
        } else {
            return "0,00";
        }
    }
}
