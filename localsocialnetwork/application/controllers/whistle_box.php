<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
class whistle_box extends CI_Controller{

     function __construct()
      {
        parent::__construct();
        $this->is_logged_in();
      }
    
	  function is_logged_in()
       {
        $is_logged_in=$this->session->userdata('is_logged_in');
		 if(!isset($is_logged_in)||$is_logged_in!==TRUE)
		 {
		 redirect('site');
		 die();
		  }
	   }
	
	function index()
	{
	    $data['main_content']='getcity_view';
	    $this->load->view('includes/template',$data);
		
	    $this->load->library('form_validation');
		$this->form_validation->set_rules('whistle','Whistle','trim|required');
		
		if($this->form_validation->run()==FALSE)
		{	
		//echo "SORRY!! You need to whistle in your own city ;)";	
       // $data['main_content']='getcity_view';
	    //$this->load->view('includes/template',$data);		
		}
		
		else{
		
		$this->load->model('whistle_model');
		$query=$this->whistle_model->create_whistle();
		
		if($query)
		 {		 
		 
	 
		 redirect('whistle_map');
		
		//echo "Distance to the center of the city: ".$d;
       //echo $d;
		}
		else {
		echo '<script type="text/javascript">alert("SORRY!! You need to whistle in your own city ;)");</script>'; 
			//echo "Distance to the center of your city: ".$d;
        }
	   
	   } 
	   		
		}
		
	}	
		