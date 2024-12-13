<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function register() {
        if ($this->session->userdata('logged_in')) {
            $role = $this->session->userdata('role');
            if ($role == 'admin') {
                redirect('admin');
            } else {
                redirect('user');
            }
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $role = 'user';
    
            if ($this->Auth_Model->register($username, $email, $password, $role)) {
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Registration failed.');
                redirect('register');
            }
        }
    }    

    public function login() {
        if ($this->session->userdata('logged_in')) {
            $role = $this->session->userdata('role');
            if ($role == 'admin') {
                redirect('admin');
            } else {
                redirect('user');
            }
        }
    
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->Auth_Model->login($username);
    
            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('role', $user['role']);

                if ($user['role'] == 'admin') {
                    redirect('admin');
                } else {
                    redirect('user');
                }
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah.');
                redirect('login');
            }
        }
    }        

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('role');
        redirect('login');
    }
}