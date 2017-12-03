<?php

class Login_model extends CI_Model {

	function verify(){
		$query = $this->db
						->where('username',$this->input->post('user'))
						->where('password',md5($this->input->post('pass')))
						->get('tbl_user');
        
		if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $user_id = $row->user_id;   
                $level = $row->level;
            }
            $data = array(
                'user_id' => $user_id,
                'level' => $level,
                'is_logged_in' => true
            );                                       
            $this->session->set_userdata($data);
            return true;            
		}else{
            return false;   
        }
	}
    
    function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!$is_logged_in){
			redirect('login');
		}        
		return true;
	}
}
?>