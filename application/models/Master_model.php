<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model{
	function __construct(){
		parent::__construct();
		//$this->load->database();
	}

	function userLogin($data){
		$where = array(
			'email' => $data['username'],
			'password' => $data['password']
		);
		$this->db->where( $where );
		$query = $this->db->get('personas');
		if($query->num_rows() == 1){
				return true;
			}else{
				return false;
			}
	}

	function setProfileData($profile_id){
		$this->session->set_userdata(array('profile_id' => $profile_id));
		$where = array(
			'id' => $profile_id			
		);
		$this->db->where( $where );
		$query = $this->db->get('personas');
		$qresults = $this->getQueryResultsOnArray($query)[0];

		//Basic data
		$userdata = array(
			'id' => $qresults->id,
			'email' => $qresults->email,
			'cedula' => $qresults->cedula,
			'nombre' => $qresults->nombre,
			'apellido' => $qresults->apellido,
			'apellido_2' => $qresults->apellido_2,
			'nacionalidad' => $qresults->nacionalidad,
			'fecha_nacimiento' => $qresults->fecha_nacimiento,
			'username' => $qresults->username,
			'categoria' => $qresults->id,
			'sexo' => $qresults->sexo,
			'estado_civil' => $qresults->estado_civil,
			'ingreso' => $qresults->ingreso,
			'departamento' => $qresults->departamento,
			'empresa' => $qresults->empresa,
			'trabajos_adicionales' => $qresults->trabajos_adicionales,
			'role' => $qresults->role,
		);
		//Phone number
		$where = array(
			'id' => $profile_id		
		);
		$this->db->where( $where );
		$query = $this->db->get('directorio_telefonico');
		$qresults = $this->getQueryResultsOnArray($query)[0];

		$userdata['telefono'] = $qresults->numero;

		//Empresa
		$where = array(
			'id' => $userdata['empresa']		
		);
		$this->db->where( $where );
		$query = $this->db->get('empresas');
		$qresults = $this->getQueryResultsOnArray($query)[0];

		$userdata['empresa'] = $qresults->nombre;

		//Departamento
		$where = array(
			'id' => $userdata['departamento']		
		);
		$this->db->where( $where );
		$query = $this->db->get('departamentos');
		$qresults = $this->getQueryResultsOnArray($query)[0];

		$userdata['departamento'] = $qresults->nombre;

		//Save_data
		$this->session->set_userdata(array('profile_data'=>$userdata));		
	}

	function userLogin2($data){
		$where = array(
			'email' => $data['username'],
			'password' => $data['password']
		);
		$this->db->where( $where );
		$query = $this->db->get('personas');
		$qresults = $this->getQueryResultsOnArray($query)[0];				
		$userdata = array(
			'id' => $qresults->id,
			'email' => $qresults->email,
			'cedula' => $qresults->cedula,
			'nombre' => $qresults->nombre,
			'apellido' => $qresults->apellido,
			'apellido_2' => $qresults->apellido_2,
			'nacionalidad' => $qresults->nacionalidad,
			'fecha_nacimiento' => $qresults->fecha_nacimiento,
			'username' => $qresults->username,
			'categoria' => $qresults->id,
			'sexo' => $qresults->sexo,
			'estado_civil' => $qresults->estado_civil,
			'ingreso' => $qresults->ingreso,
			'departamento' => $qresults->departamento,
			'trabajos_adicionales' => $qresults->trabajos_adicionales,
			'role' => $qresults->role,
			'titulo' => $qresults->titulo
		);
		

		$this->session->set_userdata(array('userdata'=>$userdata));		

		if($query->num_rows() == 1){
				return true;
			}else{
				return false;
			}
	}

	function getUserRole($username){
		echo $username;
		$where = array(
			'email' => $username
		);
		$this->db->where( $where );
		$query = $this->db->get('personas');
		$qresults = $this->getQueryResultsOnArray($query);		
		foreach ($qresults as $result) {
			$role = $result->role;
		}		
		return $role;
	}
	function getUserID($username){
		echo $username;
		$where = array(
			'email' => $username
		);
		$this->db->where( $where );
		$query = $this->db->get('personas');
		$qresults = $this->getQueryResultsOnArray($query);		
		foreach ($qresults as $result) {
			$id = $result->id;
		}		
		return $id;	
	}

	function closeSession(){
		$this->session->sess_destroy();
	}

	function getQueryResultsOnArray($query){
		if($query->num_rows() > 0){
				
			$size = sizeof($query->result());
			$index = 0 + $size - 1;
			while ( $index != -1){
			    $array_result[] = $query->result()[$index];
			    $index = $index - 1;
			}				
			return $array_result;
		}else{
			return false;
		}
	}

	function getDirectoryJSON($q, $page){

		$where = Array(
			'personas.role' => 'pac'
		);

		$select = ' *, concat(personas.apellido, ", ", personas.nombre) as text ';
		$from = ' FROM personas ';
		$where = ' role = "pac" ';


		if($q != ''){
			$where .= ' and ( nombre like "%'.$q.'%" OR apellido like  "%'.$q.'%" or apellido_2 like  "%'.$q.'%"  ) ';
		}		

		//$order_by = ' personas.apellido, personas.apellido_2, personas.nombre DESC ';
        
		//$sql = $select . $from . $where . $order_by;

		//echo $q . $sql;die;

		//$query = $this->db->query($sql, array('"'.$q.'"', '"'.$q.'"', '"'.$q.'"'));		

		//----------------------------
		$this->db->select($select);
		$this->db->from('personas');
		$this->db->where( $where );
		$this->db->order_by('personas.apellido', 'desc');
		
		$query = $this->db->get();
		//print_r($query);

		/*$tpages = sizeof($query);

		$pages = ceil(sizeof( $tpages ) / 5);


		//---------------------------


		$this->db->select('*, concat(personas.nombre, " ", personas.apellido) as text, personas.nombre as pnombre, ocupacion.nombre as ocupacion, directorio_telefonico.numero as telefono, empresas.nombre as empresa, role');
		$this->db->from('personas');
		$this->db->join('ocupacion', 'ocupacion.id_persona = personas.id', 'inner');
		$this->db->join('domicilio', 'domicilio.id_persona = personas.id', 'inner');
		$this->db->join('empresas', 'empresas.id = personas.empresa', 'inner');
		$this->db->join('directorio_telefonico', 'directorio_telefonico.id_persona = personas.id', 'inner');				

		$where = Array(
			'personas.role' => 'pac'
		);
		$this->db->where( $where );
        
		$this->db->order_by("personas.apellido", "ASC");
		

		//$this->db->limit( ($page - 1) * 5, ($page - 1) * 5 + 5);
		$this->db->limit( 5, ($page - 1) * 5 );

		$query = $this->db->get();		

		$results = $this->getQueryResultsOnArray($query);

		*/

		if( $query->num_rows() >= 1){
			$results = $this->getQueryResultsOnArray($query);

			foreach ($results as $res) {
				$result[] = json_decode(json_encode($res), TRUE);
			}

			$result['results'] = $result;	
		}else{
			$result['results'] = array('id' => -1, 'text' => 'No se encontraron resultados');

		}

		

		return $result		;
	}

	function getDirectory($init=0){
		$this->db->select('*, personas.nombre as pnombre, ocupacion.nombre as ocupacion, directorio_telefonico.numero as telefono, empresas.nombre as empresa, role');
		$this->db->from('personas');
		$this->db->join('ocupacion', 'ocupacion.id_persona = personas.id', 'inner');
		$this->db->join('domicilio', 'domicilio.id_persona = personas.id', 'inner');
		$this->db->join('empresas', 'empresas.id = personas.empresa', 'inner');
		$this->db->join('directorio_telefonico', 'directorio_telefonico.id_persona = personas.id', 'inner');
		
		

		$where = Array(
			'personas.role' => 'pac'
		);
		$this->db->where( $where );
        
		$this->db->order_by("personas.apellido, personas.apellido_2, pnombre", "DESC");

		if($init!=0){
			$this->db->limit(5, ($init - 1) * 5);	
		}
		

		$query = $this->db->get();	
		// echo $query->num_rows();die;	
		return $this->getQueryResultsOnArray($query);					
	}

	function getUserData($id){		
		$where = Array(
			'personas.id' => $id			
		);
		$this->db->where( $where );

		$this->db->select('*, personas.nombre as pnombre, ocupacion.nombre as ocupacion, directorio_telefonico.numero as telefono, empresas.nombre as empresa, role');
		$this->db->from('personas');
		$this->db->join('ocupacion', 'ocupacion.id_persona = personas.id', 'inner');
		$this->db->join('domicilio', 'domicilio.id_persona = personas.id', 'inner');
		$this->db->join('empresas', 'empresas.id = personas.empresa', 'inner');
		$this->db->join('directorio_telefonico', 'directorio_telefonico.id_persona = personas.id', 'inner');
		$query = $this->db->get();
		
		return $this->getQueryResultsOnArray($query);
	}

	function getUserDataByUsername($username){
		$where = Array(
			'email' => $username			
		);
		$this->db->where( $where );

		$this->db->select('*, personas.nombre as pnombre, ocupacion.nombre as ocupacion, directorio_telefonico.numero as telefono, empresas.nombre as empresa, role');
		$this->db->from('personas');
		$this->db->join('ocupacion', 'ocupacion.id_persona = personas.id', 'inner');
		$this->db->join('domicilio', 'domicilio.id_persona = personas.id', 'inner');
		$this->db->join('empresas', 'empresas.id = personas.empresa', 'inner');
		$this->db->join('directorio_telefonico', 'directorio_telefonico.id_persona = personas.id', 'inner');
		$query = $this->db->get();
		
		return $this->getQueryResultsOnArray($query);
	}

	function getUserEvents($id){
		$where = Array(
			'personas.id' => $id			
		);
		$this->db->where( $where );
		$this->db->select( "*, consultas.id as cid, consultas.id_persona as pid, consultas.tipo_form, consultas.id_form, consultas.fecha" );
		$this->db->join('consultas', 'personas.id = consultas.id_persona', 'inner');
		$query = $this->db->get('personas');

		return $this->getQueryResultsOnArray($query);		 
		
	}

	function getUserFormHistory($pid, $formtype){
		//echo $pid; echo $formtype; die;	

		$table_ = 'form_';
		switch ($formtype) {
			case 'hc':
				$table_ .= "historia_clinica";
				break;
			case 'ef':
				$table_ .= "examen_fisico";
				break;
			case 'pca':
				$table_ .= "problemas";
				break;
			case 'eg':
				$type = 2;
				$table_ .= "examenes";
				break;
			case 'el':
				$type = 1;
				$table_ .= "examenes";
				break;
			case 'rs':
				$type = 3;				
				$table_ .= "examenes";
				break;						
		}

		$where = Array(
			'id_persona' => $pid		
		);
		if (isset($type)){
			$where['tipo'] = $type;
		}



		$this->db->where( $where );

		$this->db->join( 'personas', 'personas.id = ' . $table_ . '.id_medico', 'inner' );

		$this->db->select($table_.'.*, personas.nombre as mnombre, personas.apellido as mapellido');

		if( $table_ == 'form_problemas'){
			$this->db->group_by("fecha");			
		}

		$this->db->order_by("fecha", "asc");

		$query = $this->db->get($table_);

		return $this->getQueryResultsOnArray($query);	


	}

	function getUserHistory($id){		
		$result = "";
		$temp = "";
		$count = 0;
		//Historia clinica
		$where = Array(
			'id_persona' => $id			
		);
		$this->db->where( $where );
		$this->db->order_by("fecha_modificado", "desc");
		$query = $this->db->get('form_historia_clinica');		
		foreach( $query->result() as $row ){
			$count = $count + 1;						
			$result['hc_d'] = date( 'd-M-Y', strtotime( $row->fecha_modificado ) );
			$result['hc_id'] = $row->id;
		}
		$result['hc_m'] = $count;		
		$count=0;		

		//Examen Fisico
		$where = Array(
			'id_persona' => $id			
		);
		$this->db->where( $where );
		$this->db->order_by("fecha_modificado", "desc");
		$query = $this->db->get('form_examen_fisico');
		foreach( $query->result() as $row ){
			$count = $count + 1;
			$result['ef_d'] = date( 'd-M-Y', strtotime( $row->fecha_modificado ) );
			$result['ef_id'] = $row->id;
		}
		$result['ef_m'] = $count;
		$count=0;

		//Problemas
		$where = Array(
			'id_persona' => $id			
		);
		$this->db->where( $where );
		$this->db->order_by("fecha_modificado", "desc");
		$query = $this->db->get('form_problemas');
		foreach( $query->result() as $row ){
			$count = $count + 1;
			$result['pca_d'] = date( 'd-M-Y', strtotime( $row->fecha_modificado ) );
			$result['pca_id'] = $row->id;
		}
		$result['pca_m'] = $count;
		$count=0;		

		//Examen de Laboratorio
		$where = Array(
			'id_persona' => $id,
			'tipo' => 1
		);
		$this->db->where( $where );
		$this->db->order_by("fecha", "desc");
		$this->db->group_by("fecha");
		$query = $this->db->get('form_examenes');		
		foreach( $query->result() as $row ){
			$count = $count + 1;
			$result['el_d'] = date( 'd-M-Y', strtotime( $row->fecha_modificado ) );
			$result['el_id'] = $row->id;
		}
		$result['el_m'] = $count;
		$count=0;

		//Examen de Gabinete
		$where = Array(
			'id_persona' => $id,
			'tipo' => 2
		);
		$this->db->where( $where );
		$this->db->order_by("fecha_modificado", "desc");
		$query = $this->db->get('form_examenes');
		foreach( $query->result() as $row ){
			$count = $count + 1;
			$result['eg_d'] = date( 'd-M-Y', strtotime( $row->fecha_modificado ) );
			$result['eg_id'] = $row->id;
		}
		$result['eg_m'] = $count;
		$count=0;

		//Referencias
		$where = Array(
			'id_persona' => $id,
			'tipo' => 3
		);
		$this->db->where( $where );
		$this->db->order_by("fecha_modificado", "desc");
		$query = $this->db->get('form_examenes');		
		foreach( $query->result() as $row ){
			$count = $count + 1;
			$result['rs_d'] = date( 'd-M-Y', strtotime( $row->fecha_modificado ) );
			$result['rs_id'] = $row->id;
		}
		$result['rs_m'] = $count;
		$count=0;

		return $result;

	}

	function getFromDB( $table = "", $select_clause = "" ){

	}

	function addForm( $data, $pid ){			
		switch ($data['formtype']){
			//Historia clinica			
			case 1:							
				if ($this->db->insert('form_historia_clinica', array(
					'ahf'=>$data['hc_01'],
					'pnp_tabaquismo'=>$data['hc_02'],
					'pnp_etilismo'=>$data['hc_03'],
					'app_medicos' => $data['hc_04'],
					'app_traumaticos' => $data['hc_05'],
					'app_quirurjicos' => $data['hc_06'],
					'alergia_medicamentos' => $data['hc_07'],
					'ago' => $data['hc_08'],
					'id_persona' => $pid,
					'id_medico' => $this->session->userdata('userdata')['id'],
					'id_modificado' => $this->session->userdata('userdata')['id']

				))){
					//
				}else{
					//
				}
				break;
			//Examen fisico
			case 2:
				$this->db->insert('form_examen_fisico', array(
					'presion_arterial'=>$data['ef_01'],
					'frecuencia_cardiaca'=>$data['ef_02'],
					'frecuencia_respiratoria'=>$data['ef_03'],
					'peso' => $data['ef_04'],
					'talla' => $data['ef_05'],
					'temperatura' => $data['ef_06'],
					'apariencia' => $data['ef_06'],
					'cabeza' => $data['ef_08'],
					'ojos' => $data['ef_09'],
					'ORL' => $data['ef_10'],
					'cardiopulmonar' => $data['ef_11'],
					'abdomen' => $data['ef_12'],
					'extremidades' => $data['ef_13'],
					'osteomuscular' => $data['ef_14'],
					'SNC' => $data['ef_15'],
					'genitales' => $data['ef_16'],
					'piel' => $data['ef_17'],
					'id_persona' => $pid,
					'id_medico' => $this->session->userdata('userdata')['id'],
					'id_modificado' => $this->session->userdata('userdata')['id']

				));
				break;
			//Problemas
			case 3:				
				if( $data['pc_count'] >= 1 ){					
					for ($i = 1; $i <= $data['pc_count']; $i++) {
						if ($data['pc'.$i.'_02'] != "")
					    $this->db->insert('form_problemas', array(
							'fecha_diagnostico'=>date( 'Y-m-d', strtotime( $data['pc'.$i.'_01'] ) ),
							'descripcion'=>$data['pc'.$i.'_02'],
							'fecha_resolucion'=>date( 'Y-m-d', strtotime( $data['pc'.$i.'_03'] ) ),
							'id_persona' => $pid,
							'tipo' => 0,							
							'id_medico' => $this->session->userdata('userdata')['id'],
							'id_modificado' => $this->session->userdata('userdata')['id']
						));
					}				
				}

				if( $data['pa_count'] >= 1 ){					
					for ($i = 1; $i <= $data['pa_count']; $i++) {
						if ($data['pa'.$i.'_02'] != "")
					    $this->db->insert('form_problemas', array(
							'fecha_diagnostico'=>date( 'Y-m-d', strtotime( $data['pa'.$i.'_01'] ) ),
							'descripcion'=>$data['pa'.$i.'_02'],
							'fecha_resolucion'=>date( 'Y-m-d', strtotime( $data['pa'.$i.'_03'] ) ),					
							'id_persona' => $pid,
							'tipo' => 1,
							'id_medico' => $this->session->userdata('userdata')['id'],
							'id_modificado' => $this->session->userdata('userdata')['id']
						));
					}					
				}
				break;
			//Examenes de laboratorio
			case 4:

				if( $data['radio'] == 2){				
					$thefilename="";
					$temporaryPath = getcwd() . '/temporary_user_files/' . $pid . "/";
					$targetPath = getcwd() . '/user_files/' . $pid . "/";

					if( !is_dir($targetPath) ){
						mkdir($targetPath);
					}

					$targetPath = getcwd() . '/user_files/' . $pid . "/el/";				
					if( !is_dir($targetPath) ){
						mkdir($targetPath);
					}

					if ( is_dir($temporaryPath)  ){
						if ( $this->is_dir_empty($temporaryPath) ){
							//Exist and is empty						
						}else{
							//Existe and have file
							//Move files to the right folder
							$all_files = scandir($temporaryPath);
							foreach ($all_files as $file) {							
								if( $file != "." || $file != ".."){
									$thefilename = $file;
									copy( $temporaryPath . $file, $targetPath . $file);
									unlink($temporaryPath . $file); // delete file
								}
							}
							rmdir($temporaryPath);

						}
					}

					$this->db->insert('form_examenes', array(						
						'enlace'=>$thefilename,					
						'tipo'=> 1, // 1 -> el
						'id_persona' => $pid,
						'id_medico' => $this->session->userdata('userdata')['id'],
						'id_modificado' => $this->session->userdata('userdata')['id']
					));
				}else if( $data['radio'] == 1){
					$this->db->insert('form_examenes', array(						
						'descripcion'=>$data['el_01'],					
						'tipo'=> 1, //1 -> el
						'id_persona' => $pid,
						'id_medico' => $this->session->userdata('userdata')['id'],
					'id_modificado' => $this->session->userdata('userdata')['id']
					));
				}

				

				
				
				break;
			case 5:				
				if( $data['radio'] == 2){				
					$thefilename="";
					$temporaryPath = getcwd() . '/temporary_user_files/' . $pid . "/";
					$targetPath = getcwd() . '/user_files/' . $pid . "/";

					if( !is_dir($targetPath) ){
						mkdir($targetPath);
					}

					$targetPath = getcwd() . '/user_files/' . $pid . "/eg/";				
					if( !is_dir($targetPath) ){
						mkdir($targetPath);
					}

					if ( is_dir($temporaryPath)  ){
						if ( $this->is_dir_empty($temporaryPath) ){
							//Exist and is empty						
						}else{
							//Existe and have file
							//Move files to the right folder
							$all_files = scandir($temporaryPath);
							foreach ($all_files as $file) {							
								if( $file != "." || $file != ".."){
									$thefilename = $file;
									copy( $temporaryPath . $file, $targetPath . $file);
									unlink($temporaryPath . $file); // delete file
								}
							}
							rmdir($temporaryPath);

						}
					}

					$this->db->insert('form_examenes', array(						
						'enlace'=>$thefilename,					
						'tipo'=> 2, // 2 -> eg
						'id_persona' => $pid
					));
				}else if( $data['radio'] == 1){
					$this->db->insert('form_examenes', array(						
						'descripcion'=>$data['eg_01'],					
						'tipo'=> 2, //2 -> eg
						'id_persona' => $pid
					));
				}
				break;

			case 6:				
				if( $data['radio'] == 2){				
					$thefilename="";
					$temporaryPath = getcwd() . '/temporary_user_files/' . $pid . "/";
					$targetPath = getcwd() . '/user_files/' . $pid . "/";

					if( !is_dir($targetPath) ){
						mkdir($targetPath);
					}

					$targetPath = getcwd() . '/user_files/' . $pid . "/rs/";				
					if( !is_dir($targetPath) ){
						mkdir($targetPath);
					}

					if ( is_dir($temporaryPath)  ){
						if ( $this->is_dir_empty($temporaryPath) ){
							//Exist and is empty						
						}else{
							//Existe and have file
							//Move files to the right folder
							$all_files = scandir($temporaryPath);
							foreach ($all_files as $file) {							
								if( $file != "." || $file != ".."){
									$thefilename = $file;
									copy( $temporaryPath . $file, $targetPath . $file);
									unlink($temporaryPath . $file); // delete file
								}
							}
							rmdir($temporaryPath);

						}
					}

					$this->db->insert('form_examenes', array(						
						'enlace'=>$thefilename,					
						'tipo'=> 3, // 2 -> rs
						'id_persona' => $pid
					));
				}else if( $data['radio'] == 1){
					$this->db->insert('form_examenes', array(						
						'descripcion'=>$data['rs_01'],					
						'tipo'=> 3, //3 -> rs
						'id_persona' => $pid
					));
				}
				break;

				


		}
	}

	function getFormData($form_name, $formid, $pid, $type){
		$table="";		
		$where = Array(
			'id' => $formid,
			'id_persona' => $pid
		);
		if ( $form_name == "egl_rs" ){			
			$form_name = "examenes";
			$where['tipo'] = $type;
		}
		$this->db->where( $where );		



		
		$query = $this->db->get('form_'.$form_name);

		$result='';
		foreach( $query->result() as $row ){
			$result = $row;
		}

		$result = json_decode(json_encode($result), True);

		

		if( $form_name == "problemas"){

			$where = Array(
				'fecha' => $result['fecha']
			);
			$result='';
			$this->db->where( $where );
			$query = $this->db->get('form_'.$form_name);
			foreach( $query->result() as $row ){
				$result[] = $row;
			}
		}
		$result = json_decode(json_encode($result), True);		
		return $result;
	}

	function is_dir_empty($dir) {
	  if (!is_readable($dir)) return NULL;
	  $handle = opendir($dir);
	  while (false !== ($entry = readdir($handle))) {
	    if ($entry != "." && $entry != "..") {
	      return FALSE;
	    }
	  }
	  return TRUE;
	}

	function guardar_form($post_data, $pid){

		if( isset($post_data['formtype']) ){						
			$this->addForm($post_data, $pid);
		}else{
			//echo error
		}		
	}

	function get_history_form(){
		
	}

	function getPaginationTabs($current_page, $side, $tpages){

		$actual_page = $current_page;
        $prev_page = $actual_page - 1;
        $next_page = $actual_page + 1;                    
        $alas_page = -1;                    
        if ( is_integer(intval($side)) == true ){
        	
            $direct_page  = $side;
        }else{
            $direct_page  = -1;
        }

        $pagination_tabs = "";        



        $pagination_wrapper ='<ul class="directory-pagination pagination pagination-split pagination-sm pagination-contact">';
        $pagination_wrapper_closing ='</ul>';
        $pagination_tabs_prev_btn = '<li class="btn-pagination-back"><a href="javascript:refresh_directorio(\'-2\');"><i class="fa fa-angle-left"></i></a></li>';
        $pagination_tabs_next_btn = '<li class="btn-pagination-next"><a href="javascript:refresh_directorio(-1);"><i class="fa fa-angle-right"></i></a></li>';
        $pagination_tabs_pages = '<li class="hidden pagination-pages">'.$tpages.'</li>';



        switch(intval($side)){
            case -2:
                if($prev_page <= 1){
                  	$pagination_tabs_prev_btn = '<li class="disabled btn-pagination-back"><a href="#"><i class="fa fa-angle-left"></i></a></li>';
                }
                $new_page = $prev_page;            
                
            break;

            case -1:
            if( $next_page >= $tpages){
            	$pagination_tabs_next_btn = '<li class="disabled btn-pagination-next"><a href="#"><i class="fa fa-angle-right"></i></a></li>';
                }
                $new_page = $next_page;                           
                
            break;
            default:
            	$new_page = $direct_page;
            	
            break;
        }

        if( $tpages > 5){
        	switch($new_page){
        		case 1:
	        		$i = 1;
	        		$t_tabpages = 5;
        		break;
        		case 2:
        			$i = 1;
        			$t_tabpages = 5;
        		break;
        		case $tpages:
        			$i = $tpages - 4;
        			$t_tabpages = $tpages;
        		break;
        		case $tpages -1:
        			 $i = $tpages - 4;	
        			 $t_tabpages = $tpages;
        		break;
        		default:
        			$i = $new_page - 2;
        			$t_tabpages = $new_page + 2;
        		break;
        	}
        }else{
        	$i = 1;
        	$t_tabpages = $tpages;
        }

        
        $pagination_tabs_content = "";
        	for ($i; $i <= $t_tabpages ; $i++) {
    			$pagination_tabs_content .= '<li class="';
    			if( $i == $new_page ){
    				$pagination_tabs_content .= 'active';
    			}
    			$pagination_tabs_content .= '"><a href="javascript:refresh_directorio(\''.$i.'\');">'.$i.'</a></li>';
			}

			$pagination_hidden_val = '<li class="hidden pagination-pages">'.$tpages.'</li>';
			return $pagination_wrapper . $pagination_tabs_prev_btn . $pagination_tabs_content . $pagination_tabs_next_btn . $pagination_hidden_val . $pagination_wrapper_closing;
	}

	function getRefreshDirectory($data){
		$directory_html = '';
		//print_r($data);die;
		foreach ($data['drtr_results'] as $result){
		 	$directory_html .= '<a href="#" onclick="go_to_perfil('. $result->id .');" class="list-group-item">';
                            $directory_html .='<div class="media">';
                                $directory_html .='<div class="pull-left">';
                                    $directory_html .='<img class="img-circle img-online" src="'. $this->session->userdata('path') . 'images/photos/user1.png" alt="...">';
                                $directory_html .='</div>';
                                $directory_html .='<div class="media-body">';
                                    $directory_html .='<h4 class="media-heading">'.$result->apellido . ' ' . $result->apellido_2 . ', ' . $result->pnombre . '<small>'.$result->ocupacion.'</small></h4>';
                                    $directory_html .='<div class="media-content">';
                                        $directory_html .='<i class="fa fa-map-marker"></i> '. $result->direccion;
                                        $directory_html .='<ul class="list-unstyled">';
                                            $directory_html .='<li><i class="fa fa-skype"></i> '. $result->username.' </li>';
                                            $directory_html .='<li><i class="fa fa-mobile"></i> '. $result->telefono.' </li>';
                                            $directory_html .='<li><i class="fa fa-envelope-o"></i> '. $result->email.' </li>';
                                        $directory_html .='</ul>';
                                    $directory_html .='</div>';
                                $directory_html .='</div>';
                            $directory_html .='</div><!-- media -->';
                        $directory_html .='</a><!-- list-group -->';
		}
		return $directory_html;
	}

	//directory
	function addVisit(){
		if ($this->db->insert('directory_recent_search', array(
					'id_patient'=>$this->session->userdata('profile_data')['id'] ,
					'id_user'=>$this->session->userdata('userdata')['id']					

				))){ }		
	}

	function directoryRecentViews(){
		$where = Array(
			'directory_recent_search.id_user' => $this->session->userdata('userdata')['id']
		);

		$select = ' max(date) as 2date, nombre, apellido, apellido_2, cedula, p.id ';
		$from = 'directory_recent_search';
		$join = ' INNER JOIN personas ON drs.id_patient = p.id  ';
		$where  = ' id_user = ' . $this->session->userdata('userdata')['id'] . ' ';

		$this->db->select($select);
		$this->db->from('directory_recent_search as drs');
		$this->db->join('personas as p', 'drs.id_patient = p.id');
		$this->db->where( $where );
		$this->db->order_by('2date', 'desc');
		$this->db->group_by('p.id');
		$this->db->limit(5);
		
		$query = $this->db->get();

		if( $query->num_rows() >= 1){
			$results = $this->getQueryResultsOnArray($query);

			foreach ($results as $res) {
				$result[] = json_decode(json_encode($res), TRUE);
			}

			//$result['results'] = $result;	
			return $result;
		}
		return array();
		//This code refreshes the recent contacts on the directory
		$html_recent_views = '';
		foreach ($result['results'] as $res) {
			$html_recent_views .= '<a href="#" class="list-group-item">';
                    $html_recent_views .= '<div class="media">';
                        $html_recent_views .= '<div class="pull-left">';
                            $html_recent_views .= '<img class="img-circle img-offline" src="'.$this->session->userdata('path').'images/photos/user4.png" alt="...">';
                        $html_recent_views .= '</div>';
                        $html_recent_views .= '<div class="media-body">';
                            $html_recent_views .= '<h4 class="media-heading">'.$result['apellido'] . ', ' . $result['nombre'] . '</h4>';
                            $html_recent_views .= '<small>'.$result['cedula'].'</small>';
                        $html_recent_views .= '</div>';
                    $html_recent_views .= '</div><!-- media -->';
                $html_recent_views .= '</a><!-- list-group -->';
		}
	}

	
}

?>