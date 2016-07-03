<?php 
	include_once('../../modelo/modeloreporte/m_reporteproveedor.php');
	$obj_repcargo = new reporteproveedor;
	$_GET['titulo']='Listado de Proveedores';
	$tabla = "tproveedor";
	$obj_repcargo->consultar($tabla);
	$obj_repcargo->reporte();
 ?>