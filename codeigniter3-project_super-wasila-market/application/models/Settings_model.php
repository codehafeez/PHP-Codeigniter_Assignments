<?php
class Settings_model extends CI_Model {

	public function myAccount_db(){
		$user_id = $this->session->userdata('session_user_id'); 
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
			return $result = $query->result();
		}
	}
	
	public function myAccount_updatePassword_db($old_password, $new_password){
		$user_id = $this->session->userdata('session_user_id'); 
		$returnVal = $this->myAccount_checkPassword_db($user_id, $old_password);
		if($returnVal == "success"){
			$password = base64_encode($new_password);
			$data = array(
				'password' => $password
			);
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);
			echo 'success';
		}
		else { echo $returnVal; }
	}	

	public function myAccount_checkPassword_db($user_id, $old_password){
        $password = base64_encode($old_password);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { return "success"; }
		else { return "Sorry old password incorrect."; }
	}
	
}