<?php 
	include_once('../../modelo/m_bd.php');
	include_once('m_repcabpie.php');
	class Repcargo extends bd{

		function consultar($estatus,$valor,$limit){ // consultar por aproximidad
			if($estatus != ""){
				 $sql ="SELECT * FROM tcargo WHERE (est=$estatus) and (nom like UPPER(('%$valor%')))  ORDER BY idcar desc limit $limit, 10";
				return parent::ejecutar($sql);
			}else{
				return parent::ejecutar("SELECT * FROM tcargo WHERE (nom like UPPER(('%$valor%')) ) ORDER BY idcar desc limit $limit, 10");
			}if($estatus =="" && $valor=="" && $limit ==0){
				return parent::ejecutar("SELECT *FROM tcargo");
			}
		}
		function reporte(){
			$obj_pdf = new PDF();
			$obj_pdf->AddPage();
			$obj_pdf->AliasNbPages();
			$obj_pdf->SetFont('Times','B',12); // tipo de letra y con negrita
			$celdaAncho = 50; // variable ancho de tabla
			$celdaLargo = 10; // variable ancho de largo de tabla
			$bordetitulo = 0; // variable para borders del titulo tabla
			$bordetabla='T'; // variable para bordes de tabla
			$alinear = 30; // valor para anilear
			$obj_pdf->SetX($alinear); // alinear en el eje x
			//$obj_pdf->SetFillColor(139, 208, 253); 
			
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Cargo',$bordetitulo,0,'C'); // celda titulo tabla
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Sector',$bordetitulo,0,'C');
			$obj_pdf->Cell($celdaAncho,$celdaLargo,'Estatus',$bordetitulo,0,'C');
			$obj_pdf->Ln(); // salto de linea

			while($row = $this->row()){
				$obj_pdf->SetFont('Times','',12);
				$obj_pdf->SetX($alinear);
				$obj_pdf->Cell($celdaAncho,$celdaLargo,wordwrap($row[1],12,"\n",true),$bordetabla,0,'C'); //celda consulta tabla
				if($row[2]==0)$sect="NO SE";else$sect="SI SE";
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$sect,$bordetabla,0,'C');
				if($row[3]==1)$est="ACTIVO";else$est="INACTIVO";
				$obj_pdf->Cell($celdaAncho,$celdaLargo,$est,$bordetabla,0,'C');
				$obj_pdf->Ln();
				
			}
			$obj_pdf->Output(); // salida del pdf

			#wordwrap($obj_row,maximo caracteres,"\n"(en este caso salto de line),true) en caso de que la celda tenga mucho texto
		}
	}
?>