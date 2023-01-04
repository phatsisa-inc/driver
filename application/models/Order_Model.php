<?php

class Order_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function fetch_single_order($ord_id) {
        $this->db->select('*');
        $this->db->from('_tbl_users');
        $this->db->join('_tbl_orders', '_tbl_orders.cus_id = _tbl_users.usr_id');
        $this->db->where('_tbl_orders.ord_id',$ord_id);
        $query = $this->db->get();
        return $query->result();
    }

    function editOrder($ord_id, $data) {
        $this->db->where("ord_id", $ord_id);
        if ($this->db->update("_tbl_orders", $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
