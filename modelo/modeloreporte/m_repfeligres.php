<?php 
	include_once('../../modelo/m_conexion.php');
	include_once('m_repcabpie.php');
	class reportefeligres extends bd{

		function consultar($tabla){ // consultar por aproximidad
			return parent::ejecutar("SELECT a.cedula,a.nombre,a.apellido,a.sexo,a.telefono,a.correo,a.direccion,a.edad,a.hermanos,a.nacimiento,a.idcomunidad,a.fecha,a.estatus FROM $tabla a INNER JOIN tpersona b ON a.cedula=b.cedula");
		}
		function reporte(){
			$obj_pdf = new PDF();
			$obj_pdf->AddPage();
			$obj_pdf->AliasNbPages();
			$obj_pdf->SetFont('Times','B',12); // tipo de letra y con negrita
			$celdaAncho = 15; // variable ancho de tabla
			$celdaLargo = 10; // variable ancho de largo de tabla
			$bordetitulo = 0; // variable para borders del titulo tabla
			$bordetabla=0; // variable para bordes de tabla
			$alinear = 15; // valor para anilear
			$obj_pdf->SetX($alinear); // alinear en el eje x
			//$obj_pdf->SetFillColor(139, 208, 253); 
			
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'cedula',$bordetitulo,0,'C'); // celda titulo tabla
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'nombre',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'apellido',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'sexo',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'telefono',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'correo',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'direccion',$bordetitulo,0,'C');
			//$obj_pdf->Cell($celdaAncho,$celdaLargo,'edad',$bordetitulo,0,'C');
		//	$obj_pdf->Cell($celdaAncho,$celdaLargo,'hermanos',$bordetitulo,0,'C');
		//	$obj_pdf->Cell($celdaAncho,$celdaLargo,'nacimiento',$bordetitulo,0,'C');
		//	$obj_pdf->Cell($celdaAncho,$celdaLargo,'idcomunidad',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'fecha',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Estatus',$bordetitulo,0,'C');
			$obj_pdf->Ln(); // salto de linea

			while($row = $this->row()){
				$obj_pdf->SetFont('Times','',12);
				$obj_pdf->SetX($alinear);
				// $obj_pdf->Cell($celdaAncho,$celdaLargo,wordwrap($row[1],12,"\n",true),$bordetabla,0,'C'); //celda consulta tabla
				if($row['estatus']==1)$est="ACTIVO";else$est="INACTIVO";
				
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['cedula'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['nombre'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['apellido'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['sexo'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['telefono'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['correo'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['direccion'],$bordetabla,0,'C');
			//	$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['edad'],$bordetabla,0,'C');
			//	$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['hermanos'],$bordetabla,0,'C');
			//	$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['nacimiento'],$bordetabla,0,'C');
			//	$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['idcomunidad'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['fecha'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$est,$bordetabla,0,'C');
				$obj_pdf->Ln();
				
			}
			$obj_pdf->Output(); // salida del pdf

			#wordwrap($obj_row,maximo caracteres,"\n"(en este caso salto de line),true) en caso de que la celda tenga mucho texto
		}
	}
?>