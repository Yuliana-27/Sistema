<?php
	$cal2=$_POST['cal2'];
	$cel=$_POST['cel'];
	$ap=$_POST['ap'];
	$am=$_POST['am'];
	$nombre=$_POST['nombre'];
	$edad=$_POST['edad'];
	$ep=$_POST['ep'];
	$fb=$_POST['fb'];
	$mail1=$_POST['correo'];
	$mail2=$_POST['correo2'];
	$lac=$_POST['lac'];
	$ol=$_POST['ol'];
	$mod=$_POST['mod'];
	$cu=$_POST['cu'];
	
	
	
	if ($mail1 != $mail2) {
 echo '<script language="javascript">alert("El correo no coincide\n Intente nuevamente por favor");window.location.href="index.php"</script>';
	//header('Location: index.php');
	
} else {
  
 NuevoProducto($_POST['cel'], $_POST['ap'], $_POST['am'], $_POST['nombre'],$_POST['edad'], $_POST['ep'], $_POST['fb'], $_POST['correo'], $_POST['lac'], $_POST['ol'], $_POST['mod'], $_POST['cu']);

//mail("santillan18@hotmail.es", "Comentarios desde mi pagina",$mensaje = "Nombre: $nombre\n Cel: $cel\n Correo: $correo\n Nivel Educativo: $ne\n Campus: $campus\n $mensaje", "From: $correo")

// Debes editar las pr�ximas dos l�neas de c�digo de acuerdo con tus preferencias
/*ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "universidad.hispano@gmail.com";
    $to = "santillan18@hotmail.es,angel.gs@tuxtepec.tecnm.mx";
    $subject = "Ficha de pre-registro Univ. Hispano";
    $message = "Ficha de pre-registro:\n\n";
    $message .= "Tel. Celular: " . $_POST['cel'] . "\n";
    $message .= "Apellido paterno: " . $_POST['ap'] . "\n";
    $message .= "Apellido materno: " . $_POST['am'] . "\n";
    $message .= "Nombre: " . $_POST['nombre'] . "\n";
    $message .= "Edad del aspirante: " . $_POST['ep'] . "\n";
    $message .= "Facebook: " . $_POST['fb'] . "\n";
    $message .= "Correo: " . $_POST['correo'] . "\n\n";
	$message .= "Licenciatura a cursar:\n\n";
	$message .= "1a. Op.: " . $_POST['lac'] . "\n";
	$message .= "�Que otra licenciatura te gustar�a en esta u otra escuela?:" . $_POST['ol'] . "\n";
	$message .= "Modalidad: " . $_POST['mod'] . "\n";
	$message .= "Conocimiento de la universidad: " . $_POST['cu'] . "\n";
    $message .= "Nos encuentras en:\n\n";
    $message .= "https://wa.me/message/ZFJZW2LP3KHUJ1\n\n";
    
    https://wa.me/message/ZFJZW2LP3KHUJ1
    
    $headers = "From:" . $from;
    mail($to,$subject,utf8_decode ($message), $headers);
    echo "The email message was sent.";*/


 

}

function NuevoProducto($cel,$ap,$am,$nombre,$edad,$ep,$fb,$mail1,$lac,$ol,$mod,$cu)
	{
	
			
				date_default_timezone_set('America/Mexico_City');
				$fecha = date("Y-m-d H:i:s");  
			
			
	include 'conexion.php';
		$sentencia= "INSERT INTO service (nc,nombre,cal1,cal2,cal3,cal4,cal5,cal6,cal7,cal8,cal9,cal10,cal11) VALUES ('".$cel."', '".$ap."', '".$am."', '".$nombre."', '".$edad."', '".$ep."', '".$fb."', '".$mail1."', '".$lac."', '".$ol."', '".$mod."', '".$cu."','".$fecha."') ";
		
		$conexion->query($sentencia) or die ("Error al ingresar los datos".mysqli_error($conexion));
		
 require('fpdf/fpdf.php');
 require('clasepdf.php');
// include("cabecera.htm");
// include("conexion.php");

// echo "<h3>Informe de resultados de la auditoria de servicios (Detallado)</h3>";
//$db=conectar("hispano");
$pdf=new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);	
//$nombre=$_GET['nombre'];
date_default_timezone_set('America/Los_Angeles');
$fecha = date("Y-m-d H:i:s");  

$pdf->SetTextColor(175,0,0);
$pdf->SetFillColor(175,222,255); 
$pdf->SetTextColor(175,0,0);
$pdf->Ln(12); 
//$pdf->SetX(20); // abscissa or Horizontal position
//$pdf->MultiCell('180','6', utf8_decode ("UNIVERSIDAD HISPANO \n FICHA DE PRE-REGISTRO"),0,'C',false);


//Para poner acentos
$tel= utf8_encode('gustar�a');
$tel2= utf8_encode('Tel�fono celular');
$pdf->SetFont('Arial','B',12);
$pdf->SetX(20); // abscissa or Horizontal position


$pdf->SetFillColor(175,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(185,8,'Informaci�n personal',0,0,'C',1);

$pdf->Ln(8);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->SetFillColor(175,0,0); //color guinda
$pdf->SetTextColor(255,255,255); //color blanco
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,8,'Apellido Paterno',1,0,'C',1);
$pdf->Cell(60,8,'Apellido Materno',1,0,'C',1);
$pdf->Cell(65,8,'Nombre',1,0,'C',1);

