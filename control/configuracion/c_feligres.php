<?php 
session_start();
	include_once '../../modelo/configuracion/m_feligres.php';
	$obj_modelo = new feligres;
	$tabla = 'tpersona'; //tabla de la bd
	$campoest = 'estatus'; // campo estatus de la tabla
	$idcampo = 'cedula'; // id de tabla en la bd (identificador unico o llave primaria)

	switch ($_POST['op']) {
		case 'Registrar':
			$obj_modelo->ced = $_POST['ced'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->nom = strtoupper($_POST['nom']);  // POST DEL INPUT DE LA VISTA
			$obj_modelo->ape = strtoupper($_POST['ape']); // POST DE LA VISTA INPUT(name) OJO DEBEN SER IGUALES LOS NOMBRES DE LOS ARTIBUTOS EN EL MODELO  TANTO COMO LOS DE LA VISTA
			$obj_modelo->sex = strtoupper($_POST['sex']);
			$obj_modelo->tel = $_POST['tel'];
			$obj_modelo->cor = $_POST['cor'];
			$obj_modelo->dir = strtoupper($_POST['dir']);
			$obj_modelo->eda = $_POST['eda'];
			$obj_modelo->her = $_POST['her'];
			$obj_modelo->nac = $_POST['nac'];

			$sql ="SELECT COUNT(*) as cont FROM $tabla WHERE cedula='".$_POST['ced']."'"; // sql para validar si el registro existe, EN ESTE CASO ES SOLO DEL MODELO DEBE CREARSE UNO EN CADA CONTROL DISTINTO

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
			$obj_row = $obj_modelo->row($obj_modelo->consulta_mod($tabla,'WHERE','cedula',$_POST['idreg']));
			$data = array(0 => $obj_row['cedula'], 1 => $obj_row['nombre'], 2 => $obj_row['apellido'], 3 => $obj_row['sexo'], 4 => $obj_row['telefono'], 5 => $obj_row['correo'], 6 => $obj_row['direccion'], 7 => $obj_row['edad'], 8 => $obj_row['hermanos'], 9 => $obj_row['nacimiento'] );
			echo json_encode($data);
		break;
		case 'Modificar':
			$obj_modelo->id = $_POST['idreg'];

			$obj_modelo->ced = $_POST['ced'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->nom = strtoupper($_POST['nom']);  // POST DEL INPUT DE LA VISTA strtotupper();para convertir mayus
			$obj_modelo->ape = strtoupper($_POST['ape']);
			$obj_modelo->sex = $_POST['sex'];
			$obj_modelo->tel = $_POST['tel'];
			$obj_modelo->cor = $_POST['cor'];
			$obj_modelo->dir = strtoupper($_POST['dir']);
			$obj_modelo->eda = $_POST['eda'];
			$obj_modelo->her = $_POST['her'];
			$obj_modelo->nac = $_POST['nac'];
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