<?php
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('SRA0');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

 $conexion = mysql_connect("localhost", "root", "");
mysql_select_db("egresados", $conexion);
$queEmp = "SELECT * FROM activo where serialemp2='Lic. Pedagogia'ORDER BY serialemp3 ASC";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'serialemp'=>'<b>No. Matrícula</b>',
				'serialemp2'=>'<b>Licenciatura</b>',
				'serialemp3'=>'<b>Ap. Paterno</b>',
				'serialemp4'=>'<b>Ap. Materno</b>',
				'serialemp5'=>'<b>Nombre(s)</b>',
				'serialemp6'=>'<b>Municipio</b>',
				'serialemp7'=>'<b>estado</b>',
				'serialemp8'=>'<b>fech Nac</b>',
				'serialemp9'=>'<b>Sexo</b>',
				'serialemp10'=>'<b>Nacionalidad</b>',
				'serialemp11'=>'<b>Nac. Otra</b>',
				'serialemp12'=>'<b>Calle</b>',
				'serialemp13'=>'<b>Núm. Ext.</b>',
				'serialemp14'=>'<b>Núm. Int.</b>',
				'serialemp15'=>'<b>Colonia</b>',
				'serialemp16'=>'<b>Ciudad</b>',
				'serialemp17'=>'<b>Estado</b>',
				'serialemp18'=>'<b>C.P.</b>',
				'serialemp19'=>'<b>Tel. Domicilio</b>',
				'serialemp20'=>'<b>Tel. Celular</b>',
				'serialemp21'=>'<b>Correo Electrónico</b>',
				'serialemp22'=>'<b>Calle</b>',
				'serialemp23'=>'<b>Núm Ext.</b>',
				'serialemp24'=>'<b>Núm. Int.</b>',
				'serialemp25'=>'<b>Colonia</b>',
				'serialemp26'=>'<b>Ciudad</b>',
				'serialemp27'=>'<b>C.P.</b>',
				'serialemp28'=>'<b>Tel. Dom.</b>',
				'serialemp28'=>'<b>Tel. Cel.</b>',
				'serialemp30'=>'<b>Escuela</b>',
				'serialemp31'=>'<b>Carrera</b>',
				'serialemp32'=>'<b>Modalidad</b>',
				'serialemp33'=>'<b>Mpio. Egreso</b>',
				'serialemp34'=>'<b>Fecha de Ingreso</b>',
				'serialemp35'=>'<b>Fecha de Egreso</b>',
				'serialemp36'=>'<b>Insitución que labora</b>',
				'serialemp37'=>'<b>Dependencia</b>',
				'serialemp38'=>'<b>Departamento</b>',
				'serialemp39'=>'<b>calle</b>',
				'serialemp40'=>'<b>Número</b>',
				'serialemp41'=>'<b>colonia</b>',
				'serialemp42'=>'<b>C.P.</b>',
				'serialemp43'=>'<b>Ciudad</b>',
				'serialemp44'=>'<b>Teléfono</b>',
				'serialemp45'=>'<b>Extensión</b>',
				'serialemp46'=>'<b>Puesto</b>',
				'serialemp47'=>'<b>Antigüedad</b>',
				'serialemp48'=>'<b>Nombre / Teléfono</b>',
				'serialemp49'=>'<b>Nombre / Teléfono</b>',
				'serialemp50'=>'<b>Nombre / Teléfono</b>',
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'setColor'=>array(0.8,0.8,0.8),
				'textCol'=>array(0,0,0),
				'width'=>2530
			);
$txttit = "<b>SEGUIMIENTO DE EGRESADOS</b>\n";
$pdf->ezImage("1.jpg", 0, 500, 'none', 'center');
$pdf->ezText($txttit, 12);
$pdf->setColor(1,0,0);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
ob_end_clean();
$pdf->ezStream();//abrir el pdf de forma automatica
$output = $pdf->ezOutput(); //Salida de archivo
file_put_contents('mipdf.pdf', $output); //guardar en el server
?>