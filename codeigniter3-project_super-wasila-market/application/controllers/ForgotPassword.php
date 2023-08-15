<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ForgotPassword extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ForgotPassword_model');
    }
	
    public function Auth() {
        return $loginSession = $this->session->userdata('session_user_id');
    }
	
    public function index() {
        if($this->Auth() != ""){
			$this->load->view('products/add');
        }
		else { $this->load->view('forgot-password/forgot-password'); }
    }
	
    function forgotpassword(){
        $email = $this->input->post('email');
        $this->ForgotPassword_model->forgotpassword($email);
    }        
}
