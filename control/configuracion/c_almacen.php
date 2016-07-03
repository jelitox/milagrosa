<?php 
session_start();
	include_once '../../modelo/configuracion/m_almacen.php'; // incluyo clase del objeto sacramento
	$obj_modelo = new Almacen;
	$tabla = 'talmacen'; //tabla de la bd
	$campoest = 'estatus'; // campo estatus de la tabla
	$idcampo = 'idalmacen'; // id de tabla en la bd (identificador unico o llave primaria)

	switch ($_POST['op']) {
		case 'Registrar':   //strtoupper(); es para convertir a mayuscula los string, todos los datos en una bd tipo string deben llegar a mayusculas para tener un standard de datos
			$obj_modelo->nom = strtoupper($_POST['nom']);   // POST DEL INPUT DE LA VISTA
			$obj_modelo->descripcion = strtoupper($_POST['descripcion']);  // POST DEL INPUT DE LA VISTA
			//$obj_modelo->vis = strtoupper($_POST['vis']); // POST DEL INPUT DE LA VISTA
			//$obj_modelo->id_com = $_POST['combo']; // POST DEL INPUT DE LA VISTA

			$sql ="SELECT COUNT(*) as cont FROM $tabla WHERE nombre='".$_POST['nom']."'"; // sql para validar si el registro existe, EN ESTE CASO ES SOLO DEL MODELO DEBE CREARSE UNO EN CADA CONTROL DISTINTO

			if($obj_modelo->validar_campo($sql)>0){ // FUNCION PARA VALIDAR SI EL REGISTO EXISTE
				$data = array(0 => 'Error este registro ya existe'); // msj hacia la vista
			}else{
				$obj_modelo->incluir($tabla);
				$data = array(0 => 'Registrado con éxito'); // msj hacia la vista
			}
			echo json_encode($data); // hago un echo del json para que lo entienda javascript
		break;
		
		case 'Consultar':
			// los obj_row son los campos de la tabla, este se le pasa una llave en poscion 0 este sirve para en la vista llmar los id de los input desde sus posiciones para pintarlos al modificar
			$obj_row = $obj_modelo->row($obj_modelo->consulta_mod($tabla,'WHERE','idalmacen',$_POST['idreg']));
			//$fecha = $obj_modelo->cambiarfecha($obj_row['tipo'],'d-m-Y');
			$data = array(0 => $obj_row['nombre'], 1 => $obj_row['descripcion']);
			echo json_encode($data);
		break;
		case 'Modificar':
			$obj_modelo->id = $_POST['idreg'];
			$obj_modelo->nom = strtoupper($_POST['nom']);   // POST DEL INPUT DE LA VISTA
			$obj_modelo->descripcion = strtoupper($_POST['descripcion']);  // POST DEL INPUT DE LA VISTA
			//$obj_modelo->vis = strtoupper($_POST['vis']); // POST DEL INPUT DE LA VISTA
			if($obj_modelo->modificar($tabla)){
				$data = array(0 =>'Modificado con éxito');
			}else{
				$data = array(0 =>'Error al Modificar');
			}
			echo json_encode($data);
		break;
		case 'Desactivar':
			$obj_modelo->des_act($tabla,$campoest,0,$idcampo,$_POST['idreg']); // el id del registro idreg es el identificador unico que viene de la vista por cada uno de los registros  (ojo todos son diferentes)
			$_SESSION['msj'] ='Desactivado con Éxito';
			
		break;
		case 'Activar':
			$obj_modelo->des_act($tabla,$campoest,1,$idcampo,$_POST['idreg']);
			$_SESSION['msj'] ='Activado con Éxito';
		break;
	}
 ?>