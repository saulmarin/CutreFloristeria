<?php
    $usuario = $_POST["login_user"];
    $password = $_POST["login_pass"];
    session_start();

    require("conexion.php");
        
    $conexion = mysqli_connect($db_host, $db_user, $db_password) or die("error connect");
    mysqli_select_db($conexion, $db_database)or die("error db");
    mysqli_set_charset($conexion, "utf8");

    $consulta = "SELECT * FROM usuarios WHERE usuarios.usuario='$usuario' AND usuarios.password='$password'";
    $resultado = mysqli_query($conexion, $consulta);

    $filas=mysqli_num_rows($resultado);
    
    if($filas > 0){
        $row = mysqli_fetch_array($resultado);
        $_SESSION["user"] = $usuario;
        $_SESSION["userId"] = $row["id"];
        $_SESSION["nombre"] = $row["nombre"];
        mysqli_close($conexion);
        if($row["nombre"]=="admin"){
            header("location:panel_admin.php");
        }else{
            header("location: formulario_pedido.php");
        }
    }else{
        mysqli_close($conexion);
        header("location:index.php");
    }

?>