<?php

class Message_model extends CI_Model {
    public $total_unread;
    public $total_sent;
    public $total_trash;
	function get_contacts(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                ->where('user_id!=',$id)
                ->get('tbl_user')->result();
        return $q;
    }

    function send_message(){
       
        $data = array(
                'date' => date('Y-m-d G:i:s'),
                'user_from' => $this->session->userdata('user_id'),
                'user_to' => $this->input->post('send_to'),
                'subject' => $this->input->post('subject'),
                'content' => $this->input->post('content'),
                'location' => 'inbox',
                'status' => 'unread'
            );        
        $this->db->insert('tbl_message',$data);
        $this->db->insert('tbl_message_sent',$data);
        return TRUE;
    }
    
    function get_username($id){
       $q = $this->db
                    ->where('user_id',$id)
                    ->get('tbl_user')
                    ->result();
        foreach($q as $row){
            return $row->username;   
        }
    }
    function get_all_messages(){
        $q = $this->db
                    ->where('location','inbox')
                    ->order_by('date','desc')
                    ->get('tbl_message')                    
                    ->result();
        return $q;
    }
    
    function get_messages(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                    ->where('user_to',$id)
                    ->where('location','inbox')
                    ->order_by('date','desc')
                    ->get('tbl_message')                    
                    ->result();
        return $q;
    }
    
    function get_messages_by_search(){
        $id = $this->session->userdata('user_id');
        $keyword = $this->input->post('keyword');
        
        $q = 'SELECT tbl_user.username,DATE_FORMAT(tbl_message.date,"%b %d %Y %h:%i %p") as date,tbl_message.content,tbl_message.message_id,tbl_message.subject,tbl_message.user_from,tbl_message.status
            FROM tbl_message
            LEFT JOIN tbl_user on tbl_message.user_from = tbl_user.user_id
            WHERE tbl_message.user_to='.$id.'
            AND (
                tbl_message.subject LIKE "%'.$keyword.'%"
                OR tbl_message.content LIKE "%'.$keyword.'%"
                OR tbl_user.username LIKE "%'.$keyword.'%"
            )
            ORDER BY tbl_message.date DESC
        ';
        $q = $this->db->query($q)->result();
        return $q;
    }
    
    function get_all_messages_by_search(){
        $id = $this->session->userdata('user_id');
        $keyword = $this->input->post('keyword');
        
        $q = 'SELECT tbl_user.username,DATE_FORMAT(tbl_message.date,"%b %d %Y %h:%i %p") as date,tbl_message.content,tbl_message.message_id,tbl_message.subject,tbl_message.user_from,tbl_message.user_to,tbl_message.status
            FROM tbl_message
            LEFT JOIN tbl_user on tbl_message.user_from = tbl_user.user_id
            WHERE tbl_message.subject LIKE "%'.$keyword.'%"
                OR tbl_message.content LIKE "%'.$keyword.'%"
                OR tbl_user.username LIKE "%'.$keyword.'%"
            ORDER BY tbl_message.date DESC
        ';
        $q = $this->db->query($q)->result();
        return $q;
    }
    
    function get_messages_sent_by_search(){
        $id = $this->session->userdata('user_id');
        $keyword = $this->input->post('keyword');
        
        $q = 'SELECT tbl_user.username,DATE_FORMAT(tbl_message_sent.date,"%b %d %Y %h:%i %p") as date,tbl_message_sent.content,tbl_message_sent.message_id,tbl_message_sent.subject,tbl_message_sent.user_to,tbl_message_sent.status
            FROM tbl_message_sent
            LEFT JOIN tbl_user on tbl_message_sent.user_to = tbl_user.user_id
            WHERE tbl_message_sent.user_from='.$id.'
            AND (
                tbl_message_sent.subject LIKE "%'.$keyword.'%"
                OR tbl_message_sent.content LIKE "%'.$keyword.'%"
                OR tbl_user.username LIKE "%'.$keyword.'%"
            )
            ORDER BY tbl_message_sent.date DESC
        ';
        $q = $this->db->query($q)->result();
        return $q;
    }
    
    function get_messages_sent(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                    ->where('user_from',$id)
                    ->order_by('status,date','desc')
                    ->get('tbl_message_sent')                    
                    ->result();
        return $q;
    }
    
    function get_messages_trash(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                    ->where('user_to',$id)
                    ->where('location','trash')
                    ->order_by('status,date','desc')
                    ->get('tbl_message')                    
                    ->result();
        return $q;
    }
    
    function get_message_by_id($message_id,$location=null){
        $id = $this->session->userdata('user_id');
        $this->db->select('tbl_user.username,DATE_FORMAT(tbl_message.date,"%b %d %Y %h:%i %p") as date,tbl_message.content,tbl_message.message_id,tbl_message.subject,tbl_message.user_from');
        $this->db->where('message_id',$message_id);
        $this->db->join('tbl_user','tbl_user.user_id=tbl_message.user_from','left');        
        $q = $this->db->get('tbl_message')->result();               
        if($location!=null){
            $this->read_message($message_id);
        }
        
        return $q;
    }
    
