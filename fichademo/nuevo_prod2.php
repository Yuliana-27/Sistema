<?php
	$nombre=$_POST['nombre'];
	$num_control=$_POST['num_control'];
	$carrera=$_POST['carrera'];
	$turno=$_POST['turno'];


 NuevoProducto( $_POST['nombre'],$_POST['num_control'], $_POST['carrera'], $_POST['turno']);



function NuevoProducto($nombre,$num_control,$carrera,$turno)
	{
	
			
				date_default_timezone_set('America/Mexico_City');
				$fecha = date("Y-m-d H:i:s");  
			
			
	include 'conexion.php';
		$sentencia= "INSERT INTO persona (nombre,num_control,carrera,turno) VALUES ('".$nombre."','".$num_control."', '".$carrera."', '".$turno."') ";
		
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		
 require('fpdf/fpdf.php');
 require('clasepdf.php');

$pdf=new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);	
//$nombre=$_GET['nombre'];
date_default_timezone_set('America/Los_Angeles');
$fecha = date("Y-m-d H:i:s");  

$pdf->SetTextColor( 85, 98, 165 );
$pdf->SetFillColor(175,222,255); 
$pdf->SetTextColor(175,0,0);
$pdf->Ln(7); 

$pdf->SetFont('Arial','B',12);
$pdf->SetX(15); // abscissa or Horizontal position


$pdf->SetFillColor( 85, 98, 165 );
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(185,8,'Informacion personal',0,0,'C',1);

$pdf->Ln(8);
$pdf->SetX(15); // abscissa or Horizontal position
$pdf->SetFillColor( 85, 98, 165 ); //color guinda
$pdf->SetTextColor(255,255,255); //color blanco
$pdf->SetFont('Arial','B',10);
$pdf->Cell(46.25,8,'Turno',1,0,'C',1);
$pdf->Cell(46.25,8,'Num_control',1,0,'C',1);
$pdf->Cell(46.25,8,'Carrera',1,0,'C',1);
$pdf->Cell(46.25,8,'Nombre',1,0,'C',1);

$pdf->Ln(8);
$pdf->SetFillColor(255,255,255); //color blanco
$pdf->SetTextColor(23,32,42); // color negro
$pdf->SetFont('Arial','B',8);
$pdf->SetX(15); // abscissa or Horizontal position
$pdf->Cell(46.25,8,utf8_decode ("$turno"),1,0,'L',1);
$pdf->Cell(46.25,8,utf8_decode ("$num_control"),1,0,'L',1);
$pdf->Cell(46.25,8,utf8_decode ("$carrera"),1,0,'L',1);
$pdf->MultiCell(46.25,8,utf8_decode ("$nombre"),1,0,'L',1);


$pdf->Output("$nombre.pdf",'D');

	}
?>

<script type="text/javascript">
	alert("�� Felicidades en breve \n nos pondremos en contacto!!");
	window.location.href='index.php';
</script>
