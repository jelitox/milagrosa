<?php 
session_start();
	include_once '../../modelo/configuracion/m_maestro.php';
	$obj_modelo = new Modelomaestro;
	$tabla = 'tmodelo'; //tabla de la bd
	$campoest = 'est'; // campo estatus de la tabla
	$idcampo = 'id'; // id de tabla en la bd (identificador unico o llave primaria)

	switch ($_POST['op']) {
		case 'Registrar':
			$obj_modelo->des = $_POST['des'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->nro = $_POST['radiob'];  // POST DEL INPUT DE LA VISTA
			$obj_modelo->tipo = $obj_modelo->cambiarfecha($_POST['fecha'],'Y-m-d'); // POST DEL INPUT DE LA VISTA
			$obj_modelo->id_com = $_POST['combo']; // POST DEL INPUT DE LA VISTA

			$sql ="SELECT COUNT(*) as cont FROM $tabla WHERE des='".$_POST['des']."'"; // sql para validar si el registro existe, EN ESTE CASO ES SOLO DEL MODELO DEBE CREARSE UNO EN CADA CONTROL DISTINTO

			if($obj_modelo->validar_campo($sql)>0){ // FUNCION PARA VALIDAR SI EL REGISTO EXISTE
				$data = array(0 => 'Error este registro ya existe'); // msj hacia la vista
			}else{
				$obj_modelo->incluir($tabla);
				$data = array(0 => 'Registrado con éxito'); // msj hacia la vista
			}
			echo json_encode($data); // hago un echo del json para que lo entienda javascript
		break;
		
		case 'Consultar':
			// los obj_row son los campos de la tabla, este se le pasa una llave en poscion 0
			$obj_row = $obj_modelo->row($obj_modelo->consulta_mod($tabla,'WHERE','id',$_POST['idreg']));
			$fecha = $obj_modelo->cambiarfecha($obj_row['tipo'],'d-m-Y');
			$data = array(0 => $obj_row['des'], 1 => $fecha, 2 => $obj_row['nro'], 3 => $obj_row['id_com']);
			echo json_encode($data);
		break;
		case 'Modificar':
			$obj_modelo->id = $_POST['idreg'];
			$obj_modelo->des = $_POST['des'];
			$obj_modelo->tipo = $obj_modelo->cambiarfecha($_POST['fecha'],'Y-m-d');
			$obj_modelo->nro = $_POST['radiob'];
			$obj_modelo->id_com = $_POST['combo'];
			if($obj_modelo->modificar($tabla)){
				$data = array(0 =>'Modificado con éxito');
			}else{
				$data = array(0 =>'Error al Modificar');
			}
			echo json_encode($data);
		break;
		case 'Desactivar':
			$obj_modelo->des_act($tabla,$campoest,0,$idcampo,$_POST['idreg']);
			$_SESSION['msj'] ='Desactivado con Éxito';
			
		break;
		case 'Activar':
			$obj_modelo->des_act($tabla,$campoest,1,$idcampo,$_POST['idreg']);
			$_SESSION['msj'] ='Activado con Éxito';
		break;
	}
 ?>