<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Menu{
		private $arr_menu;
		public function __construct($arr){
			$this->arr_menu = $arr;
		}
		public function constructMenu(){
			$ret_menu = "<nav><ul>";
			foreach ($this->arr_menu as $key ) {
				# code...
				$ret_menu .= "<li>".$key."</li>";				
			}
			$ret_menu .="</ul></nav>";

			return $ret_menu;
		}
	}

?>