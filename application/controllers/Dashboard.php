<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();    
        $this->load->model('Login_model');
        $this->load->model('Dashboard_model');
        $this->load->model('User_model');
        $this->Login_model->is_logged_in();        
    }
    
    function index()
	{
        $data['count_inbox'] = $this->Dashboard_model->count_inbox();
        $data['count_sent'] = $this->Dashboard_model->count_sent();
        $dashboard = $this->Dashboard_model;
        $data['main'] = 'dashboard';
        $data['title'] = 'Admin Panel';        
		$this->load->view('include/template',$data);
        
	}
    function logout(){
        $this->session->sess_destroy();
		redirect('login');
    }   
    
    function barGraph(){
        $count = $this->Dashboard_model->count_messages();
        $data = array(
                array(
                    'section'=>'Inbox',
                    'messages' => $count['inbox']
                    ),
                array(
                    'section'=>'Sent Items',
                    'messages' => $count['sent']
                    )
            );
        echo json_encode($data);
    }
   
    
    function lineGraph(){
        $data = array();
        for($i=0; $i <= 15; $i++){             
            $date = date ( 'Y-m-d', strtotime ( "-$i day" ) );
            $count = $this->Dashboard_model->count_inserted($date);
            $data[] = array(
                    'period' => $date,
                    'inbox' => $count['inbox'],
                    'sent' => $count['sent']
                );
        }
         echo json_encode($data); 
    }
    
}
