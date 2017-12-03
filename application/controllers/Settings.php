<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
        parent::__construct();    
        $this->load->model('login_model');
        $this->load->model('User_model');
        $this->load->model('settings_model');
        $this->login_model->is_logged_in();   
    }
    
    function index()
	{
        $settings = $this->settings_model;
        
        $data['record'] = $settings->get_information();  
        
        $data['title'] = 'Settings';
        $data['user'] = $this->User_model->user_info();
        $data['main'] = 'settings';
        
		$this->form_validation->set_rules('id_no', 'ID No.', 'callback_check_id|required');
		$this->form_validation->set_rules('username', 'Username', 'callback_check_username|trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('current_password', 'Current Password', 'callback_check_password|trim|required|md5');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[tmp_password]|md5');
        $this->form_validation->set_rules('tmp_password', 'Password Confirmation', 'trim|required');
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('include/template',$data);
		}
		else
		{
            $this->settings_model->update_user();
            redirect('settings?update');
		}
        
	}
    function check_password($str){
        $check_password = $this->settings_model->check_password($str);
        if(!$check_password){
            $this->form_validation->set_message('check_password', 'The password you entered is not your current password');
            return FALSE;            
        }else{
            return TRUE;   
        }
    }
    
    function check_id($str){
        $check_id = $this->settings_model->check_id($str);
        if($check_id){
            $this->form_validation->set_message('check_id', 'ID no. '.$str.' is not available');
            return false;   
        }else{
            return true;   
        }
    }
    
    function check_username($str){
        $check_username = $this->settings_model->check_username($str);
        if($check_username){
            $this->form_validation->set_message('check_username', 'Username ('.$str.') is already taken');
            return false;   
        }else{
            return true;   
        }
    }
    
   
}