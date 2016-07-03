 <?php 
 	@session_start();
	include_once '../../modelo/configuracion/m_parroco.php';
	$obj_modelo = new Parroco;
	$tabla = 'tpersona'; //tabla de la bd
	$campoest = 'estatus'; // campo estatus de la tabla
	$idcampo = 'cedula'; // id de tabla en la bd (identificador unico o llave primaria)

	switch ($_POST['op']) {
		case 'Registrar':
			$obj_modelo->cedula = $_POST['cedula'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->nombre = $_POST['nombre'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->apellido = $_POST['apellido'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->sexo = $_POST['sexo'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->telefono = $_POST['telefono'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->correo = $_POST['correo'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->direccion = $_POST['direccion'];   // POST DEL INPUT DE LA VISTA
			//$obj_modelo->nro = $_POST['radiob'];  // POST DEL INPUT DE LA VISTA
			//$obj_modelo->tipo = $obj_modelo->cambiarfecha($_POST['fecha'],'Y-m-d'); // POST DEL INPUT DE LA VISTA
			//$obj_modelo->id_com = $_POST['combo']; // POST DEL INPUT DE LA VISTA

			$sql ="SELECT COUNT(*) as cont FROM $tabla WHERE cedula='".$_POST['cedula']."'"; // sql para validar si el registro existe, EN ESTE CASO ES SOLO DEL MODELO DEBE CREARSE UNO EN CADA CONTROL DISTINTO

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
			//$fecha = $obj_modelo->cambiarfecha($obj_row['tipo'],'d-m-Y');
			//$data = array(0 => $obj_row['cedula']);
			$data = array(0 => $obj_row['cedula'], 1 => $obj_row['nombre'], 2 => $obj_row['apellido'], 3 => $obj_row['sexo'], 4 => $obj_row['telefono'], 5 => $obj_row['correo'], 6 => $obj_row['direccion']);
			echo json_encode($data);
		break;
		case 'Modificar':
			$obj_modelo->idparroco = $_POST['idreg'];
			$obj_modelo->cedula = $_POST['cedula'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->nombre = $_POST['nombre'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->apellido = $_POST['apellido'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->sexo = $_POST['sexo'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->telefono = $_POST['telefono'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->correo = $_POST['correo'];   // POST DEL INPUT DE LA VISTA
			$obj_modelo->direccion = $_POST['direccion'];   // POST DEL INPUT DE LA VISTA
			//$obj_modelo->tipo = $obj_modelo->cambiarfecha($_POST['fecha'],'Y-m-d');
			//$obj_modelo->nro = $_POST['radiob'];
			//$obj_modelo->id_com = $_POST['combo'];
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