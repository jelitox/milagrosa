<?php 
	@session_start();
	include_once ('../modelo/configuracion/m_almacen.php'); // incluyo el modelo del maestro
	$obj_bd = new Almacen; // instancia de la clase del objeto
	$tablabd = "talmacen"; // tabla en la base de datos
	
	// echo '<div class="alert alert-info" id="alerta_success"><span id="msj_alert">"'.$_SESSION['msj'].'"</span></div>';
	$url_control =  "../control/configuracion/c_almacen.php"; // url del controlador
	$url_reporte = "../control/controlreporte/c_reportealmacen.php"; // url del controlador del reporte
	// $sql = "";

/*CONFIGURACION CAMPOS DEL FORMULARIO*/
  $cam1 = "nom"; // campos de la bd 
  $cam2 = "descripcion"; // campos de la bd
 ?>


<div class="col-sm-2 col-md-3 col-xs-3 content">
	<form action="" method="POST" id="formulario">
			<h3 >Ubicación</h3><hr>
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
								<td class="negrita-suave">Nombre</td>
								<td class="negrita-suave" width="20%">Descripción</td>
								
								
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
							 		if($row['estatus']==1) $est='Activo';else{$est='Inactivo';}
							 		//if($row[3]==1){$radio="opcion 1 ";}else{$radio="opcion 2";}
							 		//$fecha = $obj_bd->cambiarfecha($row[4],'d-m-Y');
							?>
							<tr>
								<td><?php echo $c;?></td>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['descripcion']; ?></td> 
								 
							
								<td><?php echo $est; ?></td>
								<td id="boton_mda">
									<button type="button" onclick="modificar(<?php echo $row['idalmacen'];?>,'<?php echo $url_control;?>')" id="mod" class="btn-peq-suceso mod" name="mod"  ><i class="fa fa-edit"></button></i>

									<!-- en caso del estatus sea 1 ó 0 se activan los botones -->
									<?php if($row['estatus']==1){?>
										<button type="button" class="btn-peq-alerta" id="des" value="Desactivar" onclick="des_act(this.value,'<?php echo $url_control; ?>','<?php echo $row['idalmacen'] ?>','Estas seguro de Desactivar este registro?')"><i class="fa fa-close"></i></button>	
									<?php }else{ ?>
										<button type="button" class="btn-peq-alerta verde" value="Activar" id="act"  onclick="des_act(this.value,'<?php echo $url_control; ?>','<?php echo $row['idalmacen'] ?>','Estas seguro de Activar este registro?')"><i class="fa fa-check"></i></button>	
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
								<!-- <label for="">Nombre :</label>
								 <input type="text" class="form-control sm-2" id="texto0" name="nom" > -->


								 <label for="<?php echo $cam1; ?>">Nombre <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Nombre de la ubicación."></i></strong></label>
        <input type="text" onkeypress="return validar_caja(this.id,'texto','','Solo letra.',event,'','validar2')" name="<?php echo $cam1; ?>" value="<?php  if(isset($obj_row[$cam1])) echo $obj_row[$cam1];?>" class="form-control" id="texto0" required>
        <span id="validar2" style="width: 100px;display: none;"></span>


							</div>
						
						</div>
						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Descripción :</label>
								<input type="text" class="form-control sm-2" id="texto1" name="descripcion" > --> 


								<label for="<?php echo $cam2; ?>">Descripción <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Código de la asignatura."></i></strong></label>
              <input type="text" name="<?php echo $cam2; ?>" value="<?php  if(isset($obj_row[$cam2])) echo $obj_row[$cam2];?>" class="form-control" id="texto1" required>

							</div>
						
						</div>
					</div>
					<br>
					<!-- en el la funcion envio se para el numero de input a limpiar antes de guardar para limpiarlo
					al igual que el cancelar  -->
					<div class="row">
						<div class="col-sm-2 col-md-4 col-xs-3 col-md-offset-4">
							<button type="button" id="guardar"  class="btn-normal-confirm alinear-centro" value="Registrar" onclick="envio(this.value,'<?php echo $url_control; ?>',3)"><i class="fa fa-check-square"> Guardar</i></button>&nbsp;<button type="button"  class="btn-normal-cancel alinear-centro" value="Cancelar" onclick="cancelar(3)"><i class="fa fa-remove"> Cancelar</i></button>
						</div>
					</div><br>
					<span class="help-block">&nbsp;&nbsp;&nbsp;Todo los campos con <span class="oblig fa fa-asterisk"></span> son obligatorios</span>
				</div>		
	</form>
</div>

