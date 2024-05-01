<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
        
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $num_control = $_POST['txtNum_control'];
    $carrera = $_POST['txtCarrera'];
    $turno = $_POST['txtTurno'];
    
    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, num_control = ?, carrera = ?, turno = ? where codigo = ?");
    $resultado = $sentencia->execute([$nombre, $num_control, $carrera, $turno, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>