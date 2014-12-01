<?php

class Login_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    function index() {
        $this->load->view('login_view');
    }

    function validate_new_account() {
        $this->form_validation->set_rules('username', 'User Name', 'required|min_length[3]|max_length[16]|is_unique[users.username]|alpha_dash');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[140]|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[16]|alpha_dash');
        if ($this->form_validation->run() == FALSE) {
            $data['new_account_errors'] = validation_errors();
            $this->load->view('login_view', $data);
        } else {
            $this->create_user();
            $data['message'] = 'Account created. Log in.';
            $this->load->view('login_view', $data);
        }
    }

    function create_user() {
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'email' => $this->input->post('email', TRUE),
            'password' => do_hash($this->input->post('password', TRUE))
        );
        $this->user_model->create($data);
    }

    function log_in() {
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|callback_validate_login');
        if ($this->form_validation->run() == FALSE) {
            $data['login_errors'] = validation_errors();
            $this->load->view('login_view', $data);
        } else {
            redirect('shoutbox_controller');
        }
    }

    function validate_login() {
        $data = array(
            'email' => $this->input->post('email', TRUE),
            'password' => $this->input->post('password', TRUE)
        );
        $user_data = $this->user_model->validate($data);
        if ($user_data){
            $this->session->set_userdata('logged_in', $user_data);
            return true;
        } else {
            $this->form_validation->set_message('validate_login', 'Invalid User Name or Password');
            return false;
        }
    }

}