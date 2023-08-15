<?php
class ForgotPassword_model extends CI_Model {

    public function forgotpassword($email){
        $this->db->select('email, password');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        if ($query->num_rows() > 0) { 
            foreach ($query->result() as $row){
                $password = base64_decode($row->user_password);
				$to = $email;
				$subject = "Super Wasila Market";
				$message = "Super Wasila Market = Login password is : ".$password;
				$header = "From: codehafeez@gmail.com";
				if(mail($to, $subject, $message, $header)){ echo "Password send to your email, please check your email."; }
				else { echo 'Error : Can not send mail'; }
            }
        }
        else { echo "Sorry email not found, please enter a valid email."; }
    }
    
}