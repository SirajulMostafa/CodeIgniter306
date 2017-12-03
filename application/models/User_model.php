<?php

class User_model extends CI_Model {
    
    function user_info(){
        $user_id = $this->session->userdata('user_id');
        $q = $this->db->get_where('tbl_user',['user_id'=>$user_id]);
                    // ->where('user_id',$user_id)
                    // ->get('tbl_user');
        return $q->result();
    }
    
    function get_user_info(){
        $user_id = $this->input->post('id');
        $q = $this->db
                    ->select('DATE_FORMAT(date_created,"%b %d %Y %h:%i %p") as date_created,id_no,user_id,username')
                    ->where('user_id',$user_id)
                    ->get('tbl_user');
        return $q->result();
    }
    
    function get_contacts(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                ->where('user_id!=',$id)
                ->get('tbl_user')->result();
        return $q;
    }
    function get_all_users(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                    ->where('user_id!=',$id)
                    ->order_by('username','asc')
                    ->get('tbl_user')                    
                    ->result();
        return $q;
    }
    
    function get_users_by_search(){
        $keyword = $this->input->post('keyword');
        $id = $this->session->userdata('user_id');
        $q = 'SELECT * FROM tbl_user WHERE user_id!='.$id.'
            AND (
                id_no LIKE "%'.$keyword.'%"
                OR username LIKE "%'.$keyword.'%"
            )
            ORDER BY username ASC
        ';
        $q = $this->db->query($q)->result();
        return $q;
    }
    
    
    function check_id($id){
        $user_id = $this->input->post('user_id');
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
        $user_id = $this->input->post('user_id');
        $q = $this->db->where('username',$username)
                      ->where('user_id!=',$user_id)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            return true;   
        }else{
            return false;   
        }
    }
    
    function update_user(){
        $user_id = $this->input->post('user_id');
        $data = array(
                'id_no' => $this->input->post('id_no'),
                'username' => $this->input->post('username')
            );
        $password = $this->input->post('password');
        if($password):
            $data['password'] = $password; 
        endif;
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user',$data);        
    }
    
    function delete_user(){
        $ids = $this->input->post('user_id');
        $c = count($ids);
        for($i=0; $i < $c; $i++){
            $user_id = $ids[$i];   
            $this->db
                    ->where('user_id',$user_id)
                    ->delete('tbl_user'); 
        }
        
    }
}
?>