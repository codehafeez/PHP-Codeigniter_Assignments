<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
    }
	
    public function Auth() {
        return $loginSession = $this->session->userdata('session_user_id');
    }

    public function index() {
        $loginSession = $this->session->userdata('session_user_id');
        if($this->Auth() !== "") {
            $data['result'] = $this->Category_model->allCategory();
            $this->load->view('dashboard/dashboard', $data);
        }
		else { $this->load->view('login/login'); }
    }
	
	
}
