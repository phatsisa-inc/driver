<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function getNewOrders() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $data = array('ord_status' => 1, 'drv_id' => $_SESSION['is_session_on']['usr_id']);
            $query = $this->db->get_where("_tbl_orders", $data);
            $data = [];
            foreach ($query->result() as $r) {
                $total_fee = ($r->ord_price + $r->ord_service_fee + $r->ord_delivery_fee);
                $data[] = array(
                    $r->ord_id,
                    $r->ord_create_date,
                    $total_fee,
                    '<button id="' . $r->ord_id . '" class="btn btn-info btn-block viewNew_Order">View</button>'
                );
            }
            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $data
            );
            echo json_encode($result);
            exit();
        } else {
            redirect('login');
        }
    }

    function getReadyOrders() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $data = array('ord_status' => 2, 'drv_id' => $_SESSION['is_session_on']['usr_id']);
            $query = $this->db->get_where("_tbl_orders", $data);
            $data = [];
            foreach ($query->result() as $r) {
                $total_fee = ($r->ord_price + $r->ord_service_fee + $r->ord_delivery_fee);
                $data[] = array(
                    $r->ord_id,
                    $r->ord_create_date,
                    $total_fee,
                    '<button id="' . $r->ord_id . '" class="btn btn-info btn-block viewBought_Order">View</button>'
                );
            }
            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $data
            );
            echo json_encode($result);
            exit();
        } else {
            redirect('login');
        }
    }

    function getCompleteOrders() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            $data = array('ord_status' => 3, 'drv_id' => $_SESSION['is_session_on']['usr_id']);
            $query = $this->db->get_where("_tbl_orders", $data);
            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    $r->ord_id,
                    $r->ord_create_date,
                    $r->ord_price + $r->ord_service_fee,
                    (($r->ord_delivery_fee) * (80 / 100))
                );
            }
            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $data
            );
            echo json_encode($result);
            exit();
        } else {
            redirect('login');
        }
    }

    function fetch_single_order() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $output = array();
            $data = $this->Order_Model->fetch_single_order($_POST['ord_id']);
            foreach ($data as $row) {
                $output['ord_id'] = $row->ord_id;
                $output['ord_list'] = $row->ord_list;
                $output['ord_price'] = $row->ord_price;
                $output['ord_create_date'] = $row->ord_create_date;
                $output['ord_destination'] = $row->ord_destination;
                $output['ord_service_fee'] = $row->ord_service_fee;
                $output['ord_delivery_fee'] = $row->ord_delivery_fee;
                $output['usr_contacts'] = '<a href="tel:+268' . $row->usr_phone . '" class="btn btn-light mr-2"><img src="' . base_url('images/img-call.png') . '" class="img-fluid"/></a><a href="https://wa.me/' . $row->usr_phone . '" class="btn btn-light"><img src="' . base_url('images/img-whatsapp.png') . '" class="img-fluid"/></a>';
            }
            echo json_encode($output);
        } else {
            redirect('login');
        }
    }

    function editNewOrder() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $ord_id = $this->input->post('ord_id');
            $data = array(
                'ord_price' => $this->input->post('ord_price'),
                'ord_status' => 2
            );
            if ($this->Order_Model->editOrder($ord_id, $data)) {
                echo 'Data Edited';
            } else {
                echo 'Error Editing Data';
            }
        } else {
            redirect('login');
        }
    }

    function editBoughtOrder() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $ord_id = $this->input->post('ord_id');
            $data = array(
                'ord_status' => 3
            );
            if ($this->Order_Model->editOrder($ord_id, $data)) {
                echo 'Data Edited';
            } else {
                echo 'Error Editing Data';
            }
        } else {
            redirect('login');
        }
    }

}
