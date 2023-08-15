<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddProduct extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('AddProduct_model');
        $this->load->model('Category_model');
    }
	
    public function Auth() {
        return $loginSession = $this->session->userdata('session_user_id');
    }

    public function index() {
        $loginSession = $this->session->userdata('session_user_id');
        if($this->Auth() !== "") {
            $data['result'] = $this->Category_model->allCategory();
            $this->load->view('products/add', $data);
        }
		else { $this->load->view('login/login'); }
    }
	
    public function add() {
        if($this->Auth() !== ""){			
			$Barcode_Number = $this->input->post('Barcode_Number');
			$Product_Name = $this->input->post('Product_Name');
			$Product_Type = $this->input->post('Product_Type');
			$Product_Description = $this->input->post('Product_Description');
			$this->AddProduct_model->add($Barcode_Number, $Product_Name, $Product_Type, $Product_Description);
		}
		else { $this->load->view('login/login'); }
    }
	
	
    // update product data
    public function update() {
        if($this->Auth() !== ""){
			$id = $this->input->post('id');
			$Barcode_Number = $this->input->post('Barcode_Number');
			$Product_Name = $this->input->post('Product_Name');
			$Product_Type = $this->input->post('Product_Type');
			$Product_Description = $this->input->post('Product_Description');
			$this->AddProduct_model->update($id, $Barcode_Number, $Product_Name, $Product_Type, $Product_Description);
		}
		else { $this->load->view('login/login'); }
    }	
	

	// add item by input barcode (dashboard table)
    public function addItem() {
        if($this->Auth() !== ""){
			$input_barcode = $this->input->post('input_barcode');
			$this->AddProduct_model->addItem($input_barcode);
		}
		else { $this->load->view('login/login'); }
    }	

}
