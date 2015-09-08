<?php

class whistle_model extends CI_Model{

function create_whistle(){

     $new_whistle_insert_data=array(
	 'username'=> $this->session->userdata['username'],
	 'whistle'=>$this->input->post('whistle'),
	 'city'=>$this->input->post('city'),
	 'street'=>$this->input->post('street'),
	 'macrocategory'=>$this->input->post('macrocategory'),
	 'category'=>$this->input->post('category'),
	 'distance'=>$this->input->post('distance')
	 
	 );
	  $insert=$this->db->insert('whistle',$new_whistle_insert_data);
	 return $insert;
	}
	
	function getAll()
{

$q=$this->db->get('whistle');
if ($q->num_rows()>0)
{
foreach($q->result() as $row){
$data[]=$row;
}
return $data;
}

}
	
	}