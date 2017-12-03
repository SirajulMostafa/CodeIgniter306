<?php

class Settings_model extends CI_Model {

	function get_information(){
        $id = $this->session->userdata('user_id');
        $this->db->where('user_id',$id);
        $q = $this->db->get('tbl_user')->result();
        return $q;
    }
    
    function check_id($id){
        $user_id = $this->session->userdata('user_id');
        $q = $this->db->where('id_no',$id)
                      ->where('user_id!=',$user_id)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            return true;   
        }else{
            return false;   
        }
    }
    
    function check_username($username){
        $id = $this->session->userdata('user_id');
        $q = $this->db->where('username',$username)
                      ->where('user_id!=',$id)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            return true;   
        }else{
            return false;   
        }
    }
    
    function check_password($password){
        $id = $this->session->userdata('user_id');
        $q = $this->db->where('password',md5($password))
                      ->where('user_id',$id)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            return true;   
        }else{
            return false;   
        }
    }
    
    function update_user(){
        $id = $this->session->userdata('user_id');
        $data = array(
                'id_no' => $this->input->post('id_no'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
        $this->db->where('user_id',$id);
        $this->db->update('tbl_user',$data);        
    }
}
?>