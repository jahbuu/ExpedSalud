<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	private $view_prefix;
	private $js_path;

	function __construct(){
		parent::__construct();	
		$this->view_prefix = "exped_salud_";
		$this->forms = "/forms/form_";
		$this->results = "/forms/results/";		
		$this->usr_dt = "";
		//Load helpers
		$this->load->helper('master_helper');
		$this->load->helper('url');
		$this->load->helper('form');

		//Load libraries
		//$this->load->library('session');

		//Load models
		$this->load->model('Master_model', '', TRUE);

		//Attributes
		$this->path = base_url();	
		$this->session->set_userdata(array('path'=>base_url()));

		//

	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	
	public function load_my_page($fnctn){
		$data = "";
		$this->load->view($this->view_prefix . 'o_head', $this->getData($fnctn));		
		$this->load->view($this->view_prefix . 'css', $this->getData($fnctn));		
		$this->load->view($this->view_prefix . 'top_menu', $this->getData($fnctn));		
		$this->load->view($this->view_prefix . 'o_body', $this->getData($fnctn));		
		$this->load->view($this->view_prefix . 'o_section', $this->getData($fnctn));		
		$this->load->view($this->view_prefix . 'left_panel', $this->getData($fnctn));
		$this->load->view($this->view_prefix . 'o_mainpanel', $this->getData($fnctn));
		$this->load->view($this->view_prefix . $fnctn, $this->getData($fnctn));
		$this->load->view($this->view_prefix . 'c_mainpanel', $this->getData($fnctn));
		$this->load->view($this->view_prefix . 'c_section', $this->getData($fnctn));
		$this->load->view($this->view_prefix . 'scripts', $this->getData($fnctn));
	}

	public function load_my_view($fnctn){
		$this->load->view($this->view_prefix . $fnctn, $this->getData($fnctn));
	}	

	public function index()
	{
		$dato['string'] = " XDD ";
		$this->load->view('welcome_message', $dato);
	}


	
	public function login(){
		$srname = $this->input->post('username');
		$post = $this->input->post('username');
		isset($post) ? $post = true : $post = false;

		if($post){			
			if($this->checkState2('login')){
				if($this->session->userdata('userdata')['role'] == 'med'){
					$this->load_my_page('agenda');
				}else{					
					$this->Master_model->setProfileData( $this->session->userdata('userdata')['id'] );
					$this->load_my_page('perfil');
				}			
			}else{
				$this->load->view($this->view_prefix . 'login', $this->getData('login',0));
			}

		}else{			
			$this->load->view($this->view_prefix . 'login', $this->getData('login',0));
		}		
	}

	public function logout(){
		$this->Master_model->closeSession();
		$this->login();
	}

	public function signin(){
		$data = "";
		$this->load->view($this->view_prefix . 'signin', $this->getData('signin'));
	}	

	public function calendar(){

		$this->load_my_view('agenda');

	}

	public function directory(){		

		$this->load_my_view('directorio');

	}

	public function profile(){
		
		if( $this->input->post('k_id') !== null ){
			$this->Master_model->setProfileData( $this->input->post('k_id') );	
			$this->Master_model->addVisit();
		}		
		$this->load_my_view('perfil');
				
	}

	//Refresh history review
	public function getHistory(){
		$data = "";
		if ( isset( $this->session->userdata('profile_data')['id'] ) ){			
			$this->load->view($this->forms . 'historial', $this->getData('historial'));					
		}else{
			//$this->directorio();
		}
	}

	//Get history from one type of form to display in a table
	public function getHistoryComplete(){
		$data = "";
		if (1){
			$this->load->view($this->results . "history", $this->getData('history'));
		}else{
			$this->directorio();
		}
	}

	public function getData($function, $post=0){
		$data = "";
		switch ($function) {
			case 'login':				
				# code...
				$username=array( 'name' => 'username', 'placeholder' => 'Username' );
				$password=array( 'name' => 'password', 'placeholder' => 'Password' );				
				$post==1 ? $message = 'Invalid username or password' : $message = "";
				$data = array(		
					'path' => $this->path,				
					'form' => array( $username, $password),					
					'message' => $message	 
				);
				
				break;
			case 'logout':
				# code...
				break;
			case 'agenda':								
				$data = array(		
					'path' => $this->path,										
				);
				# code...
				break;
			case 'directorio':			
				$results['directory'] = $this->Master_model->getDirectory();
				$pages = ceil(sizeof( $results['directory'] ) / 5);
				$recent_directory = $this->Master_model->directoryRecentViews();
				$data = array(		
					'path' => $this->path,			
					'drtr_results' => $results['directory'],
					'rcnt_results' => $recent_directory,
					'pages' => $pages
				);				
				# code...
				break;
			case 'directorio_results':			
				$results['directory'] = $this->Master_model->getDirectoryJSON();
				$pages = ceil(sizeof( $results['directory'] ) / 5);				
				$data = array(		
					'path' => $this->path,			
					'drtr_results' => $results['directory'],					
					'pages' => $pages
				);

			break;
			case 'perfil':																				
				$pid_evnts = $this->Master_model->getUserEvents( $this->session->userdata('profile_data')['id'] );
				$pid_hstry = $this->Master_model->getUserHistory( $this->session->userdata('profile_data')['id']);			
				$data = array(		
					'path' => $this->path,					
					'pid_evnts' => $pid_evnts,
					'pid_hstry' => $pid_hstry
				);								
				break;
			case 'history':				
				$form_type = $this->uri->segment(3);				
				$pid_evnts = $this->Master_model->getUserFormHistory( $this->session->userdata('profile_data')['id'] , $form_type );
				$pid_hstry = $this->Master_model->getUserHistory( $this->session->userdata('profile_data')['id']);			
				$data = array(
					'path' => $this->path,					
					'form_type' => $form_type,
					'pid_evnts' => $pid_evnts,
					'pid_hstry' => $pid_hstry
				);
				
				break;
			case 'historial':				
				$pid_evnts = $this->Master_model->getUserEvents( $this->session->userdata('profile_data')['id'] );
				$pid_hstry = $this->Master_model->getUserHistory( $this->session->userdata('profile_data')['id']);				
				$data = array(
					'path' => $this->path,					
					'pid_evnts' => $pid_evnts,
					'pid_hstry' => $pid_hstry
				);
				break;					
			default:
				# code...
				break;
		}
		return $data;
	}

	function checkState($function){
		switch ($function) {
			case 'login':								
				# code...
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);				
				
				return $this->Master_model->userLogin($data);				
				break;
			case 'logout':
				# code...
				break;
			case 'agenda':
				# code...
				break;
			case 'directorio':
				# code...
				break;
			case 'perfil':
				# code...
				break;
			default:
				# code...
				break;
		}
	}

	function getPaginationTabs($current_page, $side, $tapges){			 
		
                    





	}

	function checkState2($function){
		switch ($function) {
			case 'login':								
				# code...
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);				
				
				return $this->Master_model->userLogin2($data);				
				break;
			case 'logout':
				# code...
				break;
			case 'agenda':
				# code...
				break;
			case 'directorio':
				# code...
				break;
			case 'perfil':
				# code...
				break;
			default:
				# code...
				break;
		}
	}

	function guardar_form(){
							
		echo $this->Master_model->guardar_form( $this->input->post(), $this->session->userdata('profile_data')['id'] );
	}

	function addForm(){
		echo $this->Master_model->addForm( $this->input->post() );	
	}

	//new load_form
	function getFormLayout(){
		$values = $this->input->post();
		$values['path'] = $this->path;
		
		
		$form_name = "";
		switch($values['form_value']){
			case 'hc':
				$form_name = "historia_clinica";
				$values['type'] = 0;
				break;
			case 'ef':
				$form_name = "examen_fisico";
				$values['type'] = 0;
				break;
			case 'pca':
				$form_name = "problemas";
				$values['type'] = 0;
				break;
			case 'eg':
				$form_name = "egl_rs";
				$values['type'] = 2;
				break;
			case 'el':
				$form_name = "egl_rs";
				$values['type'] = 1;
				break;
			case 'rs':
				$form_name = "egl_rs";
				$values['type'] = 3;
				break;
		}
		if( isset($values['form_id']) && $values['form_id'] != 0 ){			
			$values['form_data'] = $this->Master_model->getFormLayout( $form_name, $values['form_id'], $this->session->userdata('profile_data')['id'], $values['type']);
			//$values['form_data'] = json_decode(json_encode($values['form_data']), True);
		}
		
			
		
		$this->load->view($this->forms . $form_name , $values);
	}

	function load_form(){
		$values = $this->input->post();
		$values['path'] = $this->path;
		
		
		$form_name = "";
		switch($values['form_value']){
			case 'hc':
				$form_name = "historia_clinica";
				$values['type'] = 0;
				break;
			case 'ef':
				$form_name = "examen_fisico";
				$values['type'] = 0;
				break;
			case 'pca':
				$form_name = "problemas";
				$values['type'] = 0;
				break;
			case 'eg':
				$form_name = "egl_rs";
				$values['type'] = 2;
				break;
			case 'el':
				$form_name = "egl_rs";
				$values['type'] = 1;
				break;
			case 'rs':
				$form_name = "egl_rs";
				$values['type'] = 3;
				break;
		}
		if( isset($values['form_id']) && $values['form_id'] != 0 ){			
			$values['form_data'] = $this->Master_model->getFormData( $form_name, $values['form_id'], $this->session->userdata('profile_data')['id'], $values['type']);
			//$values['form_data'] = json_decode(json_encode($values['form_data']), True);
		}
		
			
		
		$this->load->view($this->forms . $form_name , $values);	
	}

	function actualizar_form(){

	}

	function eliminar_form(){

	}

	function getDirectory(){
		$q = $this->input->post('q');
		$page = $this->input->post('page');
		echo json_encode($this->Master_model->getDirectoryJSON($q, $page));
		//echo json_encode($this->load->view( $this->results . 'newnew' ));
	}

	function refreshDirectory(){
		$side = $this->input->post('side');
		$orderby = $this->input->post('orderby');
		$current_page = $this->input->post('current_page');
		$tpages = $this->input->post('tpages');
		// $result['directory'] = $this->Master_model->getDirectory($current_page);
		// print_r($this->Master_model->getDirectory($current_page)); die;
		$dataView['drtr_results'] = $this->Master_model->getDirectory($current_page);

		//$result['directory'] = $this->load->view($this->results . 'directory', $dataView);
		$result['pagination'] = $this->Master_model->getPaginationTabs($current_page, $side, $tpages);
		$result['directory'] = $this->Master_model->getRefreshDirectory($dataView);
		echo json_encode($result);
		
	}

}