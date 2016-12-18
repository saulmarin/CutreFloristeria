<?php

        $id = $_GET["id"];
        session_start();
        $iduser = $_SESSION["userId"];
        require("conexion.php");
        $conexion = mysqli_connect($db_host, $db_user, $db_password) or die("error connect");
        mysqli_select_db($conexion, $db_database)or die("error db");
        mysqli_set_charset($conexion, "utf8");

        $envio_distinto = "SELECT * FROM pedido_cabeceras
                            JOIN pedido_envios ON pedido_envios.id_cabecera = pedido_cabeceras.id 
                            WHERE pedido_cabeceras.id = '$id'";
        $ejecucion = mysqli_query($conexion, $envio_distinto);
        $num_filas = mysqli_num_rows($ejecucion);
        if ($num_filas>0){
            //DROP EN CABECERA Y ENVIO
            $delete_envio = "DELETE FROM pedido_envios WHERE id_cabecera = '$id'";
            $resultado = mysqli_query($conexion, $delete_envio); 
        }

        $delete_cabecera = "DELETE FROM pedido_cabeceras WHERE id = '$id';";
        $delete_mensaje = " DELETE FROM pedido_lineas WHERE id_pedido = '$id'";
        $resultado = mysqli_query($conexion, $delete_cabecera);  
        $resultado = mysqli_query($conexion, $delete_mensaje);  
        header("location:panel_admin.php");
    ?>