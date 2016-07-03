<?php 
	include_once('../../modelo/modeloreporte/m_reportesacramento.php');
	$obj_repcargo = new reportesacramento;
	$_GET['titulo']='Listado de sacramentos';
	$tabla = "tsacramento";
	$obj_repcargo->consultar($tabla);
	$obj_repcargo->reporte();
 ?>