<?php


function sqlInsert($table, $data){
	// $data array should include all non-default values	

	// Get instance of Model
	$ci =& get_instance();
	//Insert
	$ci->db->insert($table, $data);	
}

function sqlSelect($table, $query){	
	// Get instance of Model
	$ci =& get_instance();

	//Validate query strucuture
	if( element('select', $query, 'noselect') != 'noselect' ){
		$select = ' SELECT ' . element( 'select', $query) . ' ';
	}else{
		$select = ' SELECT * ';
	}

	if( isset( $table ) ){
		$from = ' FROM ' . $table . ' ';
	}else{
		//Handle Exception
	}

	if( element('where', $query, 'nowhere') != 'nowhere' ){
		$where = ' WHERE ' . element( 'where', $query) . ' ';
	}else{
		$where = ' ';
	}

	if( element('join', $query, 'noquery') != 'noquery'){
		$join = element('join', $query);
	}else{
		$join = ' ';
	}

	if( element('orderby', $query, 'noorderby') != 'noorderby' ){
		$orderby = element( 'orderby', $query);
	}else{
		$orderby = ' ';
	}

	if( element('groupby', $query, 'nogroupby') != 'nogroupby' ){
		$groupby = element( 'groupby', $query);
	}else{
		$groupby = ' ';		
	}

	if( element('limit', $query, 'nolimit') != 'nolimit' ){
		$limit = element( 'limit', $query);
	}else{
		$limit = ' ';
	}

	if( element('join', $query, 'nojoin') == 'nojoin'){
	// Selects the columns of one table
		//Query construction
		$query_statement = $select . ' ' . $from . ' ' . $join .' ' . $where . ' ' . $orderby . ' ' . $groupby . ' ' . $limit;	
		//Query excecution
		$results = $ci->db->query( $query_statement );
		//Get table columns namelist
		$fields_list = $ci->db->list_fields($table);
		//Fetch results into user_events
		$user_events = array();
		foreach ($results->result_array() as $row){
			$event = array();
			foreach ($fields_list as $field) {			
				$event[$field] = $row[$field];
			}
			$user_events[] = $event;
		}		
	}else{		
	// Selects the columns including join pg_parameter_status
		//Query construction
		$query_statement = $select . ' ' . $from . ' ' . $join .' ' . $where . ' ' . $orderby . ' ' . $groupby . ' ' . $limit;	
		//Query excecution
		$results = $ci->db->query( $query_statement );
		//Get table columns namelist
		$fields_list = $ci->db->list_fields($table);
		//Fetch results into user_events
		$user_events = array();
		foreach ($results->result_array() as $row){
			$event = array();
			foreach ($fields_list as $field) {			
				$event[$field] = $row[$field];
			}
			$event['patient_name'] = $row['patient_name'];
			$user_events[] = $event;

		}
	}
	return $user_events;
}

function sqlUpdate($table, $data){
	// Get instance of Model
	$ci =& get_instance();
	//Update
	$ci->db->replace($table, $data);

}

function sqlDelete($table, $id){

}

function sqlSelectAll($table){
	$select = ' * ';
	$form = $table;
	$where  = '';
	$orderby  = '';
	$groupby = '';
	$limit = '';
}

function sqlDrop($table){

}




?>