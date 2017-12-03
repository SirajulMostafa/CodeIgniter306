<?php

class Dashboard_model extends CI_Model {
      


    function count_inbox(){
        $id = $this->session->userdata('user_id');
       // $q = "select * from tbl_message where user_to=$id";
        $q = $this->db->get_where('tbl_message',['user_to'=>$id]);
       // $rs = $this->db->query($q);
       return $q->num_rows();
        //return $rs->num_rows();
    }
    
    function count_sent(){
        $id = $this->session->userdata('user_id');
       // $q = "select * from tbl_message_sent where user_from=$id";
        // $rs = $this->db->query($q);
        // return $rs->num_rows();
        $q = $this->db->get_where('tbl_message_sent',['user_from'=>$id]);
        return $q->num_rows();
    }
    
    function count_messages(){
            $id = $this->session->userdata('user_id');
            // $data['inbox'] = $this->db
            //         ->where('user_to',$id)
            //         ->count_all_results('tbl_message');
            $q = $this->db->get_where('tbl_message',['user_to'=>$id]);
            $data['inbox'] = $q->num_rows();

            /*$data['sent'] = $this->db
                    ->where('user_from',$id)
                    ->count_all_results('tbl_message_sent');   */   
            $q = $this->db->get_where('tbl_message_sent',['user_from'=>$id]);
            $data['sent'] = $q->num_rows();      
            return $data;
        }
    
    function count_inserted($date){
// $this->db->like('title', 'match', 'before');    // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
// $this->db->like('title', 'match', 'after');     // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'
// $this->db->like('title', 'match', 'both');      // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'
            $id = $this->session->userdata('user_id');
            $data['inbox'] = $this->db
                   ->where('user_to',$id)
                    ->like('date',$date,'both')
                    ->count_all_results('tbl_message');
            
            $data['sent'] = $this->db
                    ->where('user_from',$id)
                    ->like('date',$date,'both')
                    ->count_all_results('tbl_message_sent');
                    //echo $this->db->count_all_results('my_table');  // Produces an integer, like 25

            return $data;
        }
}   
?>