<?php 
	include_once 'm_conexion.php';
	class Acceso extends bd{
		public $usu,$cla,$id;

		function consulta_usuario(){
			return parent::ejecutar("SELECT *FROM usuario WHERE Usuario='$this->usu'");
		}
		
		// 	function consulta_persona(){

		// 	}
	}

 ?>