    function get_admin_message_by_id($message_id){
        $id = $this->session->userdata('user_id');
        $this->db->select('tbl_user.username,DATE_FORMAT(tbl_message.date,"%b %d %Y %h:%i %p") as date,tbl_message.content,tbl_message.message_id,tbl_message.subject,tbl_message.user_from,tbl_message.user_to');
        $this->db->where('message_id',$message_id);
        $this->db->join('tbl_user','tbl_user.user_id=tbl_message.user_from','left');        
        $q = $this->db->get('tbl_message')->result();               

        return $q;
    }
    
    function get_message_sent_by_id($message_id){
        $id = $this->session->userdata('user_id');
        $this->db->select('tbl_user.username,DATE_FORMAT(tbl_message.date,"%b %d %Y %h:%i %p") as date,tbl_message.content,tbl_message.message_id,tbl_message.subject,tbl_message.user_to');
        $this->db->where('message_id',$message_id);
        $this->db->join('tbl_user','tbl_user.user_id=tbl_message.user_to','left');        
        $q = $this->db->get('tbl_message')->result();               

        return $q;
    }
    
    function read_message($message_id){
        $rec = array(
               'status' => 'read'
            );
        
        $this->db->where('message_id', $message_id);
        $this->db->update('tbl_message', $rec); 
        return true;
        
    }
    
    function update_message(){
        $post = $this->input->post();
        $data = array(
                'subject' => $post['subject'],
                'content' => $post['content'],
                'status' => 'unread'
            );
        $message_id = $post['message_id'];
        $this->db->where('message_id', $message_id);
        $this->db->update('tbl_message', $data); 
        return true;
    }
    
    function count_messages(){
        $id = $this->session->userdata('user_id');
        $q = "select * from tbl_message where user_to=$id and status='unread'";
        $rs = $this->db->query($q);
        $this->total_unread = $rs->num_rows();
        
        $q = "select * from tbl_message_sent where user_from=$id";
        $rs = $this->db->query($q);
        $this->total_sent = $rs->num_rows();
        
        $q = "select * from tbl_message where location='trash' and user_to=$id";
        $rs = $this->db->query($q);
        $this->total_trash = $rs->num_rows();
    }

    
    function delete_message(){
        $ids = $this->input->post('message_id');
        $c = count($ids);
        if($c == 0){
            $ids = array($this->uri->segment(3));   
        }
        $c = count($ids);
        for($i=0; $i < $c; $i++){
            $message_id = $ids[$i];   
            echo $message_id;
            $this->db
                    ->where('message_id',$message_id)
                    ->delete('tbl_message'); 
        }
        
    }
    
    function delete_message_sent(){
        $ids = $this->input->post('message_id');
        $c = count($ids);
        if($c == 0){
            $ids = array($this->uri->segment(3));   
        }
        $c = count($ids);
        for($i=0; $i < $c; $i++){
            $message_id = $ids[$i];   
            $this->db
                    ->where('message_id',$message_id)
                    ->delete('tbl_message_sent'); 
        }
        
    }
        
    
    function string_limit_words($string, $word_limit) { 
        $words = explode(' ', $string); 
        return implode(' ', array_slice($words, 0, $word_limit)); 
    }
    
    function time_diff($date_in){
            $start_date = $date_in;
            $end_date=date('Y-m-d H:i:s');

            $start_time = strtotime($start_date);
            $end_time = strtotime($end_date);
            $difference = $end_time - $start_time;

            $seconds = $difference % 60;            //seconds
            $difference = floor($difference / 60);

            $min = $difference % 60;              // min
            $difference = floor($difference / 60);

            $hours = $difference % 24;  //hours
            $difference = floor($difference / 24);

            $days = $difference % 30;  //days
            $difference = floor($difference / 30);

            $month = $difference % 12;  //month
            $difference = floor($difference / 12);
            
            $year = $difference % 1;  //month
            $difference = floor($difference / 1);


            $result = null;
            if($year!=0) {                
                if($year == 1){
                    $result.=$year.' Year ';    
                }else{
                    $result.=$year.' Years ';   
                }
            }
            if($month!=0) {                
                if($month == 1){
                    $result.=$month.' Month ';    
                }else{
                    $result.=$month.' Months ';   
                }
            }
            if($days!=0) {                
                if($days == 1){
                    $result.=$days.' Day ';    
                }else{
                    $result.=$days.' Days ';   
                }
            }
            if($hours!=0) {                
                if($hours == 1){
                    $result.=$hours.' Hour ';    
                }else{
                    $result.=$hours.' Hours ';   
                }
            }
            if($min!=0) {                
                if($min == 1){
                    $result.=$min.' Minute ';    
                }else{
                    $result.=$min.' Minutes ';   
                }
            }
            
            if($result==null){
                return 'Just Now';   
            }
            return $result.' ago';
        }
}
?>