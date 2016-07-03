<?php 
	include_once('../modelo/m_repcargo.php');
	$obj_repcargo = new Repcargo;
	$_GET['titulo']='Listado de cargos';
	$obj_repcargo->consultar($_GET['estatus'],$_GET['dato'],0);
	$obj_repcargo->reporte();
 ?>