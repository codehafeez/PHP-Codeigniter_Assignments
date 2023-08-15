<?php
class Login_model extends CI_Model {

    public function login($email, $password)
    {
		$pass = base64_encode($password);
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $this->db->where('status', 'true');
		$this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { 
            foreach ($query->result() as $row){
                $this->session->set_userdata('session_user_id', $row->id);
                $this->session->set_userdata('session_user_name', $row->name);
                $this->session->set_userdata('session_user_email', $email);
				if($this->session->userdata('session_language') == null){
					$this->session->set_userdata('session_language', 'en');
				}
                echo 'success';
            }
        }
        else { echo 'Sorry email or password incorrect.'; }
    }    

}