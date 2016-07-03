<?php session_start();
	include_once('../modelo/m_acceso.php');
	$obj_acceso = new Acceso;
	switch ($_POST['op']) {
		case 'Entrar':
			$obj_acceso->usu =$_POST['usu'];
			$obj_acceso->consulta_usuario();
			$obj_row = $obj_acceso->row();

			if($obj_row['Usuario']==$_POST['usu'] && $obj_row['Clave']==$_POST['cla']){
				$_SESSION['nivel'] = $obj_row['Nivel'];
				$_SESSION['usu'] = $obj_row['Usuario'];
				header('location: ../vista/v_intranet.php');
			}else if($_POST['usu']==0 && $_POST['cla']==''){
				$_SESSION['msj_access'] = "Usuario y/o clave invalidos!";
				//unset($_SESSION['nivel']);
				
				header('location: ../vista/v_acceso.php');
			}else{
				$_SESSION['msj_access'] = "Usuario y/o clave invalidos!";
				header('location: ../vista/v_acceso.php');
			}
		break;
	
	}
 ?>