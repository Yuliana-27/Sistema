<?php
class PDF extends FPDF
  {
  //Cabecera de página
  function Header()
  {
    //Arial bold 12
    $this->SetFont('Arial','B',12);
    //Título
    $this->Image('logo.jpg',5,10,30,20);
    $this->MultiCell(0,7,"WIN PROFESIONALES EN COMPUTACION\nDEL ESTADO Y LA REGION",0,'C');
    //Salto de línea
    $this->Ln(10);
   }

  //Pie de página
  function Footer()
  {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Pie de Pagina
    $this->MultiCell(0,5,"Alma Rocio Fco.Vielma , Calle Benito Juarez No. 495, entre Carranza y 18 de Marzo, Tuxtepec, Oaxaca\nTelefono: (287) 87 5 58 25  y  (287) 87 5 76 80, e-mail: Vielma07@live.com.mx",0,'C');
  }
 } 
?>
