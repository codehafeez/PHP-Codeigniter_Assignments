<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends CI_Controller {

    function __construct() {
        parent::__construct();		
        $this->load->model('Category_model');
    }
	
    public function Auth() {
        return $loginSession = $this->session->userdata('session_user_id');
    }

    public function index(){
        if($this->Auth() !== ""){
			$data['result'] = $this->Category_model->allCategory();
			$this->load->view('category/category', $data);
        }
		else { $this->load->view('login/login'); }
    }
    
    public function addCategory(){
        if($this->Auth() !== ""){
    		$category_name = $this->input->post('category_name');
            $this->Category_model->addCategory($category_name);
        }
		else { $this->load->view('login/login'); }
    }

    public function deleteCategory() {
        if($this->Auth() !== ""){
			$id = $this->input->post('id');
			$this->Category_model->deleteCategory($id);
		}
		else { $this->load->view('login/login'); }
    }

}
