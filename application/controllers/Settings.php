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
    //upload image 
     function image_upload()
    {
    //get data from required 

        $data['record'] = $this->settings_model->get_information();   
        $data['title'] = 'Add User Image';
        $data['user'] = $this->User_model->user_info();
    
        $data['main'] = 'uploadImage';
         $this->load->view('include/template',$data);
        //config for image upolading
        if ($_POST) {
          
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jepg';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
             $data['error'] = $error = array('error' => $this->upload->display_errors("<div class='alert alert-danger' role='alert' >", "</div>"));
             $data['flash'] = $this->session->flashdata('item');
             $this->load->view('include/template',$data);
        }
        else
            {   
                /*-------unlink pre link update new link in project folder------*/
                $data2 =  $data['user'];
                foreach ($data2 as $data4) {
                     $pic_name = $data4->img;  
                }    
                 $pic_path = "./uploads/" .$pic_name;

                if (file_exists($pic_path)) {
                     unlink($pic_path);
                }  

                /*--------------------------------*/ 


            $data = array('upload_data' => $this->upload->data());
            $upload_data = $data['upload_data'];
            $file_name = $upload_data['file_name'];
            $update_data['img'] = $file_name; 
           // $this->_update($update_id, $update_data);
          //  $this->settings_model->update_user();
            // var_export($update_data);die();
            
            $this->settings_model->update_user_profile_img($update_data);
            $data['update_id'] = $update_id;
            $data['headline'] = "Upload success";
            $data['flash'] = $this->session->flashdata('item');
            //$data['view_module']=('store_items');
            //after update delete the pre image from folder
               redirect('settings/image_upload?update');
        }
         }//post end
       
        
    }

    
    function index()
	{
       // $settings = $this->settings_model;
        
        $data['record'] = $this->settings_model->get_information();  
        
        $data['title'] = 'Settings';
        $data['user'] = $this->User_model->user_info();
        $data['main'] = 'settings';
        
        // }
        
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