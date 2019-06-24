<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Login';
 
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }

    public function login()
    {
        $data['title'] = 'Log In';

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() === false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // Get username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = md5($this->input->post('password'));

            // Login user
            $user_id = $this->auth_model->login($username, $password);

            if($user_id) {
                // Create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You are logged in</div>');

                redirect('user/profile');
            } else {
                // Set message
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login invalid!</div>');

                redirect('auth/login');
            }        
        }
    }

    public function register()
    {
        $data['title'] = 'Registration';

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() === false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password1'));

            $this->auth_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">You are now registered and can log in</div>');

            redirect('auth');
        }
    }
    
    
}
