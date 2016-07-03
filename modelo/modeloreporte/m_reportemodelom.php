<?php 
	include_once('../../modelo/m_conexion.php');
	include_once('m_repcabpie.php');
	class Reportemodelo extends bd{

		function consultar($tabla){ // consultar por aproximidad
			return parent::ejecutar("SELECT a.id,a.id_com,a.des,a.nro,a.tipo,b.des combo,a.est FROM $tabla a INNER JOIN tmodelocombo b ON a.id_com=b.id_com");
		}
		function reporte(){
			$obj_pdf = new PDF();
			$obj_pdf->AddPage();
			$obj_pdf->AliasNbPages();
			$obj_pdf->SetFont('Times','B',12); // tipo de letra y con negrita
			$celdaAncho = 35; // variable ancho de tabla
			$celdaLargo = 10; // variable ancho de largo de tabla
			$bordetitulo = 0; // variable para borders del titulo tabla
			$bordetabla='T'; // variable para bordes de tabla
			$alinear = 15; // valor para anilear
			$obj_pdf->SetX($alinear); // alinear en el eje x
			//$obj_pdf->SetFillColor(139, 208, 253); 
			
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Descripcion',$bordetitulo,0,'C'); // celda titulo tabla
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Fecha',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Radio',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Combo',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Estatus',$bordetitulo,0,'C');
			$obj_pdf->Ln(); // salto de linea

			while($row = $this->row()){
				$obj_pdf->SetFont('Times','',12);
				$obj_pdf->SetX($alinear);
				// $obj_pdf->Cell($celdaAncho,$celdaLargo,wordwrap($row[1],12,"\n",true),$bordetabla,0,'C'); //celda consulta tabla
				if($row['nro']==1)$radio="OPCION 1";else$radio="OPCION 2";
				if($row['est']==1)$est="ACTIVO";else$est="INACTIVO";
				$fecha = $this->cambiarfecha($row['tipo'],'d-m-Y');

				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['des'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$fecha,$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$radio,$bordetabla,0,'C');
				
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$row['combo'],$bordetabla,0,'C');
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$est,$bordetabla,0,'C');
				$obj_pdf->Ln();
				
			}
			$obj_pdf->Output(); // salida del pdf

			#wordwrap($obj_row,maximo caracteres,"\n"(en este caso salto de line),true) en caso de que la celda tenga mucho texto
		}
	}
?>