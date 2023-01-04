<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    function validate($username, $password) {
        $this->db->select('*');
        $this->db->from('_tbl_users');
        $this->db->where('usr_password', $password);
        $this->db->where('usr_phone', $username);
        $this->db->where('usr_type', 2);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

}
