<?php 
	@session_start();
	include_once ('../modelo/configuracion/m_maestro.php'); // incluyo el modelo del maestro
	$obj_bd = new Modelomaestro; // instancia de la clase del objeto
	$tablabd = "tmodelo"; // tabla en la base de datos
	
	// echo '<div class="alert alert-info" id="alerta_success"><span id="msj_alert">"'.$_SESSION['msj'].'"</span></div>';
	$url_control =  "../control/configuracion/c_maestro.php"; // url del controlador
	$url_reporte = "../control/controlreporte/c_reportemodelom.php"; // url del controlador del reporte
	// $sql = "";

 ?>


<div class="col-sm-2 col-md-3 col-xs-3 content">
	<form action="" method="POST" id="formulario">
			<h3 >Modelo Maestro</h3><hr>
			<div class="alert alert-success" id="alerta_success"><span id="msj_alert"></span></div>
			<div>
				<input type="button" class=" btn-normal-azul" name="nuevo" id="nuevo" value="Nuevo +">&nbsp;

				<button type="button" class=" btn-normal-azul" name="reporte" id="reporte"  onclick="envio_reporte('<?php echo $url_reporte; ?>')" ><i class="fa fa-file-pdf-o"> PDF</i></button>
				
				<button type="button" class="atras btn-normal-azul" name="" ><i class="fa fa-arrow-left"> Atrás</i></button>

				<input type="hidden" name="op" id="op" class="op">  <!-- controlo las operaciones -->
				<input type="hidden" name="idreg" id="idreg"><!-- id del registro -->
			</div>
				<div  id="conten_tabla" class="content-tabla">
					<table class="cell-border compact hover stripe " id="filtro">
						<thead>
							<tr>
								<td class="negrita-suave">N°</td>
								<td class="negrita-suave">campo texto</td>
								<td class="negrita-suave" width="10%">radio</td>
								<td class="negrita-suave">fecha</td>
								<td class="negrita-suave">combo dinamico</td>
								<td class="negrita-suave">Estatus</td>
								<td class="negrita-suave" width="15%">Operación</td>
							</tr>
						</thead>
						<tbody>
							<!-- consulta del objeto -->
							<?php 
								$c = 1;#contador# // los row son los datos de la tabla en posiciones de arreglo
								$obj_bd->consulta($tablabd);
							 	while($row = $obj_bd->row()){ 
							 		if($row['est']==1) $est='Activo';else{$est='Inactivo';}
							 		if($row[3]==1){$radio="opcion 1 ";}else{$radio="opcion 2";}
							 		$fecha = $obj_bd->cambiarfecha($row[4],'d-m-Y');
							?>
							<tr>
								<td><?php echo $c;?></td>
								<td><?php echo $row[2]; ?></td>
								<td><?php echo $radio; ?></td> 
								<td><?php echo $fecha; ?></td> 
								<td><?php echo $row[5]; ?></td> 
								<td><?php echo $est; ?></td>
								<td id="boton_mda">
									<button type="button" onclick="modificar(<?php echo $row[0];?>,'<?php echo $url_control;?>')" id="mod" class="btn-peq-suceso mod" name="mod"  ><i class="fa fa-edit"></button></i>

									<!-- en caso del estatus sea 1 ó 0 se activan los botones -->
									<?php if($row[6]==1){?>
										<button type="button" class="btn-peq-alerta" id="des" value="Desactivar" onclick="des_act(this.value,'<?php echo $url_control; ?>','<?php echo $row[0] ?>','Estas seguro de Desactivar este registro?')"><i class="fa fa-close"></i></button>	
									<?php }else{ ?>
										<button type="button" class="btn-peq-alerta verde" value="Activar" id="act"  onclick="des_act(this.value,'<?php echo $url_control; ?>','<?php echo $row[0] ?>','Estas seguro de Activar este registro?')"><i class="fa fa-check"></i></button>	
									<?php }?>
								</td>
						  	</tr>
							<?php  $c++;}?>
							<!-- fin consulta  objeto -->
						</tbody>
					</table>

				</div>
				<div class="form" id="form1" >
					
					<div  class="row ">

						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<label for="">Caja 1:</label>
								<input type="text" class="form-control sm-2" id="texto0" name="des" >
							</div>
						
						</div>
						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group">
								<label for="">Caja fecha:</label>
								<input type="text" readonly="readonly" class="form-control sm-4 requerido calendario" id="texto1" name="fecha" >
							</div>
						</div>
						<div class="col-sm-2 col-md-5 col-xs-3">
							<label for="">radios:</label>
							<label class="radio-inline col-sm-2 col-md-4 col-xs-3">
     							 <input type="radio" name="radiob" value="1"  id="radio2" checked> opcion 1
    						</label>
    					
						</div>
						
						<!-- debemos agregar a cada input o select la class requerido para validar si esta vacio -->
						<div class="col-sm-2 col-md-4 col-xs-3">
							<div class="form-group">
								<label for="">Combo 1: <span class="oblig">*</span> </label>
								<select class="form-control requerido" name="combo" id="select3">
									<option value="" readonly>Seleccione</option>
									<?php 
										$sql="SELECT *FROM tmodelocombo where est=1"; //sql para el combo  
										$obj_bd->crear_combo($sql,'id_com','des','id'); 
									?>
								</select>
							</div>	
						</div>
						
					</div>
					<br>
					<p id="campovacio" style="color:red;font-weight:600;"></p>
					<!-- en el la funcion envio se para el numero de input a limpiar antes de guardar para limpiarlo
					al igual que el cancelar  -->
					<div class="row">
						<div class="col-sm-2 col-md-4 col-xs-3 col-md-offset-4">
							<button type="button" id="guardar"  class="btn-normal-confirm alinear-centro" value="Registrar" onclick="envio(this.value,'<?php echo $url_control; ?>',4)"><i class="fa fa-check-square"> Guardar</i></button>&nbsp;<button type="button"  class="btn-normal-cancel alinear-centro" value="Cancelar" onclick="cancelar(6)"><i class="fa fa-remove"> Cancelar</i></button>
						</div>
					</div><br><br><br>
					<span class="help-block"  >&nbsp;&nbsp;&nbsp;Todo los campos con <span class="oblig fa fa-asterisk"></span> son obligatorios</span>
				</div>		
	</form>
</div>

