<?php 
	@session_start();
	include_once ('../modelo/configuracion/m_solicitud_sacramento.php'); // incluyo el modelo del maestro
	$obj_bd = new Solicitud_sacramento; // instancia de la clase del objeto
	$tablabd = "tpersona"; // tabla en la base de datos
	
	// echo '<div class="alert alert-info" id="alerta_success"><span id="msj_alert">"'.$_SESSION['msj'].'"</span></div>';
	$url_control =  "../control/configuracion/c_solicitud_sacramento.php"; // url del controlador
	$url_reporte = "../control/controlreporte/c_reportesfeligres.php"; // url del controlador del reporte
	// $sql = "";

	/*****************************CONFIGURACION CAMPOS DEL FORMULARIO**********************************/
  //-------- CAMPOS FORMULARIO PERSONA --------//
  $cam0 ="ced";// campos de la bd persona
  $cam1 = "nom"; // campos de la bd persona
  $cam2 = "ape"; // campos de la bd persona
  $cam3 = "sex"; // campos de la bd persona
  $cam4 = "tel"; // campos de la bd persona
  $cam5 = "cor"; // campos de la bd persona
  $cam6 ="dir";// campos de la bd persona
  $cam7 ="eda";// campos de la bd persona
  $cam8 ="her";// campos de la bd persona
  $cam9 ="nac";// campos de la bd persona

 ?>


