<?php

class site extends CI_Controller {

	function index(){
	
		$data=array();
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		if ($query)
		{
		$data['records']=$query;
		}
		
		$data['message'] = '';
		$data['main_content']='home_view';
	    $this->load->view('includes/template_front',$data);
		}
		
		function validate_credentials()
		{
		$this->load->model('membership_model');
		$query=$this->membership_model->validate();
		
		if($query)
		{
		
		$data=array(
		'username'=>$this->input->post('username'),
		'is_logged_in'=>TRUE
		);
		$this->load->library('session');
		$this->session->set_userdata($data);
				
		redirect('whistle_map');
		
		}
		else
		{
		$this->index();
		}
		}
		
		
		function signup()
		{
		$this->load->view('signup_form');
		}
		
		function create_member(){
		
		$this->load->library('form_validation');
		 //field name, error message, rules
		
		$this->form_validation->set_rules('username','User Name','trim|required|is_unique[membership.username]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2','Password Confirmation','trim|required|matches[password]');
		$this->form_validation->set_rules('email_address','Email Address','trim|required|valid_email|is_unique[membership.email_address]');
		$this->form_validation->set_rules('city','You live in');
		$this->form_validation->set_rules('interests','Interests');
		
		if($this->form_validation->run()==FALSE)
		{
		$this->signup();
		}
		
		else
		{
		$this->load->model('membership_model');
		if($query=$this->membership_model->create_member())
		 {
		    $show['message'] = 'You have successfully registered! Now you can log-in and start whistling!.';
			$show['main_content']='home_view';
			$this->load->view('includes/template_front',$show);
		 }
		 else
		 {
		    $this->load->view('signup_form');
		 }
		
		}
		
		}
		
		    function logout()  
        {  
        $this->session->sess_destroy();  
        $this->index();  
        }  
		
	    function register(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email Address','trim|required|valid_email|is_unique[emails.email]');

		
		if($this->form_validation->run()==FALSE)
		{
		$data['message'] = '';
		$data['main_content']='home_view';
	    $this->load->view('includes/template_front',$data);
		}

	else
		{
		
		$data= array(
		'email'=>$this->input->post('email'),
		'city'=>$this->input->post('city')
		);
		$email=$this->input->post('email');
		$this->load->library('email');
		$this->email->set_newline("\r\n");
		$this->email->from('cecmedical@gmail.com','Whoistlers team');
		$this->email->to($email);
		$this->email->subject('Thanks for registering');
		$message='hi!';
		$this->email->message($message);
	
	if($this->email->send())
{

            $show['message'] = 'Thanks! You will hear whistles soon.';
			$show['main_content']='success_view';
			$this->load->view('includes/template_front',$show);
	
	}

 else
 {
 show_error($this->email->print_debugger());
}
		//$this->site_model->add_email($data);
		$this->membership_model->add_email($data);
		$this->index();
		}	

}
	
		function messages(){
		$data['main_content']='messages';
	    $this->load->view('includes/template',$data);
		}	
        
		function user(){
		$data['main_content']='user';
	    $this->load->view('includes/template',$data);
		
		}
		
		
}