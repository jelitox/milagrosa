<?php @session_start();
//<li><a href="?accion=modeloprogramacion" id="modelo" >Modelo Programacion</a></li>
	switch ($_SESSION['nivel']) {
		case 'Administrador': // menu del administrador
			echo '<ul id="accordion" class="accordion">
			<li ><div class="link" id="inicio"><i class="fa fa-home"></i><a href="?accion=inicio" style="color:#fff; text-decoration:none;">Inicio</a><i class=""></i></div></li>
					<li>

						<div class="link"><i class="fa fa-cog"></i>Configuración<i class="fa fa-chevron-down"></i></div>
						<ul class="submenu">
							<li><a href="?accion=modeloprogramacion" id="modelo" >Modelo Programacion</a></li> 
							<li><a href="?accion=feligres" id="Feligres">Feligres</a></li>
					        <li><a href="?accion=sacramento" id="sacramento">Sacramento</a></li>
					        <li><a href="?accion=Apostolado" id="grupo">Apostolado</a></li>
					        <li><a href="?accion=parroco" id="parroco">P&aacuterroco</a></li>
					        <li><a href="?accion=Noticia" id="noticia">Noticias</a></li>
					        <li><a href="?accion=Almacen" id="almacen">Ubicación</a></li>
					        <li><a href="?accion=bienes">Bienes Inmuebles</a></li>
					        <li><a href="?accion=Proveedor" id="proveedor">Proveedor</a></li>
						</ul>
					</li>
					<li>
						<div class="link"><i class="fa fa-exchange"></i>Movimientos<i class="fa fa-chevron-down"></i></div>
						<ul class="submenu">
							
							<li><a href="?accion=solicitud_sacramento">Solicitud de Sacramento</a></li>
					        <li><a href="?accion=constitucion" id="constituir_grupo">Constituir Grupo Apostolado</a></li>
					        <li><a href="?accion=Inmuebles" id="inmuebles">Control de bienes inmuebles</a></li>
						</ul>
					</li>
					<li>
						<div class="link"><i class="fa fa-print"></i>Reportes<i class="fa fa-chevron-down"></i></div>
						<ul class="submenu">
							 <li>	<a href="">Generar Certificado de Sacramento</a></li>
					       <li>	<a href="?accion=reporte_bautismo">Planilla de Bautismo</a></li>
					       <li>	<a href="?accion=reporte_comunion">Planilla de Comuni&oacuten</a></li>
					       <li>	<a href="?accion=reporte_confirmacion">Planilla de 	Confirmaci&oacuten</a></li>
					       <li>	<a href="#">Generar Listado de Feligres por Sacramento</a></li>
					       <li>	<a target="_blank" href="reportes/listadorporsacramento.php?tipo_reporte=Bautismo">Bautismo</a></li>
					       <li>	<a target="_blank" href="reportes/listadorporsacramento.php?tipo_reporte=Comunion">Comuni&oacuten</a></li>
					       <li>	<a target="_blank" href="reportes/listadorporsacramento.php?tipo_reporte=Confirmacion">Confirmaci&oacuten</a></li>
					       <li><a href="">Listar Solicitudes Pendientes</a></li>
					       <li><a href="">Bautismo</a></li>
					       <li><a href="">Comuni&oacuten</a></li>
					       <li><a href="">Confirmaci&oacuten</a></li>
					       <li><a href="">Generar Listado por Grupo Apostolado</a></li>
					       <li><a href="">Generar Reporte por Grupo Apostolado</a></li>
					       <li><a href="">Generar Reporte por constitucion de Grupo Apostolado</a></li>
						</ul>
					</li>
					<li><div class="link"><i class="fa fa-mail-reply"></i><a data-toggle="modal" href="#ventana1" style="color:#fff; text-decoration:none;" >Salir</a><i class=""></i></div>
						
					</li>
				</ul>';
		break;

		case 'Feligres': // menu del feligres
			echo '<ul id="accordion" class="accordion">
				<li ><div class="link" id="inicio"><i class="fa fa-home"></i><a href="?accion=inicio" style="color:#fff; text-decoration:none;">Inicio</a><i class=""></i></div></li>
					<li>
						<div class="link"><i class="fa fa-paint-brush"></i>Diseño web<i class="fa fa-chevron-down"></i></div>
						<ul class="submenu">
							<li><a href="#">Photoshop</a></li>
							<li><a href="#">HTML</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">Maquetacion web</a></li>
						</ul>
					</li>
					<li>
						<div class="link"><i class="fa fa-code"></i>Desarrollo front-end<i class="fa fa-chevron-down"></i></div>
						<ul class="submenu">
							<li><a href="#">Javascript</a></li>
							<li><a href="#">jQuery</a></li>
							<li><a href="#">Frameworks javascript</a></li>
						</ul>
					</li>
					<li><div class="link"><i class="fa fa-globe"></i><a data-toggle="modal" href="#ventana1" style="color:#fff; text-decoration:none;" >Salir</a><i class=""></i></div>
						
					</li>
					
				</ul>';
		break;

		case 'Secretaria': // menu de la secretaria
			echo '<ul id="accordion" class="accordion">
				<li ><div class="link" id="inicio"><i class="fa fa-home"></i><a href="?accion=inicio" style="color:#fff; text-decoration:none;">Inicio</a><i class=""></i></div></li>
					<li>
						<div class="link"><i class="fa fa-paint-brush"></i>Diseño web<i class="fa fa-chevron-down"></i></div>
						<ul class="submenu">
							<li><a href="#">Photoshop</a></li>
							<li><a href="#">HTML</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">Maquetacion web</a></li>
						</ul>
					</li>
					<li>
						<div class="link"><i class="fa fa-code"></i>Desarrollo front-end<i class="fa fa-chevron-down"></i></div>
						<ul class="submenu">
							<li><a href="#">Javascript</a></li>
							<li><a href="#">jQuery</a></li>
							<li><a href="#">Frameworks javascript</a></li>
						</ul>
					</li>
					<li><div class="link"><i class="fa fa-globe"></i><a data-toggle="modal" href="#ventana1" style="color:#fff; text-decoration:none;" >Salir</a><i class=""></i></div>
						
					</li>
					
				</ul>';
		break;
	}
?>