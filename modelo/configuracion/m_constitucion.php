<?php 
	@include_once ('../../modelo/m_conexion.php'); // se inluye dos veces por motivo ajax
	@include_once('../modelo/m_conexion.php'); // se inluye dos veces por motivo ajax
	
	
	class Constitucion extends bd{
		public $id,$nom,$descripcion,$id_com;
		public function incluir($tabla){ // funcion para incluir recibe parametro del nombre de la tabla desde el control
			$sql ="INSERT INTO $tabla(nombre,descripcion,estatus) VALUES('$this->nom','$this->descripcion',1)";
			return parent::ejecutar($sql);
		}
		public function consulta($tabla){ // funcion para consultar(aqui solo una en este caso ojo) recibe parametro del nombre de la tabla desde el control
			 $sql ="SELECT *FROM $tabla";
			return parent::ejecutar($sql);
		}
		public function consulta_mod($tabla,$donde,$campo,$id){ /// funcion para consultar-modificar recibe parametro del nombre de la tabla desde el control, WHERE, el campo por donde voy a modiificar y el id del registro
			$sql ="SELECT *FROM $tabla $donde $campo=$id";
			return parent::ejecutar($sql);
		}
		public function modificar($tabla){ // funcion para modificar recibe parametro tabla desde el control
			 $sql ="UPDATE $tabla SET nombre='$this->nom',descripcion='$this->descripcion' WHERE idalmacen='$this->id'";
			return parent::ejecutar($sql);
		}
	}
 ?>