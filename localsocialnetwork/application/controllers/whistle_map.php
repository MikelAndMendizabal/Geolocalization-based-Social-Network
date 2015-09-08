<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
class whistle_map extends CI_Controller
{
   
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
		 $username=$this->session->userdata('username');
		 redirect('site');
		 die();
		  }
	   }
	   
function index()
	{
        $this->load->model('whistle_model');
		 $data['rows']=$this->whistle_model->getAll();

		$this->load->library('googlemaps');
		$config=array();
		$config['center']='Berlin, Germany';
		$config['zoom']=12;
		$this->googlemaps->initialize($config);
	
	foreach($data['rows'] as $r)
	{
	$city='Berlin';
	$street=$r->street;
	$username=$r->username;
	$whistle=$r->whistle;
	$distance=$r->distance;
	$category=$r->category;
	$macrocategory=$r->macrocategory;
	
	$marker = array();
	$marker['infowindow_content']="<strong>$username</strong> is whistling:<br> $whistle";
    $marker['position'] = "$street,$city";
	if (($category=='Eating'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_food_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		
		else if (($category=='Drinking'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_beverage_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		
		else if (($category=='Music'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_music_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Video'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_cinema_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Books'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_books_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Story'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_art_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Nightlife'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_nightlife_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Crafts'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_crafts_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='House')) 
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_tools_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Transport'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_transport_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Sport'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_sport_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Technicalities'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_technical_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Burocracy'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_info_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Health'))
		{
		$marker['icon']="http://www.whoistlers.com/images/maplogo.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Weird'))
		{
		$marker['icon']="http://www.whoistlers.com/images/whistle_weird_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		
		else{
		$marker['icon']="http://www.whoistlers.com/images/maplogo.gif";
         $this->googlemaps->add_marker($marker);
        }
    
	 }
	$data['map']=$this->googlemaps->create_map();
		
		$data['main_content']='map_view';
	    $this->load->view('includes/template',$data);
    
	/*
        $distance=$this->input->post('distance');
		$city=$r->city;
		$city2=$this->input->post('city2');
		$username=$r->username;
		$street=$r->street;
		$whistle=$r->whistle;
		$category=$this->input->post('category');
		$whistle_long=$this->input->post('whistle_long');
		
		$address1 = "$street,$city";
			
		$prepAddr = str_replace(' ','+',$address1);
 
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
 
        $output= json_decode($geocode);
 
         $lat1 = $output->results[0]->geometry->location->lat;
         $long1 = $output->results[0]->geometry->location->lng;
		 
		  $address2 = $city2;
			
		$prepAddr = str_replace(' ','+',$address2);
 
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
 
        $output= json_decode($geocode);
 
         $lat2 = $output->results[0]->geometry->location->lat;
         $long2 = $output->results[0]->geometry->location->lng;
 
		  $abs1=40000/360*abs($lat1 - $lat2);
		  $abs2=20000/180*abs($long1 - $long2);
		  $d = sqrt(pow($abs1, 2) + pow($abs2, 2));
		  
		if(($city==$city2)||($d<50)) 
		{
		$this->load->library('googlemaps');
		$config=array();
		$config['center']=$city2;
		$config['zoom']=12;
		$this->googlemaps->initialize($config);
		
		$marker = array();
		//$username = $this->session->userdata['username']; 
		$marker['infowindow_content']="<strong>$username</strong> is whistling for <strong>$category</strong>! <br> $whistle";
        $marker['position'] = "$street,$city2";
		
		$marker['draggable'] = FALSE;	
		$marker['animation'] = "BOUNCE";
		if (($category=='Eating'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_food_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		
		else if (($category=='Drinking'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_beverage_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		
		else if (($category=='Music'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_music_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Video'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_cinema_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Books'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_books_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Story'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_art_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Nightlife'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_nightlife_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Crafts'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_crafts_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='House')) 
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_tools_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Transport'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_transport_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Sport'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_sport_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Technicalities'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_technical_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Burocracy'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_info_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Health'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/maplogo.gif";
         $this->googlemaps->add_marker($marker);
		}
		else if (($category=='Weird'))
		{
		$marker['icon']="http://localhost/whoistlerslocal/images/whistle_weird_map.gif";
         $this->googlemaps->add_marker($marker);
		}
		
		else{
		$marker['icon']="http://localhost/whoistlerslocal/images/maplogo.gif";
         $this->googlemaps->add_marker($marker);
        }
		
		$circle = array();
		$circle['center'] = "$street,$city2";
		$circle['radius'] = $distance; 
		$circle['fillColor'] = "#00CCFF";
		$circle['strokeColor'] = "#00BBFF";
		$config['directions'] = TRUE;
		$config['directionsStart'] = '$city';
		$config['directionsEnd'] = 'statue of liberty';
        
		$this->googlemaps->add_circle($circle);
        
		$data['map']=$this->googlemaps->create_map();
		
		$data['main_content']='map_view';
	    $this->load->view('includes/template',$data);
		
		
		}*/
		
		}
		}