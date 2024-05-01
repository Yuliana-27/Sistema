<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) ||empty($_POST["txtNum_control"]) || empty($_POST["txtCarrera"]) || empty($_POST["txtTurno"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $num_control = $_POST["txtNum_control"];
    $carrera = $_POST["txtCarrera"];
    $turno = $_POST["txtTurno"];
    
    $sentencia = $bd->prepare("INSERT INTO persona(nombre,num_control,carrera,turno) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$num_control,$carrera,$turno]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>