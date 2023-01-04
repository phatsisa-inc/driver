<?php

class Driver_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function fetch_single_driver($usr_id) {
        $data = array('usr_id' => $usr_id);
        $query = $this->db->get_where('_tbl_users', $data);
        return $query->result();
    }

    function updateDriver_Password($usr_id, $data) {
        $this->db->where("usr_id", $usr_id);
        if ($this->db->update("_tbl_users", $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
