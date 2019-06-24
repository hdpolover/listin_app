<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }

    public function blank()
    {
        $data['title'] = 'Blank';
        $data['user'] = $this->user_model->getUserData();
   
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/blank', $data);
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
}
