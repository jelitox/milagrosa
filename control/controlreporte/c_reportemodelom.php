<?php 
	include_once('../../modelo/modeloreporte/m_reportemodelom.php');
	$obj_repcargo = new Reportemodelo;
	$_GET['titulo']='Listado Modelo maestro';
	$tabla = "tmodelo";
	$obj_repcargo->consultar($tabla);
	$obj_repcargo->reporte();
 ?>