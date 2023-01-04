<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    function fetch_single_driver() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $output = array();
            $data = $this->Driver_Model->fetch_single_driver($_SESSION['is_session_on']['usr_id']);
            foreach ($data as $row) {
                $output['usr_id'] = $row->usr_id;
                $output['usr_username'] = $row->usr_username;
                $output['usr_fname'] = $row->usr_fname;
                $output['usr_lname'] = $row->usr_lname;
                $output['usr_email'] = $row->usr_email;
                $output['usr_phone'] = $row->usr_phone;
                $output['usr_password'] = $row->usr_password;
                $output['usr_status'] = $row->usr_status;
                $output['usr_type'] = $row->usr_type;
                $output['usr_create_date'] = $row->usr_create_date;
                $output['usr_near_facility'] = $row->usr_near_facility;
                $output['usr_chiefdom'] = $row->usr_chiefdom;
                $output['usr_constituency'] = $row->usr_constituency;
                $output['usr_region'] = $row->usr_region;
            }
            echo json_encode($output);
        } else {
            redirect('login');
        }
    }

    function updateDriver_Password() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $data = array(
                'usr_password' => $this->input->post('user_password')
            );
            if ($this->Driver_Model->updateDriver_Password($_SESSION['is_session_on']['usr_id'], $data)) {
                echo 'Data Edited';
            } else {
                echo 'Error Editing Data';
            }
        } else {
            redirect('login');
        }
    }

}
