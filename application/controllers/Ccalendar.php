<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccalendar extends CI_Controller {
	private $view_prefix;
	private $js_path;

	function __construct(){
		parent::__construct();	
		$this->view_prefix = "directory_";		
		//Load helpers		
		$this->load->helper(array('mysql', 'resultoutput', 'array'));		
		//Load libraries
		//
		//Load models	
		$this->load->model('Mcalendar', '', TRUE);
		//Attributes		
		//

	}


	function getEvent($event_id){
		$event = $this->Mcalendar->getEvent($event_id);
		return output_json($event);		
	}

	function getEvents(){
		$user_id = element( 'id', $this->session->userdata('userdata') );		
		$events = $this->Mcalendar->getEvents($user_id);
		echo $events;
	}

	function deleteEvent($event_id){
		$this->Mcalendar->deleteEvent($event_id);

		return $this->getEvents();
	}

	function updateEvent($event_id, $data){
		$this->Mcalendar->updateEvent($event_id, $data);

		return $this->getEvents();
	}

	function addEvents($events, $data){
		$this->Mcalendar->addEvents($data);

		return $this->getEvents();	
	}


	

}