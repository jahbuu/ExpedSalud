<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {
	//Calls parent constructor
	function __construct(){
		parent::__construct();	
		$this->load->helper('form');
		$this->load->model('gemini_model');		
	}
	//
	function index(){
		$data['segmento'] = $this->uri->segment(3);
		$this->load->view('headers');
		if(!$data['segmento']){
			$data['cursos'] = $this->gemini_model->getCursos();	
		}else{
			$data['cursos'] = $this->gemini_model->getCurso($data['segmento']);	
		}
		
		
		$this->load->view('cursos', $data);
		
	}

	function hola_mundo(){
		$this->load->view('bienvenue');	
	}

	function formulario(){
		
		$this->load->view('headers');
		$this->load->view('formulario');	
	}

	function record_data(){
		$data = array('nombre' => $this->input->post('nombre'),
					'videos' => $this->input->post('videos')
				);
		$this->gemini_model->crearCurso($data);
		$this->load->view('headers');
		$this->load->view('bienvenue');
	}
	function editar(){
		$data['id'] = $this->uri->segment(3);
		$data['curso'] = $this->gemini_model->getCurso($data['id']);
		$this->load->view('headers');
		$this->load->view('editar', $data);
	}

	function actualizar(){
		$data = array('nombre' => $this->input->post('nombre'),
					'videos' => $this->input->post('videos'));
		$this->gemini_model->actualizarCurso($this->uri->segment(3), $data);

		$this->load->view('headers');
		$this->load->view('bienvenue');

	}
}
