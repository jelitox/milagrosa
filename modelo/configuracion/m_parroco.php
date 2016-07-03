  <?php 
	@include_once ('../../modelo/m_conexion.php'); // se inluye dos veces por motivo ajax
	@include_once('../modelo/m_conexion.php'); // se inluye dos veces por motivo ajax
	
	class Parroco extends bd{
		public $idparroco,$cedula,$nombre,$apellido,$sexo,$telefono,$correo,$direccion;//,$nro,$tipo,$id_com;
		public function incluir($tabla){ // funcion para incluir recibe parametro del nombre de la tabla desde el control
		 	 $sql = "insert into tpersona(cedula,nombre,apellido,sexo,telefono,correo,direccion,estatus) 
			values ('$this->cedula','$this->nombre','$this->apellido','$this->sexo','$this->telefono','$this->correo','$this->direccion',1);";
			$this->ejecutar($sql);

		 	$sql = "insert into tparroco(cedula) values ('$this->cedula')";
		 	$this->ejecutar($sql);
		}
		public function consulta($tabla){ // funcion para consultar(aqui solo una en este caso ojo) recibe parametro del nombre de la tabla desde el control
			 $sql ="SELECT *FROM tpersona";
			return parent::ejecutar($sql);
		}
		public function consulta_mod($tabla,$donde,$campo,$id){ /// funcion para consultar-modificar recibe parametro del nombre de la tabla desde el control, WHERE, el campo por donde voy a modiificar y el id del registro
			$sql ="SELECT *FROM $tabla $donde $campo=$id";
			return parent::ejecutar($sql);
		}
		public function modificar($tabla){ // funcion para modificar recibe parametro tabla desde el control
			  $sql ="UPDATE $tabla SET cedula='$this->cedula',nombre='$this->nombre',apellido='$this->apellido',sexo='$this->sexo',telefono='$this->telefono',correo='$this->correo',direccion='$this->direccion' WHERE cedula='$this->idparroco' ";
			return parent::ejecutar($sql);
		}
	}
 ?>