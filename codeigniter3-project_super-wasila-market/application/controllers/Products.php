<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {

    function __construct() {
        parent::__construct();		
        $this->load->model('Products_model');
        $this->load->model('Category_model');
    }
	
    public function Auth() {
        return $loginSession = $this->session->userdata('session_user_id');
    }

    public function index(){ $this->load(); }
    public function load($rowno=0) {
        if($this->Auth() !== ""){ // check session

			$rowperpage = 10;
			if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
			$users_record = $this->Products_model->allProducts($rowno,$rowperpage);
			$allcount = $this->Products_model->allProductsCount();
			
			// Pagination Configuration
			$config['base_url'] = base_url().'Products/load';
			$config['use_page_numbers'] = TRUE;
			$config['total_rows'] = $allcount;
			$config['per_page'] = $rowperpage;

			// Initialize
			$config['num_tag_open'] = '<li>'; 
			$config['num_tag_close'] = '</li>'; 
			$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">'; 
			$config['cur_tag_close'] = '</a></li>'; 
			$config['next_link'] = 'Next'; 
			$config['prev_link'] = 'Prev'; 
			$config['next_tag_open'] = '<li class="pg-next">'; 
			$config['next_tag_close'] = '</li>'; 
			$config['prev_tag_open'] = '<li class="pg-prev">'; 
			$config['prev_tag_close'] = '</li>'; 
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>'; 
			$config['last_tag_open'] = '<li>'; 
			$config['last_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			
			$data['pagination'] = $this->pagination->create_links();
			$data['result'] = $users_record;
			$data['row'] = $rowno;
			$data['categories'] = $this->Category_model->allCategory();

			// Load view
			$this->load->view('products/view', $data);

        }
		else { $this->load->view('login/login'); }
    }
    
    // =========================================================================
    // =========================================================================
    // =========================================================================
    

	public function filter($rowno=0){
        if($this->Auth() !== ""){ // check session
			$rowperpage = 10;
			if($rowno != 0){ $rowno = ($rowno-1) * $rowperpage; }
			
				// ==============================================================    			
				$filter1_Barcode_Number = $this->input->post('filter1_Barcode_Number');
				$filter2_Barcode_Number = $this->input->post('filter2_Barcode_Number');
		
				$filter1_Product_Name = $this->input->post('filter1_Product_Name');
				$filter2_Product_Name = $this->input->post('filter2_Product_Name');
		
				$filter1_Product_Type = $this->input->post('filter1_Product_Type');
				$filter2_Product_Type = $this->input->post('filter2_Product_Type');
		
				$filter1_Product_Description = $this->input->post('filter1_Product_Description');
				$filter2_Product_Description = $this->input->post('filter2_Product_Description');
				// =============================================================================    						

			$users_record = $this->Products_model->allProductsFilter($rowno,$rowperpage,
				$filter1_Barcode_Number,$filter2_Barcode_Number,
				$filter1_Product_Name,$filter2_Product_Name,
				$filter1_Product_Type,$filter2_Product_Type,
				$filter1_Product_Description,$filter2_Product_Description
			);
			$allcount = $this->Products_model->allProductsFilterCount(
				$filter1_Barcode_Number,$filter2_Barcode_Number,
				$filter1_Product_Name,$filter2_Product_Name,
				$filter1_Product_Type,$filter2_Product_Type,
				$filter1_Product_Description,$filter2_Product_Description
			);
			
			// Pagination Configuration
			$config['base_url'] = base_url().'Products/filter';
			$config['use_page_numbers'] = TRUE;
			$config['total_rows'] = $allcount;
			$config['per_page'] = $rowperpage;

			// Initialize
			$config['num_tag_open'] = '<li>'; 
			$config['num_tag_close'] = '</li>'; 
			$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">'; 
			$config['cur_tag_close'] = '</a></li>'; 
			$config['next_link'] = 'Next'; 
			$config['prev_link'] = 'Prev'; 
			$config['next_tag_open'] = '<li class="pg-next">'; 
			$config['next_tag_close'] = '</li>'; 
			$config['prev_tag_open'] = '<li class="pg-prev">'; 
			$config['prev_tag_close'] = '</li>'; 
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>'; 
			$config['last_tag_open'] = '<li>'; 
			$config['last_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			
			$data['pagination'] = $this->pagination->create_links();
			$data['result'] = $users_record;
			$data['row'] = $rowno;
			$data['categories'] = $this->Category_model->allCategory();
			
			// Load view
			$this->load->view('products/view', $data);
        }
		else { $this->load->view('login/login'); }
	}    
    
    
	
    // =========================================================================
    // =========================================================================
    // =========================================================================
    // all product report csv
	function report()
	{
        if($this->Auth() !== ""){
			$file_name = 'Products-Report_'.date('Ymd').'.csv'; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$file_name"); 
			header("Content-Type: application/csv;");
			
			// get data 
			$student_data = $this->Products_model->report();
			
			// file creation 
			$file = fopen('php://output', 'w');
			$header = array('Barcode Number', 'Product Name', 'Product Type', 'Product Description'); 
			fputcsv($file, $header);
			foreach ($student_data->result_array() as $key => $value) { fputcsv($file, $value); }
			fclose($file); 
			exit;
		}
		else { $this->load->view('login/login'); }
	}



    // =========================================================================
    // =========================================================================
    // =========================================================================
    // delete product
    public function delete() {
        if($this->Auth() !== ""){ // check session
			$id = $this->input->post('id');
			$this->Products_model->delete($id);
		}
		else { $this->load->view('login/login'); }
    }



	
    public function viewProduct($id) {
        if($this->Auth() != ""){ 
			$data['data'] = $this->Products_model->editProduct($id);
			$this->load->view('products/view-detail', $data);
		}
		else { $this->load->view('login/login'); }
    }
	
	
	
    public function editProduct($id) {
        if($this->Auth() != ""){ 
			$data['data'] = $this->Products_model->editProduct($id);
			$this->load->view('products/edit', $data);
		}
		else { $this->load->view('login/login'); }
    }
}
