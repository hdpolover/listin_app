<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wishlist extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'My Wishlists';
        $data['user'] = $this->user_model->getUserData();
        $data['wallet_value'] = $this->getWallet();
        $data['lists'] = $this->wishlist_model->getPlans();
        $data['ongoing'] = $this->wishlist_model->getOngoingPlans();
        $data['completed'] = $this->wishlist_model->getCompletedPlans();
        $data['cancelled'] = $this->wishlist_model->getCancelledPlans();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wishlist/view_plan', $data);
        $this->load->view('templates/footer');
    }


    public function view_list_details($list_id)
    {
        $data['title'] = 'My Wishlists / List Details';
        $data['user'] = $this->user_model->getUserData();
        $data['wallet_value'] = $this->getWallet();
        $data['list_details'] = $this->wishlist_model->getListDetails($list_id);
        $data['list_id_details'] = $this->wishlist_model->getListIdDetails($list_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wishlist/view_list_details', $data);
        $this->load->view('templates/footer');
    }

    public function choose_plan()
    {
        $data['title'] = 'Choose a plan';
        $data['user'] = $this->user_model->getUserData();
        $data['wallet_value'] = $this->getWallet();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wishlist/choose_plan');
        $this->load->view('templates/footer');
    }

    public function create_plan()
    {
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        $this->form_validation->set_rules('est_cost', 'Estimation Cost', 'required|trim');
        $this->form_validation->set_rules('goal_date', 'Goal Date', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Create a new plan';
            $data['user'] = $this->user_model->getUserData();
            $data['wallet_value'] = $this->getWallet();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('wishlist/create_plan');
            $this->load->view('templates/footer');
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
                $data['wallet_value'] = $this->getWallet();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('wishlist/create_plan');
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
                redirect('wishlist');
            }
        }
    }

    public function save_plan($list_id)
    {
        $data['title'] = 'Save for your plan';
        $data['user'] = $this->user_model->getUserData();
        $data['wallet_value'] = $this->getWallet();
        $data['id'] = $list_id;
        $data['list_details'] = $this->wishlist_model->getListDetails($list_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('wishlist/save_plan', $data);
        $this->load->view('templates/footer');
    }

    public function pay_plan($list_id)
    {
        $list_details = $this->wishlist_model->getListDetails($list_id);

        //data needed for payment
        $data['list_id'] = $list_details['list_id'];
        $data['detail_amount'] = $list_details['save_amount'];
        $data['payment_date'] = $this->getExactTodayDate();

        $this->wishlist_model->insertListPayment($data);

        $this->session->set_flashdata(
            'message',
            '<div class ="alert alert-success" style="text-align-center" role ="alert">
            Payment successful! 
            <a href="wishlist/view_list_details/' . $list_id . '">
            See details.
            </a>
            </div>'
        );
        redirect('wishlist');
    }

    public function cancel_plan($list_id)
    {
        $this->wishlist_model->cancelPlan($list_id);

        $this->session->set_flashdata(
            'message',
            '<div class ="alert alert-success" style="text-align-center" role ="alert">
            Plan cancelled.
            <a href="wishlist/view_list_details/' . $list_id . '">
            See details.
            </a>
            </div>'
        );
        redirect('wishlist');
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

    public function getWallet()
    {
        $wallet_value = $this->wallet_model->getWalletValue();
        if ($wallet_value['sum(detail_amount)'] != null) {
            return $wallet_value['sum(detail_amount)'];
        } else {
            return "0,00";
        }
    }
}
