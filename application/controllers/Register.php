<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct(){
        parent::__construct();  
        $this->load->model('login_model');
        $this->load->model('register_model');
        $is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in){
			redirect('dashboard');
		}
    }
    
    function index()
	{
		$this->form_validation->set_rules('id_no', 'ID No.', 'callback_check_id|required');
		$this->form_validation->set_rules('username', 'Username', 'callback_check_username|trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[tmp_password]|md5');
        $this->form_validation->set_rules('tmp_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('register');
		}
		else
		{
            $this->register_model->add_user();
            redirect('register?success');
		}
        
	}
    
    function check_id($str){
        $register = $this->register_model;
        $check_id = $register->check_id($str);
        if($check_id){
            $this->form_validation->set_message('check_id', 'ID no. '.$str.' is not available');
            return false;   
        }else{
            return true;   
        }
    }
    
    function check_username($str){
        $register = $this->register_model;
        $check_username = $register->check_username($str);
        if($check_username){
            $this->form_validation->set_message('check_username', 'Username ('.$str.') is already taken');
            return false;   
        }else{
            return true;   
        }
    }
    
}
