<?php 
	@include_once ('../../modelo/m_conexion.php'); // se inluye dos veces por motivo ajax
	@include_once('../modelo/m_conexion.php'); // se inluye dos veces por motivo ajax
	
	
	class Modelomaestro extends bd{
		public $id,$des,$nro,$tipo,$id_com;
		public function incluir($tabla){ // funcion para incluir recibe parametro del nombre de la tabla desde el control
			$sql ="INSERT INTO $tabla(des,nro,tipo,id_com,est) VALUES('$this->des','$this->nro','$this->tipo','$this->id_com',1)";
			return parent::ejecutar($sql);
		}
		public function consulta($tabla){ // funcion para consultar(aqui solo una en este caso ojo) recibe parametro del nombre de la tabla desde el control
			 $sql ="SELECT a.id,a.id_com,a.des,a.nro,a.tipo,b.des combo,a.est FROM $tabla a INNER JOIN tmodelocombo b ON a.id_com=b.id_com";
			return parent::ejecutar($sql);
		}
		public function consulta_mod($tabla,$donde,$campo,$id){ /// funcion para consultar-modificar recibe parametro del nombre de la tabla desde el control, WHERE, el campo por donde voy a modiificar y el id del registro
			$sql ="SELECT *FROM $tabla $donde $campo=$id";
			return parent::ejecutar($sql);
		}
		public function modificar($tabla){ // funcion para modificar recibe parametro tabla desde el control
			 $sql ="UPDATE $tabla SET des='$this->des',tipo='$this->tipo',nro='$this->nro',id_com='$this->id_com' WHERE id='$this->id'";
			return parent::ejecutar($sql);
		}
	}
 ?>