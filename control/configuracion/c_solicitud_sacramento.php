<?php 
session_start();
	include_once '../../modelo/configuracion/m_solicitud_sacramento.php';
	$obj_modelo = new solicitud_sacramento;
	$tabla = 'tsolicitud_sacramento'; //tabla de la bd
	$campoest = 'estatus'; // campo estatus de la tabla
	$idcampo = 'nro_solicitud'; // id de tabla en la bd (identificador unico o llave primaria)
	$nomtabla_2 = "tbautizo"; // nombre de la tabla
	$nomtabla_3 = "tcomunion"; // nombre de la tabla
	$nomtabla_4 = "tconfirmacion"; // nombre de la tabla

	//---------------------------- Valores de la tabla solicitud_sacramento ----------------------------------------------------

	$cam1 = "fecha_hora_solicitud"; // campos de la bd solicitud_sacramento 
	$cam2 = "tipo_sacramento"; // campos de la bd solicitud_sacramento
	$cam3 = "fecha_hora_sacramento"; // campos de la bd solicitud_sacramento
	$cam4 = "parroco"; // campos de la bd solicitud_sacramento

	//--------------------------------------- Valores de la bd tabla tbautizo -------------------------------------------------

	$cam5 = "estado_civil_pare"; // campos de la bd bautizo
  	$cam6 ="estado_civil_madre";// campos de la bd bautizo
	$cam7 ="nombre_madrina";// campos de la bd bautizo
	$cam8 ="apellido_madria";// campos de la bd bautizo
	$cam9 ="nombre_padrino";// campos de la bd bautizo
	$cam10 ="apellido_padrino";//campos de la bd bautizo
	$cam11 ="cedula_nino";//campos de la bd bautizo
	$cam12 ="cedula_padre";//campos de la bd bautizo
	$cam13 ="cedula_madre";//campos de la bd bautizo
	$cam14 ="partida_nacimiento";//campos de la bd bautizo

	//---------------------------------------- Valores de la tabla tcomunion --------------------------------------------------

	$cam15 ="cedula_nino";//campos de la bd comunion
	$cam16 ="fe_bautizo";//campos de la bd comunion
	$cam17 ="cedula_padre";//campos de la bd comunion
	$cam18 ="e_civil_padre";//campos de la bd comunion
	$cam19 ="fecha_mat_civ_padre";//campos de la bd comunion
	$cam20 ="fecha_mat_igl_padre";//campos de la bd comunion
	$cam21 ="cedula_madre"; //campos de la bd comunion
	$cam22 ="e_civil_madre"; //campos de la bd comunion
	$cam23 ="fecha_mat_civ_madre"; //campos de la bd comunion
	$cam24 ="fecha_mat_igl_madre"; //campos de la bd comunion
	$cam25 ="nombre_madrina";//campos de la bd comunion
	$cam26 ="apellido_madrina";//campos de la bd comunion
	$cam27 ="nombre_padrino";//campos de la bd comunion
	$cam28 ="apellido_padrino";//campos de la bd comunion

	//-------------------------------------- Valores de la tabla tconfirmacion -----------------------------------------------


	$cam29 ="estudia_o_trabaja";//campos de la bd confirmacion
	$cam30 ="fe_bautismo";//campos de la bd confirmacion
	$cam31 ="cedula_c"; //campos de la bd confirmacion
	$cam32 ="cedula_madre"; //campos de la bd confirmacion
	$cam33 ="cedula_padre"; //campos de la bd confirmacion
	$cam34 ="nombre_madrina"; //campos de la bd confirmacion
	$cam35 ="apellido_madrina"; //campos de la bd confirmacion
	$cam36 ="nombre_padrino"; //campos de la bd confirmacion
	$cam37 ="apellido_padrino"; //campos de la bd confirmacion

	switch ($_POST['op']) {
		case 'Registrar':
			$obj_modelo->$cam1=$obj_bd->cambiarFecha($_POST[$cam1],'Y-m-d');   // POST DEL INPUT DE LA VISTA
			$obj_modelo->$cam2 = strtoupper($_POST['cam2']);  // POST DEL INPUT DE LA VISTA
			$obj_modelo->$cam3 = strtoupper($_POST['cam3']); // POST DE LA VISTA INPUT(name) OJO DEBEN SER IGUALES LOS NOMBRES DE LOS ARTIBUTOS EN EL MODELO  TANTO COMO LOS DE LA VISTA
			$obj_modelo->$cam4 = strtoupper($_POST['cam4']);
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