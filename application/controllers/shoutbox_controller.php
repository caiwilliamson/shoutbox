<?php

class Shoutbox_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index() {
        $user_data = $this->session->userdata('logged_in');
        if($user_data){
            $this->load->view('shoutbox_view');
        } else {
            redirect('login_controller');
        }
    }

    function validate_shout() {
        $this->form_validation->set_rules('shout', 'Shout', 'required|max_length[140]|htmlspecialchars');
        if ($this->form_validation->run() == FALSE) {
            $return['pass'] = 0;
            $return['message'] = validation_errors();
            echo json_encode($return);
        } else {
            $this->create_shout();
            $return['pass'] = 1;
            echo json_encode($return);
        }
    }

    function create_shout() {
        $user_data = $this->session->userdata('logged_in');
        $data = array(
            'username' => $user_data['username'],
            'shout' => $this->input->post('shout', TRUE)
        );
        $this->shoutbox_model->create($data);
    }

    function get_new_shouts() {
        $id = $this->input->get('lastId'); //GET lastId from getNewShouts() and send to db to check for new shouts
        $return['shouts'] = array_reverse($this->shoutbox_model->get_new($id)); //Reverse array so shouts appear in correct order in the view
        echo json_encode($return); //Convert PHP -> JSON array of objects and return to ajax call
    }

    function get_last_id() {
        $return['lastId'] = $this->shoutbox_model->get_last_id();
        if (empty($return['lastId'])) { //If the query is empty (no shouts in db) set and return lastId = 0, else return lastId
            $return['lastId'] = array(array('id' => '0'));
            echo json_encode($return);
        } else {
            echo json_encode($return);
        }
    }

    function log_out() {
        $this->session->sess_destroy();
        redirect('login_controller');
    }

}