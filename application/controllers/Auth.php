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
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            redirect('auth');
        } else {
            // Get username
            $email = $this->input->post('email');
            // Get and encrypt the password
            $password = $this->input->post('password');

            // Login user
            $user = $this->auth_model->login($email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Create session
                    $user_data = array(
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id']);

                    $this->session->set_userdata($user_data);

                    redirect('user/blank');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login invalid!</div>');
                redirect('auth');
            }        
        }
    }

    public function register()
    {
        $data['title'] = 'Registration';

        $this->form_validation->set_rules('fname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules(
            'email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'This email has already been registered!'
            ]
        );
        $this->form_validation->set_rules(
            'password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Passwords don\'t match!',
            'min_length' => 'Password is too short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            // Encrypt password
            $enc_password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

            $this->auth_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">You are now registered and can log in</div>');

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
    
    
}
