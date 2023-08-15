<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }
	
    public function Auth() {
        return $loginSession = $this->session->userdata('session_user_id');
    }
	
    public function index() {
        if($this->Auth() != ""){ $this->load->view('dashboard/dashboard'); }
		else { $this->load->view('login/login'); }
    }
	
    function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->Login_model->login($email, $password);
    }    

	function changeSession(){
        $lang = $this->input->post('lang');
		$this->session->set_userdata('session_language', $lang);
		echo "success";
	}
}


