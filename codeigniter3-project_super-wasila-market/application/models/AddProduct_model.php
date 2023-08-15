<?php
require_once ('vendor/autoload.php');
use \Statickidz\GoogleTranslate;


class AddProduct_model extends CI_Model {

	// check barcode than return json db values
	public function addItem($input_barcode){
		$arr = [];
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('p_barcode', $input_barcode);
		$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
				$arr = array(
					'message' => "success",
					'p_id' => $row->p_id,
					'p_barcode' => $row->p_barcode,
					'p_name' => $row->p_name,
					'category' => $row->category,
					'p_description' => $row->p_description,
					'p_description_translated' => $row->p_description_translated,
				);    
            }
		}
        else { 
			$arr = array('message' => "Sorry this barcode not exist."); 
		}
		echo json_encode($arr);
	}

    public function addCheck($barcode){
        $this->db->select('p_barcode');
        $this->db->from('products');
        $this->db->where('p_barcode', $barcode);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return 'Sorry this barcode is already exist.'; }
        else { return 'not_exist'; }
    }    

    public function add($Barcode_Number, $Product_Name, $Product_Type, $Product_Description){
        $trans = new GoogleTranslate();
		$lang = $this->session->userdata('session_language');
        $d = $this->addCheck($Barcode_Number);
		if ($d == "not_exist"){
			$data = array(
				'p_barcode' => $Barcode_Number,
				'p_name' => $Product_Name,
				'category' => $Product_Type,
				'p_description' => $Product_Description,
				'p_description_translated' => $trans->translate("en", $lang, $Product_Description)
			);
			$this->db->insert('products', $data);
			echo 'success';
		}
		else { echo $d; }
    }


    public function updateCheck($barcode){
        $this->db->select('p_barcode');
        $this->db->from('products');
        $this->db->where('p_barcode', $barcode);
        $query = $this->db->get();
        if ($query->num_rows() > 1) { return 'Sorry this barcode is already exist.'; }
        else { return 'not_exist'; }
    }    

    public function update($id, $Barcode_Number, $Product_Name, $Product_Type, $Product_Description){
        $trans = new GoogleTranslate();
		$lang = $this->session->userdata('session_language');
        $d = $this->updateCheck($Barcode_Number);
		if ($d == "not_exist"){
			$data = array(
				'p_barcode' => $Barcode_Number,
				'p_name' => $Product_Name,
				'category' => $Product_Type,
				'p_description' => $Product_Description,
				'p_description_translated' => $trans->translate("en", $lang, $Product_Description)
			);
			$this->db->where('p_id', $id);
			$this->db->update('products', $data);
			echo 'success';
		}
		else { echo $d; }
    }
}