<?php

class Shoutbox_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($data) {
        $this->db->insert('shouts', $data);
    }

    function get_new($id) {
        //Fetch up to 5 most recent shouts with id > lastId
        $this->db->order_by('id', 'desc');
        $this->db->where('id >', $id);
        $query = $this->db->get('shouts', 5);
        return $query->result();
    }

    function get_last_id() {
        //Fetch the id of the most recently posted shout
        $this->db->order_by('id', 'desc');
        $this->db->select('id');
        $query = $this->db->get('shouts', 1);
        return $query->result();
    }

}