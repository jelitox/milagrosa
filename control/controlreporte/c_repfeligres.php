<?php 
	include_once('../../modelo/modeloreporte/m_repfeligres.php');
	$obj_repcargo = new reportefeligres;
	$_GET['titulo']='Listado de Feligreses';
	$tabla = "tpersona";
	$obj_repcargo->consultar($tabla);
	$obj_repcargo->reporte();
 ?>