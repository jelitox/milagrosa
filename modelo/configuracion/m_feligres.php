<?php 
	@include_once ('../../modelo/m_conexion.php'); // se inluye dos veces por motivo ajax
	@include_once('../modelo/m_conexion.php'); // se inluye dos veces por motivo ajax
	
	
	class feligres extends bd{
		public $id,$ced,$nom,$ape,$sex,$tel,$cor,$dir,$eda,$her,$nac; // propiedades para llamar en el controlador
		public function incluir($tabla){ // funcion para incluir recibe parametro del nombre de la tabla desde el control
			 $sql ="INSERT INTO $tabla(cedula,nombre,apellido,sexo,telefono,correo,direccion,edad,hermanos,nacimiento,estatus) VALUES('$this->ced','$this->nom','$this->ape','$this->sex','$this->tel','$this->cor','$this->dir','$this->eda','$this->her','$this->nac',1)";
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
			 $sql ="UPDATE $tabla SET cedula='$this->ced',nombre='$this->nom',apellido='$this->ape',sexo='$this->sex',telefono='$this->tel',correo='$this->cor',direccion='$this->dir',edad='$this->eda',hermanos='$this->her',nacimiento='$this->nac' WHERE cedula='$this->id'";
			return parent::ejecutar($sql);
		}
	}
 ?>