<?php


function sqlInsert($table, $data, $query){
	// $data array should include all non-default values
	


	$select = ' * ';
	$form = $table;
	$where  = '';
	$orderby  = '';
	$groupby = '';
	$limit = '';

	// $this->db->list_fields( $table );


	// $this->db->insert($table);
	echo "!!";die;

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

	//Query construction
	$query_statement = $select . ' ' . $from . ' ' . $where . ' ' . $orderby . ' ' . $groupby . ' ' . $limit;	
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
	//return
	return $user_events;
}

function sqlUpdate($table, $id, $data){

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