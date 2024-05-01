<?php

class PDF extends FPDF
  {
  //Cabecera de página
  
  function Header()
  {
    //Arial bold 12
    $this->SetFont('Arial','B',12);
    //Título
	$this->MultiCell(0,7,"\n",0,'C');
    $this->Image('123.jpg',50,5,130,28);

    $this->MultiCell(0,7,"\n",0,'C');
    //Salto de línea
    $this->Ln(5);
	
   }

  //Pie de página
  function Footer()
  {
    $this->SetY(-25);
 $this->SetFont('Arial','I',8);
 $this->SetTextColor( 3, 21, 113 );
 $this->Cell(0,10,'Avenida Dr, Víctor Bravo Ahuja S/N, 5 de Mayo, 68350 San Juan Bautista Tuxtepec, Oax. ',0,0,'C');
   $this->Ln(4);
    $this->Cell(0,10,utf8_decode ('Teléfono: (287) 8 75 10 44  y  (287) 87 5 10 44, e-mail: informesitt@gmail.com'),0,0,'C');
   $this->Ln(4);
 $this->Cell(0,10,utf8_decode ('Página ').$this->PageNo(),0,0,'C');

    
    
  }
 } 
?>
