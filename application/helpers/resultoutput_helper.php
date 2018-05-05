<?php

//Select output format
function output_json($data){
	return json_encode($data);
}

function output_array($data){
	$result = $data;


	return $result;	
}



?>