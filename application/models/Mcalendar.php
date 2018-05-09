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
		foreach ($user_events as $evnt) {			
			if( element( 'start', $evnt, 'nostart') != 'nostart'){								
				$evnt['start_date'] = date( 'm/d/Y', strtotime( element( 'start', $evnt ) ) );
				$evnt['start_time'] = date( 'h:i A', strtotime( element( 'start', $evnt ) ) );
				$evnt['start'] = date( 'Y-m-d', strtotime( element( 'start', $evnt ) ) ) . 'T' . substr( date( 'h:i:s A', strtotime( element( 'start', $evnt ) ) ) , 0, -3);;
			}
			if( element( 'end', $evnt, 'noend') != 'noend'){
				$evnt['end'] = date( 'Y-m-d H:i:s', strtotime( element( 'end', $evnt ) ) );			
				$evnt['end_date'] = date( 'Y-m-dTH:i:s', strtotime( element( 'end', $evnt ) ) );			
			}			

			$return_events[] = $evnt;
		}		
		return output_json( $return_events );
	}

	function deleteEvent($event_id){

	}

	function updateEvent($event_id, $data){

	}

	function addEvents($post){	
		//Validate the patient_id
		$patient_id = $post['patient_id'];				
		if( isset($patient_id[0]) && $patient_id[0] != ''  ){
			
			$patient_id = $patient_id['0'];
		}
		if( isset($patient_id[1]) && $patient_id[1] != ''  ){
			
			$patient_id = $patient_id['1'];
		}
		//Format start and end datetime
		$start_time =  element('start_time', $post);
		$start_time = date_create($start_time);
		$start_time = date_format($start_time,'H:i:s');		
		$end_time = date('H:i:s', strtotime($start_time.' + 1 hour ') )	;		
		$start_datetime = date( 'Y-m-d', strtotime( element( 'start_date', $post, '0000-00-00' ) ) ) . ' ' . $start_time ;
		$end_datetime = date( 'Y-m-d', strtotime( element( 'start_date', $post, '0000-00-00' ) ) ) . ' ' . $end_time ;
		
		//Initialize the data array
		$data = array(
			'id_user' => element( 'id', $this->session->userdata('userdata'), 0 ),
			'id' => element( 'event_id', $post, 0 ),
			'id_patient' => $patient_id,
			'start' => $start_datetime,
			'end' => $end_datetime,
			'title' => element( 'title', $post, 0 ),
		);
		//Excecute
		if ( element( 'id', $data) != 0 ){
			sqlUpdate($this->table_name, $data);
		}else{			
			sqlInsert( $this->table_name , $data);
		}
	}

}