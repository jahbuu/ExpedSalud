<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdropzone extends CI_Controller {
	private $path;

	function __construct(){
		parent::__construct();	
		$this->view_prefix = "exped_salud_";

		//Load helpers
		$this->load->helper(array('url','html','form'));

		//Attributes
		$this->path = base_url();		
	}
	
	public function upload() {
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$fileName = $_FILES['file']['name'];
			$patientid = $_POST['hidden_dz1'];
			
			$targetPath = getcwd() . '/temporary_user_files/' . $patientid . "/";			
			if( !is_dir($targetPath) ){
				mkdir($targetPath);
			}
			$fileName = time() . "---" . $fileName;
			$targetFile = $targetPath . $fileName ;			
			move_uploaded_file($tempFile, $targetFile);

			//print_r($_POST);die;
			// if you want to save in db,where here
			// with out model just for example
			// $this->load->database(); // load database
			// $this->db->insert('file_table',array('file_name' => $fileName));
		}
    }
}