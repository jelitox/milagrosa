<?php
	session_start();
	include_once('../../fpdf/fpdf.php');
	class PDF extends FPDF{
  	public $title;

   public function Header(){

     $this->Image('../../css/img/logo.jpg',5,3,60); //logo comunidad debe estar en img carpeta reportes
     $this->Ln(10);
      $this->SetFont('Arial','B',12);
      
      $this->Cell(0,10,$_GET['titulo'],0,0,'C'); // titulo del reporte llega desde el control
      $this->SetFont('Times','',10);
      $fecha=date('d-m-Y');
      $this->Cell(0,10,utf8_decode('Fecha de impresión: ').$fecha,0,0,'R');
      $this->Ln(10);
     
	}
	
	function Footer(){

		$this->SetY(-25);

		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,utf8_decode('Derechos Compartidos Nuestra señora milgrosa.'.' Generado por: '.$_SESSION['usu']),0,0,'L');
		$this->Ln();
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
   }
}
?>