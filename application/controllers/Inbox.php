<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {

	public function __construct(){
        parent::__construct();    
        $this->load->model('Login_model');
        $this->load->model('User_model');
        $this->load->model('Message_model');
        $this->Login_model->is_logged_in();   
        $this->level = $this->session->userdata('user_level');
        if($this->level != 'admin'){
            $this->className = 'hide';   
        }
        $this->Message_model->count_messages();
    }
    
    function index(){
        $msg = $this->Message_model;
        
        $data['record'] = $msg->get_messages();  
        if(!$data['record']){
            $data['nodata'] = TRUE;   
        }
        $data['contacts'] = $msg->get_contacts();
        
        $data['title'] = 'Messages';
        $data['user'] = $this->User_model->user_info();
        $data['main'] = 'inbox';
		$this->load->view('include/template',$data);
    }
    
    function search(){
        $msg = $this->Message_model;
        $data['record'] = $msg->get_messages_by_search();
        if(!$data['record']){
            $data['nosearch'] = TRUE;   
        }
        $data['title'] = 'Search Message';
        $data['user'] = $this->User_model->user_info();
        $data['main'] = 'inbox';
		$this->load->view('include/template',$data);
    }
    
    function sent(){
        $msg = $this->Message_model;
        
        $data['record'] = $msg->get_messages_sent();  
        $data['contacts'] = $msg->get_contacts();
        
        $data['title'] = 'Sent Messages';
        $data['user'] = $this->User_model->user_info();
		$this->load->view('inbox/sent',$data);
    }
    
    function trash(){
        $msg = $this->Message_model;
        
        $data['record'] = $msg->get_messages_trash();  
        $data['contacts'] = $msg->get_contacts();
        
        $data['title'] = 'Sent Messages';
        $data['user'] = $this->User_model->user_info();
		$this->load->view('inbox/trash',$data);
    }
    
    function read_message(){
        $id = $this->input->post('id');
        $data['msg'] = $this->Message_model->get_message_by_id($id,'inbox');
        //$this->load->view('readMessage',$data);
        echo json_encode($data['msg']); 
    }
    
    function get_sender(){
        $id = $this->input->post('id');
        $msg = $this->Message_model->get_message_by_id($id);
//        foreach($msg as $row):
//            $sender = $this->Message_model->get_username($row->user_from);
//            echo '<select name="send_to" class="form-control" readonly id="sent_to">';    
//            echo '<option value="'.$row->user_from.'">'.$sender.'</option>';
//            echo '</select>';
//        endforeach;
        return $msg;
    }
    
    function send(){
        $msg = $this->Message_model;        
        $msg->send_message();
        redirect('inbox?send');
    }
    function delete(){
        $msg = $this->Message_model;        
        $msg->delete_message();
        redirect('inbox?delete');
    }
    
    function deleteSent(){
        $msg = $this->Message_model;        
        $msg->delete_message_sent();
        redirect('inbox/sent?delete');
    }
    
    function deleteTrash(){
        $msg = $this->Message_model;        
        $msg->delete_message_trash();
        redirect('inbox/trash?delete');
    }
       
}