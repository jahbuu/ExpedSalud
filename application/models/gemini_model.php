<?php

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gemini_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function crearCurso($data){
		$this->db->insert('cursos', array('nombreCurso' => $data['nombre'], 'CantidadVIdeos' => $data['videos'] ));
	}
	function getCursos(){
		$query = $this->db->get('cursos');
		if($query->num_rows() > 0 ) return $query;
		else return false;
	}
	function getCurso($id){
		$this->db->where('idCurso', $id);
		$query = $this->db->get('cursos');
		if($query->num_rows() > 0 ) return $query;
		else return false;
	}
	function actualizarCurso($id, $data){
		$datos = array(
			'nombreCurso'=> $data['nombre'],
			'cantidadVideos'=> $data['videos']
		);
		$this->db->where('idCurso', $id);
		$query = $this->db->update('cursos', $datos);
	}


}

?>