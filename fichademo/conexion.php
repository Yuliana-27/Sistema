<?php
	$conexion= new mysqli("localhost", "root", "", "crud");
	
	if(mysqli_connect_errno())
	{
		printf("Fallo la conexion");
	}
	else {
		//printf("Estas conectado");
	}
	
?>