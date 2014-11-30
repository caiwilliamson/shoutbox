<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert('users', $data);
    }

    function validate($data) {
        $where = array(
            'email' => $data['email'],
            'password' => do_hash($data['password'])
        );
        $query = $this->db->get_where('users', $where, 1);
        if($query->num_rows() > 0){
            return $query->row_array();
        }
    }

}