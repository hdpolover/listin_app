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

    public function choose_plan()
    {
        $data['title'] = 'Choose a plan';
        $data['user'] = $this->user_model->getUserData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wishlist/choose_plan');
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
        $data['lists'] = $this->wishlist_model->getPlans();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wishlist/all', $data);
        $this->load->view('templates/footer');
    }

    public function show()
    {
        // var_dump($this->input->post());

        $title = $this->input->post('title');
        $description = $this->input->post('description');
        //omit Rp. from the input
        //$est_cost = $this->convToNum(substr($this->input->post('est_cost'), 4));
        //echo $est_cost." ";
        // $goal_date = $this->input->post('goal_date');
        // $save_freq = $this->input->post('save_freq');


        // //get today's date
        // $offset = 7 * 60 * 60; //converting 5 hours to seconds.
        // $dateFormat = "d-m-Y";
        // $timeNdate = gmdate($dateFormat, time() + $offset);

        // //get the interval between the input and today
        // $datetime1 = new DateTime($goal_date);
        // $datetime2 = new DateTime($timeNdate);
        // $interval = $datetime2->diff($datetime1)->days;
        // var_dump($goal_date, $timeNdate, $interval);

        $today = date('d-m-Y');

        $goal_date = $this->input->post('goal_date');
        //get the interval between the input and today
        $datetime1 = new DateTime($goal_date);
        $datetime2 = new DateTime($today);
        $interval = $datetime2->diff($datetime1)->days;
        var_dump($goal_date, $today, $interval);


        // if ($save_freq == "option4") {
        //     $freq_num = $this->input->post('freq_num');
        //     $freq_period = $this->input->post('freq_period');
        //     $save_freq = $freq_num * $freq_period;
        // }

        // if ($interval < $save_freq) {
        //     echo "You can't";
        // } else {
        //     echo "you can</br>";
        //     $total_save = $interval / $save_freq;
        //     $remaining = $interval % $save_freq;
        //     echo "so ".$interval."/".$save_freq."=".round($total_save)."</br>";
        //     echo "remainng days = ".$remaining;
        //     $save_amount = $est_cost / $total_save;
        //     echo "</br>you need to save ".$save_amount." every ".$save_freq." days.";

        // }


        // var_dump($est_cost, $period, $save_freq, $date);

        // $data['title'] = 'View plans';
        // $data['user'] = $this->user_model->getUserData();

        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('wishlist/all');
        // $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('est_cost', 'Estimation Cost', 'required|trim');
        $this->form_validation->set_rules('goal_date', 'Goal Date', 'required|trim');

        if ($this->form_validation->run() == false) {
            redirect('wishlist/create');
        } else {
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            if ($description == "") {
                $description = "No description.";
            }

            //omit Rp. from the input
            $est_cost = $this->convToNum(substr($this->input->post('est_cost'), 4));
            $save_freq = $this->input->post('save_freq');

            //get today's exact date
            $created_on = $this->getExactTodayDate();

            //get the interval between the input and today
            $input_date = $this->input->post('goal_date');
            $goal_date = date('Y-m-d', strtotime($input_date));
            $day_interval = $this->getDayInterval($input_date);

            //var_dump($created_on, $goal_date, $day_interval);
            if ($save_freq == "option4") {
                $freq_num = $this->input->post('freq_num');
                $freq_period = $this->input->post('freq_period');
                $save_freq = $freq_num * $freq_period;
            }

            //count save amount
            $total_save = $day_interval / $save_freq;
            $save_amount = $est_cost / $total_save;

            //check if valid
            if ($day_interval < $save_freq) {
                $this->session->set_flashdata('message', '<div class ="alert alert-danger" role ="alert">
            Saving frequency cannot be greater than the interval period. </div>');

                $data['title'] = 'Create a new plan';
                $data['user'] = $this->user_model->getUserData();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('wishlist/create');
                $this->load->view('templates/footer');
            } else {
                $plan_data = array(
                    $title, $description, $est_cost, $goal_date,
                    $created_on, $save_freq, $save_amount, $total_save
                );

                $this->wishlist_model->createPlan($plan_data);

                $this->session->set_flashdata('message', '<div class ="alert alert-success" 
                style="text-align-center" role ="alert">
            Congratulations! You successfully created a new plan.</div>');
                redirect('user');
            }
        }




        // var_dump($est_cost, $period, $save_freq, $date);

        // $data[ 'titl e'] =  'View plan s';
        // $data[ 'use r'] = $this->user_model->getUserData();

        // $this->load->view( 'template s /heade r', $data);
        // $this->load->view( 'template s /sideba r', $data);
        // $this->load->view( 'template s /topba r', $data);
        // $this->load->view( 'wishlis t /al l');
        // $this->load->view( 'template s /footer');
    }

    public function convToNum($input)
    {
        //remove Rp.
        $sub = filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        $divide = $sub / 100;

        return $divide;
    }

    public function getDayInterval($date)
    {
        $today = date('Y-m-d');

        $datetime1 = new DateTime($date);
        $datetime2 = new DateTime($today);
        $day_interval = $datetime2->diff($datetime1)->days;

        return $day_interval;
    }

    public function getExactTodayDate()
    {
        //get today's exact date
        $offset = 7 * 60 * 60; //converting 7 hours to seconds. / (GMT+7)
        $dateFormat = "Y-m-d H:i:s";
        $now = gmdate($dateFormat, time() + $offset);

        return $now;
    }
}