<div class="col-sm-2 col-md-3 col-xs-3 content">
	<form action="" method="POST" id="formulario">
			<h3 >Feligres</h3><hr>
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
								<td class="negrita-suave">Cedula</td>
								<td class="negrita-suave" width="10%">Nombre</td>
								<td class="negrita-suave">Apellido</td>
								<td class="negrita-suave">Sexo</td>
								<td class="negrita-suave">telefono</td>
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
							 		if($row['estatus']==1) $est='Activo';else $est='Inactivo';
							 		//if($row[3]==1){$radio="opcion 1 ";}else{$radio="opcion 2";}
							 		//$fecha = $obj_bd->cambiarfecha($row[4],'d-m-Y');
							?>
							<tr>
								<td><?php echo $c;?></td>
								<td><?php echo $row['cedula']; ?></td>
								<td><?php echo $row['nombre']; ?></td> 
								<td><?php echo $row['apellido']; ?></td>
								<td><?php echo $row['sexo']; ?></td>
								<td><?php echo $row['telefono']; ?></td>
								<td><?php echo $est; ?></td>

								<td id="boton_mda">
									<button type="button" onclick="modificar(<?php echo $row['cedula'];?>,'<?php echo $url_control;?>')" id="mod" class="btn-peq-suceso mod" name="mod"  ><i class="fa fa-edit"></button></i>

									<!-- en caso del estatus sea 1 ó 0 se activan los botones -->
									<?php if($row['estatus']==1){?>
										<button type="button" class="btn-peq-alerta" id="des" value="Desactivar" onclick="des_act(this.value,'<?php echo $url_control; ?>','<?php echo $row['cedula'] ?>','Estas seguro de Desactivar este registro?')"><i class="fa fa-close"></i></button>	
									<?php }else{ ?>
										<button type="button" class="btn-peq-alerta verde" value="Activar" id="act"  onclick="des_act(this.value,'<?php echo $url_control; ?>','<?php echo $row['cedula'] ?>','Estas seguro de Activar este registro?')"><i class="fa fa-check"></i></button>	
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
								<!-- <label for="">Cedula :</label>
								<input type="text" class="form-control sm-2" id="texto0" name="ced" > -->

								<label for="<?php echo $cam0; ?>"> Cédula <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Cédula de la Persona."></i></strong></label>
        <input type="text" onkeypress="return validar_caja(this.id,'num','','Solo numeros.',event,'','validar1')" maxlength="10"  name="<?php echo $cam0; ?>" value="<?php  if(isset($obj_row[$cam0])) echo $obj_row[$cam0];?>" class="form-control" id="cam0" required>
        <span id="validar1" style="width: 100px; display: none;"></span>

							</div>
						
						</div>
						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Nombre :</label>
								<input type="text" class="form-control sm-2" id="texto1" name="nom" > -->


								<label for="<?php echo $cam1; ?>"> Nombres <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Nombre de la Persona."></i></strong></label>
        <input type="text" onkeypress="return validar_caja(this.id,'texto','','Solo letra.',event,'','validar2')" maxlength="15" name="<?php echo $cam1; ?>" value="<?php  if(isset($obj_row[$cam1])) echo $obj_row[$cam1];?>" class="form-control" id="<?php echo $cam1; ?>" required>
        <span id="validar2" style="width: 100px;display: none;"></span>

							</div>
						
						</div>
						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Apellido :</label>
								<input type="text" class="form-control sm-2" id="texto2" name="ape" > -->

								<label for="<?php echo $cam2; ?>"> Apellidos <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Apellidos de la Persona."></i></strong></label>
        						<input type="text" onkeypress="return validar_caja(this.id,'texto','','Solo letra.',event,'','validar3')" maxlength="15" name="<?php echo $cam2; ?>" value="<?php  if(isset($obj_row[$cam2])) echo $obj_row[$cam2];?>" class="form-control" id="<?php echo $cam2; ?>" required>
        						<span id="validar3" style="width: 100px;display: none;"></span>

							</div>
						
						</div>
						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								 <label for="">Sexo :</label>
								<input type="text" class="form-control sm-2" id="texto3" name="sex" > -->

								<!-- <label for="<?php echo $cam3; ?>" >Sexo <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Sexo de la Persona."></i></strong></label>
        						<select type="text" name="<?php echo $cam3; ?>" class="form-control" id="<?php echo $cam3; ?>"  cam="" required>
          						<option value="">Elegir:</option>
          						<option value="1" <?php if(isset($obj_row[$cam3]) && ($obj_row[$cam3]==1)){ echo 'selected=selected';}?>>F</option>
          						<option value="2" <?php if(isset($obj_row[$cam3]) && ($obj_row[$cam3]==2)){ echo 'selected=selected';}?>>M</option>
        						</select> -->


							</div>
						
						</div>
						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Telefono :</label>
								<input type="text" class="form-control sm-2" id="texto4" name="tel" > --> 

								<label for="<?php echo $cam4; ?>">Teléfono  <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Número del celular de la Persona."></i></strong></label>
        						<input type="text" onkeypress="return validar_caja(this.id,'num','','Solo numeros.',event,'','validar5')" maxlength="13"  name="<?php echo $cam4; ?>" value="<?php  if(isset($obj_row[$cam4])) echo $obj_row[$cam4];?>" class="form-control" id="<?php echo $cam4; ?>" required>
        						<span id="validar5" style="width: 100px; display: none;"></span>


							</div>
						
						</div>
						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Correo :</label>
								<input type="text" class="form-control sm-2" id="texto5" name="cor" > -->

								<label for="<?php echo $cam5; ?>"> Correo <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Correo Electronico de la persona."></i></strong></label>
        <input type="email" maxlength="25" name="<?php echo $cam5; ?>" value="<?php  if(isset($obj_row[$cam5])) echo $obj_row[$cam5];?>" class="form-control" id="<?php echo $cam5; ?>" required>

							</div>
						
						</div>
						
						
						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Fecha de Nacimiento :</label>
								<input type="text" class="form-control sm-2 calendario" readonly id="texto9" name="nac" > -->


								<label for="<?php echo $cam8; ?>">Fecha de Nacimiento <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Fecha de nacimiento de la persona."></i></strong></label>
        <input readonly="readonly" type="text" name="<?php echo $cam8; ?>" value="<?php if(isset($nac)) echo $nac;?>" class="calendario form-control" id="nac" required>

							</div>
						
						</div>


						


						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Edad :</label>
								<input type="text" class="form-control sm-2" maxlength="2" id="texto7" name="eda" > -->


								<label for="<?php echo $cam6; ?>"> Edad  :<strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Número del celular de la Persona."></i></strong></label>
        						<input type="text" onkeypress="return validar_caja(this.id,'num','','Solo numeros.',event,'','validar5')" maxlength="2"  name="<?php echo $cam6; ?>" value="<?php  if(isset($obj_row[$cam4])) echo $obj_row[$cam6];?>" class="form-control" id="<?php echo $cam6; ?>" required>
        						<span id="validar5" style="width: 100px; display: none;"></span>


							</div>
						
						</div>


						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Numero de Hermanos :</label>
								<input type="text" class="form-control sm-2" maxlength="2" id="texto8" name="her" > -->

								<label for="<?php echo $cam7; ?>"> Número de hermanos  :<strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Número de hermanos de la Persona."></i></strong></label>
        						<input type="text" onkeypress="return validar_caja(this.id,'num','','Solo numeros.',event,'','validar5')" maxlength="2"  name="<?php echo $cam7; ?>" value="<?php  if(isset($obj_row[$cam7])) echo $obj_row[$cam7];?>" class="form-control" id="<?php echo $cam7; ?>" required>
        						<span id="validar5" style="width: 100px; display: none;"></span>

							</div>
						
						</div>

						<div class="col-sm-2 col-md-5 col-xs-3">
							<div class="form-group ">
								<!-- <label for="">Direccion :</label>
								<input type="text" class="form-control sm-2" id="texto6" name="dir" > -->

								<label for="<?php echo $cam6; ?>">Dirección <strong><i class="text-help fa fa-question-circle" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Dirección de Habitación."></i></strong></label>
        <textarea  name="<?php echo $cam6; ?>" class="form-control" id="<?php echo $cam6; ?>"><?php  if(isset($obj_row[$cam6])) echo $obj_row[$cam6];?></textarea>

							</div>
						
						</div>
						
					</div>
					<br>
					<!-- en el la funcion envio se para el numero de input a limpiar antes de guardar para limpiarlo
					al igual que el cancelar  -->
					<div class="row">
						<div class="col-sm-2 col-md-4 col-xs-3 col-md-offset-4">
							<button type="button" id="guardar"  class="btn-normal-confirm alinear-centro" value="Registrar" onclick="envio(this.value,'<?php echo $url_control; ?>',10)"><i class="fa fa-check-square"> Guardar</i></button>&nbsp;<button type="button"  class="btn-normal-cancel alinear-centro" value="Cancelar" onclick="cancelar(10)"><i class="fa fa-remove"> Cancelar</i></button>
						</div>
					</div><br>
					<span class="help-block">&nbsp;&nbsp;&nbsp;Todo los campos con <span class="oblig fa fa-asterisk"></span> son obligatorios</span>
				</div>		
	</form>
</div>

