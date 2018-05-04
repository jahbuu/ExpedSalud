<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gemini extends CI_Controller {
	//Calls parent constructor
	function __construct(){
		parent::__construct();	
		$this->load->helper('form');
		$this->load->model('gemini_model');		
	}
	//
	function index(){
		$this->load->library('menu', array('Inicio', 'Directorio', 'Consultas'));
		$data['ml_menu'] = $this->menu->constructMenu();
		$this->load->view('headers');
		$this->load->view('bienvenue', $data);
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

	
}
