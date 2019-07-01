<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Wallet';
        $data['user'] = $this->user_model->getUserData();
        $data['wallet_value'] = $this->getWallet();
        $data['wallet_details'] = $this->wallet_model->getWalletAmountDetails();
        $data['deposit_activities'] = $this->activity_model->getWalletDepositActivities();
        $data['withdraw_activities'] = $this->activity_model->getWalletWithdrawActivities();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wallet/index', $data);
        $this->load->view('templates/footer');
    }

    public function withdraw()
    {
        $res = $this->wallet_model->getWalletAmountDetails();
        var_dump($res);
        // $data['title'] = 'My Wallet / Withdraw';
        // $data['user'] = $this->user_model->getUserData();
        // $data['wallet_value'] = $this->getWallet();

        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('wallet/withdraw', $data);
        // $this->load->view('templates/footer');
    }

    public function getWallet() {
        $wallet_value = $this->wallet_model->getWalletValue();
        if ($wallet_value['detail_amount'] != null) {
            return $wallet_value['detail_amount'];
        } else {
            return "0,00";
        }
    }
}
