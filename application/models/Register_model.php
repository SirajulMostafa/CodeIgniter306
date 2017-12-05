<?php

class Register_model extends CI_Model {
    function check_id($id){
        $q = $this->db->where('id_no',$id)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            return true;   
        }else{
            return false;   
        }
    }
    
    function check_username($username){
        $q = $this->db->where('username',$username)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            return true;   
        }else{
            return false;   
        }
    }
    
    function add_user(){
        $data = array(
                'id_no' => $this->input->post('id_no'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => 'user',
                'status' => 1,
                'date_created' => date('Y-m-d G:i:s'),
                'img' => 'avator.png',
            );
        $q = $this->db->where($data)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            echo 'duplicate';   
        }else{
            $this->db->insert('tbl_user',$data);  
        }
    }
}
?>