<?php session_start(); error_reporting(0);
	if(isset($_SESSION['nivel'])){
		
		if($_SESSION['nivel']){
			if(isset($_SESSION['msj'])){echo '<script>alert("'.$_SESSION['msj'].'");</script>'; unset($_SESSION['msj']);}
			if(isset($_GET['accion'])){ $op = $_GET['accion']; }else{ $op = "inicio";}
?>
<!DOCTYPE html>
<html>
<head>


	<title>Sistema milagrosa</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css//font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css//datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../css//datepicker/css/datepicker.css">

	<script type="text/javascript" src="../js/jquery.js"></script>
	<script src="../css/datatables/media/js/jquery.js"></script>
	<script src="../css/datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<script type="text/javascript" src="../js/libreria.js"></script>
	<script type="text/javascript" src="../css/datepicker/js/bootstrap-datepicker.js"></script>
	</head>
<body>

	<header>
		<img  src="../css/img/logoo.jpg" class="img-logo "/>
		<h4 class="text-logo">Parroquia Nuestra señora de la milagrosa</h4>
	</header>
	
		<div class="bienvenida-msj" id="msj-bienv"><h4>Bienvenido, <?php  if(isset($_SESSION['usu'])) echo $_SESSION['usu'];?></h4></div>
	<div class=" conten-menu fija"><?php include_once('v_menu.php');?></div>
		<?php
			//INCLUYO LA CARPETA CON LAS VISTA A CARGAR EN EL SISTEMA 
			if( is_file("configuracion/v_{$_GET['accion']}.php") ){
				include_once("configuracion/v_{$_GET['accion']}.php");
			}else if(is_file("movimientos/v_{$_GET['accion']}.php")){
				include_once("movimientos/v_{$_GET['accion']}.php");
			}else if(is_file("reportes/v_{$_GET['accion']}.php")){
				include_once("reportes/v_{$_GET['accion']}.php");
			}else if(is_file("ayuda/v_{$_GET['accion']}.php")){
				include_once("ayuda/v_{$_GET['accion']}.php");
			}else{
				include_once("v_intranet.php");
			}
		?>
		
</body>
</html>
<?php
}
	}else{
		header('location: ../vista/v_acceso.php');
	}
?>
<!-- VENTANA MODAL DE CONFIRMACION PARA SALIR DEL SISTEMA-->
<div class="modal fade" id="ventana1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--Header de la ventana-->
         	<div class="modal-header">
              <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="modal-title">¿Esta Seguro?</h3>
            </div>
            <!--Contenido de la ventana-->
            <div class="modal-body">
              <h4>¿Desea salir del sistema?</h4>
            </div>
            <!--Footer de la ventana-->
            <div class="modal-footer">
              <a href="../control/c_logout.php" class="btn btn-success" style="color:#fff; text-decoration:none;">Aceptar</a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>    
    </div> 
</div>