<?php 
	class bd{
		public $consulta,$conexion;
		function __construct(){
			$this->conexion = mysql_connect('localhost','root','1234');
			if(mysql_select_db("feligres",$this->conexion)) return true; else die('error en la conexion');
		}
		public function ejecutar($sql){ // ejecuta la sentecias sql querys
			return $this->consulta = mysql_query($sql);
		}
		function row(){ // convertir consulta arreglo
			return mysql_fetch_array($this->consulta);
		}
		public function des_act($tabla,$campo,$est,$idcampo,$id){ // activar desactivar logico estatus tabla.
			$sql = "UPDATE $tabla SET $campo=$est WHERE $idcampo=$id";
			return self::ejecutar($sql);

		}
		
    	function crear_combo($sql,$campoid,$des,$id){ //function para crear el combo dinamico
    		$sqlv = self::ejecutar($sql);
	 		while($obj_row = $this->row($sqlv)){
        		$selected = "";
        		if($id==$obj_row[$campoid]){
            		$selected = 'selected'; 
       			}
       		 echo '<option value="'.$obj_row[$campoid].'" '.$selected.'>' . $obj_row[$des] . "</option>";
       		}
   	 	}
   	 	function validar_campo($sql){ // funcion para validar campos unicos
   	 		$valor = self::ejecutar($sql);
   	 		$obj_row = self::row($valor); 
   	 		return $obj_row['cont']; 
   	 	}
   	 	public function cambiarFecha($row,$formato){ // funcicion para transformar fecha a formato 10-01-2000 dinamica
     	 	$date =  date_create($row);
     	 	return date_format($date,$formato);
    	}
	}
 ?>