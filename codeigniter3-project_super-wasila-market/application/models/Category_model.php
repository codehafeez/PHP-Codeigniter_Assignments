<?php
class Category_model extends CI_Model {

	public function allCategory() {
	    $this->db->select('*');
		$this->db->from('categories');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function addCategory($category_Name){
		$data = array('	category_name' => $category_Name);	
		$this->db->insert('categories', $data);
		echo 'success';
	}

	public function deleteCategory($id){
        $this->db->where('category_id', $id);
        $this->db->delete('categories');
        echo 'success';
	}
}