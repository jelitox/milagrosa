<?php session_start();
	unset($_SESSION['nivel']);
	unset($_SESSION['usu']);
	header('location: ../vista/v_acceso.php');
 ?>