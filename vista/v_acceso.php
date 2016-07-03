<?php session_start();
if(isset($_SESSION['msj_access'])){echo "<script>alert('".$_SESSION['msj_access']."');</script>";unset($_SESSION['msj_access']); }
?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
<link rel="stylesheet" type="text/css" href="../css/font-awesome/css/font-awesome.css">
<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript" src="../js/libreria.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<div class="container">
<div class="row">
	<a style="color:#31708f;margin-top:-100px;" href="../index.php" data-toggle="tooltip" title="Volver al inicio"><i class="fa fa-home fa-2x" style="color:#31708f;margin-top:10px;"></i></a>
</div>

		<form class="form-acceso" method="POST" id="formulario" action="../control/c_general.php" autocomplete="off">
			<input type="hidden" name="op" id="op" value="Entrar">
			<div class="alert alert-info" role="alert"><h4><i class="fa fa-laptop fa-lg"> Acceso al Sistema</i></h4></div>
			<div class="col-lg-9 center">
				<div class="input-group">
					  <span class="input-group-addon " id="basic-addon1"><i class="fa fa-user"></i></span>
					  <input type="text" class="form-control" name="usu" maxlength="12" placeholder="Ingrese usuario" aria-describedby="basic-addon1" required>
				</div><br>
				<div class="input-group">
					  <span class="input-group-addon " id="basic-addon1"><i class="fa fa-lock"></i></span>
					  <input type="password" class="form-control" name="cla" placeholder="Ingrese su clave" aria-describedby="basic-addon1" required>
				</div><br>
				<div class="">
					<button type="submit" class="btn btn-success btn-lg btn-block" value="Entrar" id="entrar">Iniciar Sesi&oacuten</button>
				
				</div>
				<hr>
				<a href="" onclick="alert('En construcción...')"> ¿Olvidaste tu clave ?</a>
			</div>
			
		</form>

</div>