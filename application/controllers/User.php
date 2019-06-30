<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->user_model->getUserData();
        $data['activities'] = $this->activity_model->getRecentActivities();

        $data['wallet_value'] = $this->getWallet();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        //check if user has wishlists
        $data['ongoing'] = $this->wishlist_model->getOngoingPlans();
        if ($data['ongoing'] == false) {
            $this->load->view('user/index', $data);
        } else {
            $this->load->view('user/index', $data);
        }
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->user_model->getUserData();
        $data['wallet_value'] = $this->getWallet();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $data['title'] = 'My Profile / Edit';
        $data['user'] = $this->user_model->getUserData();
        $data['wallet_value'] = $this->getWallet();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit_profile', $data);
        $this->load->view('templates/footer');
    }

    public function save_profile()
    {
        $this->form_validation->set_rules('username', 'Userame', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'My Profile / Edit';
            $data['user'] = $this->user_model->getUserData();
            $data['wallet_value'] = $this->getWallet();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');

                    $data = array(
                        'user_id' => $this->session->userdata('user_id'),
                        'username' => $username,
                        'email' => $email,
                        'image' => $new_image
                    );

                    $this->user_model->updateUserProfile($data);
                } else {
                    echo $this->upload->display_errors();
                }
                //if the user doesn't change their pp
            } else {
                $old_image = $data['user']['image'];

                $data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'username' => $username,
                    'email' => $email,
                    'image' => $old_image
                );

                $this->user_model->updateUserProfile($data);
            }

            //update activity
            $currentDateTime = $this->getExactTodayDate();
            $activity_data = array('updated your profile', $currentDateTime);
            $this->activity_model->insertActivity($activity_data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user/profile');
        }
    }

    public function change_password()
    {
        $data['user'] = $this->user_model->getUserData();
        $user_password = $data['user']['password'];

        $this->form_validation->set_rules('current_pass', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_pass1', 'New Password', 'required|trim|min_length[3]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_pass1]');

        if ($this->form_validation->run() == false) {
            redirect('user/edit_profile');
        } else {
            $current_password = $this->input->post('current_pass');
            $new_password = $this->input->post('new_pass1');
            if (!password_verify($current_password, $user_password)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');

                redirect('user/edit_profile');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');

                    redirect('user/edit_profile');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $data = array(
                        'user_id' => $this->session->userdata('user_id'),
                        'password' => $password_hash
                    );

                    $this->user_model->updateUserPassword($data);

                    //update activity
                    $currentDateTime = $this->getExactTodayDate();
                    $activity_data = array('changed your password', $currentDateTime);
                    $this->activity_model->insertActivity($activity_data);


                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/profile');
                }
            }
        }
    }

    public function getWallet()
    {
        $wallet_value = $this->wallet_model->getWalletValue();
        if ($wallet_value['detail_amount'] != null) {
            return $wallet_value['detail_amount'];
        } else {
            return "0,00";
        }
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
