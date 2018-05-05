<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcalendar extends CI_Model{

	private $table = '';
	function __construct(){
		parent::__construct();				
		$this->table = 'calendar_events';
	}

	function getEvent($event_id){

	}

	function getEvents($user_id){
		$query = '';
		$query['where'] = ' id_user = ' . $user_id;
		$user_events = sqlSelect( $this->table, $query );
		return output_json( $user_events );
	}

	function deleteEvent($event_id){

	}

	function updateEvent($event_id, $data){

	}

	function addEvents($data){

	}

}