<?php
    $nombre = $_POST["registro_nombre"];
    $apellidos = $_POST["registro_apellidos"];
    $usuario = $_POST["registro_usuario"];
    $correo = $_POST["registro_correo"];
    $password = $_POST["registro_pass"];

    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password) or die("error connect");
    mysqli_select_db($conexion, $db_database)or die("error db");
    mysqli_set_charset($conexion, "utf8");

    $consulta = "INSERT INTO usuarios (nombre,apellidos,usuario,correo,password) VALUES ('$nombre','$apellidos','$usuario','$correo','$password')";
    $resultado = mysqli_query($conexion, $consulta);
    header("location: index.php");
?>