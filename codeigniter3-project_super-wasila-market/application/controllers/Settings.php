<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Settings_model');
    }

    public function Auth() {
        return $loginSession = $this->session->userdata('session_user_id');
    }
	
    // public function myAccount() {
    public function index() {
        if($this->Auth() != ""){
			$data['data'] = $this->Settings_model->myAccount_db(); 
			$this->load->view('settings/my-account', $data);
		}
		else { $this->load->view('login/login'); }
    }

    public function myAccount_updatePassword_db() {
        if($this->Auth() != ""){
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');
			$this->Settings_model->myAccount_updatePassword_db($old_password, $new_password);
		}
		else { $this->load->view('login/login'); }
    }
}
