<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mcalendar extends CI_Model{

	private $table = '';
	function __construct(){
		parent::__construct();				
		$this->table_name = 'calendar_events';
	}

	function getEvent($event_id){

	}

	function getEvents($user_id){
		$query = '';
		$query['select'] = ' ' . $this->table_name . '.*, concat( personas.apellido, ", ", personas.nombre ) as patient_name ';
		$query['where'] = ' id_user = ' . $user_id;
		$query['join'] = " INNER JOIN personas ON ( ".$this->table_name.".id_patient = personas.id ) ";
		$user_events = sqlSelect( $this->table_name, $query );
		return output_json( $user_events );
	}

	function deleteEvent($event_id){

	}

	function updateEvent($event_id, $data){

	}

	function addEvents($post){		
		if( is_array( $post['id_patient'] ) ){
			$id_patient = '';
			foreach ($post['id_patient'] as $input) {
				if( $id_patient = '' )
					$id_patient = $input;
			}
			$post['id_patient'] = $id_patient;
		}


		$data = array(
			'id_user' => element( 'id', $this->session->userdata('userdata'), 0 ),
			'id' => element( 'event_id', $post, 0 ),
			'id_patient' => element( 'id_patient', $post, 0 ),
			'start' => date( 'Y-m-d', strtotime( element( 'start', $post, '0000-00-00' ) ) ),
			'title' => element( 'title', $post, 0 ),
		);



		if ( element( 'id', $data) != 0 ){
			sqlUpdate($this->table_name, $data);
		}else{			
			sqlInsert( $this->table_name , $data);
		}
	}

}