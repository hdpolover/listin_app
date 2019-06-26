<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wishlist extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->user_model->getUserData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Create a new plan';
        $data['user'] = $this->user_model->getUserData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wishlist/create');
        $this->load->view('templates/footer');
    }

    public function viewAll()
    {
        $data['title'] = 'View plans';
        $data['user'] = $this->user_model->getUserData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wishlist/all');
        $this->load->view('templates/footer');
    }

    public function show()
    {
        // var_dump($this->input->post());

        $title = $this->input->post('title');
        $description = $this->input->post('description');
        //omit Rp. from the input
        $est_cost = $this->convToNum(substr($this->input->post('est_cost'), 4));
        echo $est_cost." ";
        $period = $this->input->post('period');
        $save_freq = $this->input->post('save_freq');

        //get today's date
        $today = date("Y/m/d");

        //get the interval between the input and today
        $datetime1 = new DateTime($this->input->post('period'));
        $datetime2 = new DateTime($today);
        $interval = $datetime2->diff($datetime1)->days;

        if ($save_freq == "option4") {
            $freq_num = $this->input->post('freq_num');
            $freq_period = $this->input->post('freq_period');
            $save_freq = $freq_num * $freq_period;
        }

        if ($interval < $save_freq) {
            echo "You can't";
        } else {
            echo "you can</br>";
            $total_save = $interval / $save_freq;
            $remaining = $interval % $save_freq;
            echo "so ".$interval."/".$save_freq."=".round($total_save)."</br>";
            echo "remainng days = ".$remaining;
            $save_amount = $est_cost / $total_save;
            echo "</br>you need to save ".$save_amount." every ".$save_freq." days.";

        }


        // var_dump($est_cost, $period, $save_freq, $date);

        // $data['title'] = 'View plans';
        // $data['user'] = $this->user_model->getUserData();

        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('wishlist/all');
        // $this->load->view('templates/footer');
    }

    public function convToNum($input) {
        //remove Rp.
        $sub = filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        $divide = $sub / 100;

        return $divide;
    }
}
