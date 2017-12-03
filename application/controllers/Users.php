<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
        parent::__construct();    
        $this->load->model('login_model');
        $this->load->model('User_model');
        $this->login_model->is_logged_in();   
        $level = $this->session->userdata('level');
        if($level != 'admin'){  
            redirect(base_url());
        }
    }
    
    function index(){
        $user = $this->User_model;
        
        $data['record'] = $user->get_all_users();  
        if(!$data['record']){
            $data['nodata'] = TRUE;           
        }
        $data['title'] = 'Users';
        $data['main'] = 'users';
        
        $this->form_validation->set_rules('id_no', 'ID No.', 'callback_check_id|required');
		$this->form_validation->set_rules('username', 'Username', 'callback_check_username|trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|matches[tmp_password]|md5');
        $this->form_validation->set_rules('tmp_password', 'Password Confirmation', 'trim');
        
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('include/template',$data);
		}
		else
		{
            $user->update_user();
            redirect('users?update');
		}
    }
    
    function check_id($str){
        $check_id = $this->User_model->check_id($str);
        if($check_id){
            $this->form_validation->set_message('check_id', 'ID no. '.$str.' is not available');
            return false;   
        }else{
            return true;   
        }
    }
    
    function check_username($str){
        $check_username = $this->User_model->check_username($str);
        if($check_username){
            $this->form_validation->set_message('check_username', 'Username ('.$str.') is already taken');
            return false;   
        }else{
            return true;   
        }
    }
    
    function get_info(){
        $info = $this->User_model->get_user_info();
        echo json_encode($info); 
    }
    
    function search(){
        $user = $this->User_model;
        $data['record'] = $user->get_users_by_search();
        if(!$data['record']){
            $data['nosearch'] = TRUE;   
        }
        $data['title'] = 'Search User';
        $data['main'] = 'users';
		$this->load->view('include/template',$data);
    }
    
    function delete(){
        $user = $this->User_model;
        $user->delete_user();
        redirect('users?delete');
    }
    function get_username($id){
        $username = $this->Message_model->get_username($id);
        return $username;
    }
    
    function update(){
        $user = $this->User_model;
        
        
        
        
        redirect('users?update');
    }
}