<?php

class membership_model extends CI_Model{
	
	function get_emails(){

	$query=$this->db->get('emails');
	return $query->result();
	}
	
	function add_email($data){

	$this->db->insert('emails',$data);
	return;
	}
	
	function validate(){
     
	$this->db->where('username',$this->input->post('username'));
	$this->db->where('password',md5($this->input->post('password')));
	$query=$this->db->get('membership');
	
	if($query->num_rows==1)
	{
	return true;
	}
	}
	
	function create_member(){
	
     $new_member_insert_data=array(
	 'username'=>$this->input->post('username'),
     'password'=>md5($this->input->post('password')),
	 'email_address'=>$this->input->post('email_address'),
	 'city'=>$this->input->post('city'),
	 'interests'=>$this->input->post('interests')
	 );
	  $insert=$this->db->insert('membership',$new_member_insert_data);
	 return $insert;
	}
	
}