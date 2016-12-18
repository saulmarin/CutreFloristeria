<?php
    session_start();

    $id = $_SESSION["userId"];

    $nombre = $_POST["edicion_nombre"];
    $apellidos = $_POST["edicion_apellidos"];
    $usuario = $_POST["edicion_usuario"];
    $correo = $_POST["edicion_correo"];
    $password = $_POST["edicion_password"];

    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password) or die("error connect");
    mysqli_select_db($conexion, $db_database)or die("error db");
    mysqli_set_charset($conexion, "utf8");

    $consulta = "UPDATE usuarios SET 
                    nombre='$nombre',
                    apellidos='$apellidos',
                    usuario='$usuario',
                    correo='$correo',
                    password='$password'
                 WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $consulta);

    header("location: formulario_pedido.php");
?>