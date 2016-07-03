<?php 
	include_once('../../modelo/m_conexion.php');
	include_once('m_repcabpie.php');
	class reporteproveedor extends bd{

		function consultar($tabla){ // consultar por aproximidad
			return parent::ejecutar("SELECT  a.idproveedor,a.nombre,a.rif,a.razonsocial,a.telefono,a.correo,a.direccion,a.estatus FROM $tabla a INNER JOIN tproveedor b ON a.idproveedor=b.idproveedor");
		}
		function reporte(){
			$obj_pdf = new PDF();
			$obj_pdf->AddPage();
			$obj_pdf->AliasNbPages();
			$obj_pdf->SetFont('Times','B',12); // tipo de letra y con negrita
			$celdaAncho = 38; // variable ancho de tabla
			$celdaLargo = 10; // variable ancho de largo de tabla
			$bordetitulo = 0; // variable para borders del titulo tabla
			$bordetabla='T'; // variable para bordes de tabla
			$alinear = 15; // valor para anilear
			$obj_pdf->SetX($alinear); // alinear en el eje x
			//$obj_pdf->SetFillColor(139, 208, 253); 
			
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Nombre',$bordetitulo,0,'C'); // celda titulo tabla
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Teléfono',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Correo',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Dirección',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Estatus',$bordetitulo,0,'C');
			$obj_pdf->Ln(); // salto de linea

			while($row = $this->row()){
				$obj_pdf->SetFont('Times','',12);
				$obj_pdf->SetX($alinear);
				// $obj_pdf->Cell($celdaAncho,$celdaLargo,wordwrap($row[1],12,"\n",true),$bordetabla,0,'C'); //celda consulta tabla
				if($row['estatus']==1)$est="ACTIVO";else$est="INACTIVO";
				
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['nombre'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['telefono'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['correo'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['direccion'],$bordetabla,0,'C');
				
				
			
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$est,$bordetabla,0,'C');
				$obj_pdf->Ln();
				
			}
			$obj_pdf->Output(); // salida del pdf

			#wordwrap($obj_row,maximo caracteres,"\n"(en este caso salto de line),true) en caso de que la celda tenga mucho texto
		}
	}
?>