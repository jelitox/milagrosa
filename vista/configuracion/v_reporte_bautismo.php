<?php 
	if(!isset($_SESSION['Usuario']) and empty($_SESSION['Usuario'])){
			print "<script> location.href='index.php'; </script>";
	}
?>
<div class="col-sm-2 col-md-3 col-xs-3 content">
	<form action="" method="POST" id="formulario">
	<h2 align="center" >Planilla de bautismo</h2><hr>
<!--! <div id="titulo_form" align="center">Planilla Bautismo</div> -->
<form name="formulario" method="post" action="reportes/certificadoBautizo.php" autocomplete="off" id="formulario" target="_blank">
	<table id="formulario_persona" width="100%">
		<tr>
			<td align="center"> <h4> Feligres: </h4> </td>
			<td align="center"><input type="text" onkeyup="datalist(this,'listar_bautizo');" name="txtfeligres"/>
				<input type="hidden" name="txtcedula"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><button type="submit">Buscar</button></td>
		</tr>
	</table>
</form>
</div>