$a='olaaaaaaaaaaaaaa';
$b='Holaaaaaaa';
$c='Holaaaaaaaaaa';
$pdf->Ln(8);
$pdf->SetFillColor(255,255,255); //color blanco
$pdf->SetTextColor(23,32,42); // color negro
$pdf->SetFont('Arial','B',8);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->Cell(60,8,utf8_decode ("$cal2"),1,0,'L',1);
$pdf->Cell(60,8,utf8_decode ("$am"),1,0,'L',1);
$pdf->MultiCell(65,8,utf8_decode ("$nombre"),1,0,'L',1);


$pdf->Ln(0);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->SetFillColor(175,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,8,'Edad',1,0,'C',1);
$pdf->Cell(20,8,'Celular',1,0,'C',1);
$pdf->Cell(150,8,'Facebook',1,0,'C',1);


$a='olaaaaaaaaaaaaaa';
$b='Holaaaaaaa';
$c='Holaaaaaaaaaa';
$pdf->Ln(8);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(23,32,42);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->Cell(15,8,"$edad",1,0,'L',1);
$pdf->Cell(20,8,"$cel",1,0,'L',1);
$pdf->MultiCell(150,8,"$fb",1,0,'L',1);


$pdf->Ln(0);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->SetFillColor(175,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(90,8,'Email',1,0,'C',1);
$pdf->Cell(95,8,'Escuela de procedencia',1,0,'C',1);


$a='olaaaaaaaaaaaaaa';
$b='Holaaaaaaa';
$c='Holaaaaaaaaaa';
$pdf->Ln(8);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(23,32,42);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->Cell(90,8,"$mail1",1,0,'L',1);
$pdf->MultiCell(95,8,utf8_decode ("$ep"),1,0,'L',1);


$pdf->Ln(0);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->SetFillColor(175,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(185,8,'Licenciatura a cursar',0,0,'C',1);

$pdf->Ln(8);


$pdf->SetX(20); // abscissa or Horizontal position
$pdf->SetFillColor(175,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,8,'1a. Opci�n',1,0,'C',1);
$pdf->Cell(105,8,'�Que otra licenciatua te gusrar�a en esta u otea escuela?',1,0,'C',1);


$a='olaaaaaaaaaaaaaa';
$b='Holaaaaaaa';
$c='Holaaaaaaaaaa';
$pdf->Ln(8);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(23,32,42);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->Cell(80,8,utf8_decode ("$lac"),1,0,'L',1);
$pdf->MultiCell(105,8,utf8_decode ("$ol"),1,0,'L',1);

$pdf->SetX(20); // abscissa or Horizontal position
$pdf->SetFillColor(175,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(80,8,'Modalidad',1,0,'C',1);
$pdf->Cell(105,8,'Conocimiento de la universidad',1,0,'C',1);

$a='olaaaaaaaaaaaaaa';
$b='Holaaaaaaa';
$c='Holaaaaaaaaaa';
$pdf->Ln(8);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(23,32,42);
$pdf->SetFont('Arial','B',8);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->Cell(80,8,"$mod",1,0,'L',1);
$pdf->MultiCell(105,8,utf8_decode ("$cu"),1,0,'L',1);

$pdf->Ln(0);
$pdf->SetX(20); // abscissa or Horizontal position
$pdf->SetFillColor(175,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(185,8,'Para el proceso de inscripci�n deber� presentar la siguiente documentaci�n ',0,0,'C',1);

$pdf->Ln(8);


$pdf->SetX(20); // abscissa or Horizontal position
$pdf->SetFillColor(175,0,0);
$pdf->SetTextColor(255,255,255);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(23,32,42);
$pdf->MultiCell(185,8, "* Acta de nacimiento (Original y 2 copias)  * Certificado de Bachillerato (Original y 2 copias)  * CURP (2 copias) * Comprobante de domicilio (Si es for�neo deber� presentar una constancia de vecindad junto con el comprrobante de dimiclio) * 3 Fotograf�a tama�o infantil B/N",1,'J',false);

/*$pdf->SetTextColor(175,0,0);
$pdf->MultiCell('180','5', utf8_decode ("\n$tel2: cel \nApellido paterno: ap \nApellido materno: am \nNombre: nombre \nEscuela de procedencia: ep\nFacebook: fb \nCorreo: mail1,\nLicenciatura a cursar: lac\nOtra licenciatura que te tel en esta u otra escuela: ol\nModalidad: mod\nConocimiento de la universidad: cu\nFecha de captura: fecha\n\n"),0,'L',false);*/
$pdf->Ln(2); 
$pdf->SetX(30); 
$pdf->MultiCell(130,10, $pdf->Image('pre55.jpg', $pdf->GetX(), $pdf->GetY(),160,80),0);
$pdf->SetX(20); 
$pdf->Ln(72); 
$string="                                          $nombre  $ap $am                            Instituto Tecnolofico de Tuxtepec";
$pdf->MultiCell(180,8,utf8_decode ($string));



//$pdf->Output('kardex.pdf','D');
$pdf->Output("fichaspre/$nombre $ap $am.pdf",'F');
$pdf->Output("hola.pdf",'D');
//echo "<script language='javascript'>window.open('$nombre$ap$am.pdf','_blank','');</script>";//para ver el archivo pdf generado


	}
	

	
?>

<script type="text/javascript">
	alert("�� Felicidades en breve \n nos pondremos en contacto!!");
	window.location.href='index.php';
</script>
