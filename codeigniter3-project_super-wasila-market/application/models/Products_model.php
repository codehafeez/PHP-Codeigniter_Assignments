<?php
class Products_model extends CI_Model {

	// Fetch all records
	public function allProducts($rowno,$rowperpage) {
		$this->db->select('*');
		$this->db->from('products');
        $this->db->limit($rowperpage, $rowno);   
		$query = $this->db->get();
		return $query->result_array();
	}

	// get total records
    public function allProductsCount() {
      $this->db->select('count(*) as allcount');
      $this->db->from('products');
      $query = $this->db->get();
      $result = $query->result_array();
      return $result[0]['allcount'];
    }

    // report csv
	function report(){
		$this->db->select("p_barcode, p_name, category, p_description");
		$this->db->from('products');
		return $this->db->get();
	}

    // =========================================================================
    // =========================================================================
    // =========================================================================
    
	public function allProductsFilter($rowno,$rowperpage,
		$filter1_Barcode_Number,$filter2_Barcode_Number,
		$filter1_Product_Name,$filter2_Product_Name,
		$filter1_Product_Type,$filter2_Product_Type,
		$filter1_Product_Description,$filter2_Product_Description) {
		    
		
		
        // query start			    
		$this->db->select('*');
		$this->db->from('products');


		// Select
		if($filter1_Product_Type === 'on'){ $this->db->where('category', $filter2_Product_Type); }
		// Like Values
		if($filter1_Barcode_Number === 'on'){ $this->db->like('p_barcode', $filter2_Barcode_Number); }
		if($filter1_Product_Name === 'on'){ $this->db->like('p_name', $filter2_Product_Name); }		
		if($filter1_Product_Description === 'on'){ $this->db->like('p_description', $filter2_Product_Description); }		

		
        $this->db->limit($rowperpage, $rowno);
		$query = $this->db->get();
		return $query->result_array();
	}

    public function allProductsFilterCount(
		$filter1_Barcode_Number,$filter2_Barcode_Number,
		$filter1_Product_Name,$filter2_Product_Name,
		$filter1_Product_Type,$filter2_Product_Type,
		$filter1_Product_Description,$filter2_Product_Description) {


        // query start			    
        $this->db->select('count(*) as allcount');
        $this->db->from('products');

         
		// Select
		if($filter1_Product_Type === 'on'){ $this->db->where('category', $filter2_Product_Type); }
		// Like Values
		if($filter1_Barcode_Number === 'on'){ $this->db->like('p_barcode', $filter2_Barcode_Number); }
		if($filter1_Product_Name === 'on'){ $this->db->like('p_name', $filter2_Product_Name); }		
		if($filter1_Product_Description === 'on'){ $this->db->like('p_description', $filter2_Product_Description); }		
            
            
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }







	public function delete($id){
        $this->db->where('p_id', $id);
        $this->db->delete('products');
        echo 'success';
	}

	
	public function editProduct($id){
        $this->db->where('p_id',$id);
        $query = $this->db->get('products');
        return $result = $query->result();
	}

}