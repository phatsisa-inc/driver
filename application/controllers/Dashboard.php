<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function home() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $data['title'] = 'Dashboard';
            $this->load->view('drivers/includes/header', $data);
            $this->load->view('drivers/includes/js');
            $this->load->view('drivers/home', $data);
            $this->load->view('drivers/updateNewOrder_Modal');
            $this->load->view('drivers/updateBoughtOrder_Modal');
            $this->load->view('drivers/includes/footer');
        } else {
            redirect('login');
        }
    }

    public function profile() {
        if (isset($_SESSION['is_session_on']['usr_id'])) {
            $data['title'] = 'Profile';
            $this->load->view('drivers/includes/header', $data);
            $this->load->view('drivers/includes/js');
            $this->load->view('drivers/profile', $data);
            $this->load->view('drivers/includes/footer');
        } else {
            redirect('login');
        }
    }

}
