<?php

class site_model extends CI_Model{
	function get_emails(){

	$query=$this->db->get('emails');
	return $query->result();
	}
	
	function add_email($data){

	$this->db->insert('emails',$data);
	return;
	}
}