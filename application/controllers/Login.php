<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
        parent::__construct();  
        $this->load->model('Login_model');
       // $this->load->library('session');
        $is_logged_in = $this->session->userdata('is_logged_in');
		if($is_logged_in){
			redirect('dashboard');
		}
    }
    
    function index()
	{
		//$this->load->view('login');
		
	
		$this->form_validation->set_rules('user', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{

			//$this->load->model('Login_model');//this is not required already cal  at the top
            $verify = $this->Login_model->verify();
            if($verify){                                
                redirect('dashboard');
            }else{
                redirect('login?login=error'); 
            }                 
		}
		
        
	}
    
    
}
