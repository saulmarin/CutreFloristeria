<?php
    session_start();
    $id_usuario = $_SESSION["userId"];

    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password) or die("error connect");
    mysqli_select_db($conexion, $db_database)or die("error db");
    mysqli_set_charset($conexion, "utf8");

    $id_cabecera = $_GET["id"];
    $id_mensaje = $_POST["mensaje"];
    $mensaje_area = $_POST["mensaje_area"];

    $fac_nombre = $_POST["fac_nombre"];
    $fac_apellidos = $_POST["fac_apellidos"];
    $fac_direccion = $_POST["fac_direccion"];
    $fac_ciudad = $_POST["fac_ciudad"];
    $fac_provincia = $_POST["fac_provincia"];
    $fac_telefono = $_POST["fac_telefono"];
    $pago_numero = $_POST["fac_tarjeta"];

    $env_nombre = $_POST["env_nombre"];
    $env_apellidos = $_POST["env_apellidos"];
    $env_direccion = $_POST["env_direccion"];
    $env_ciudad = $_POST["env_ciudad"];
    $env_cp = $_POST["env_cp"];
    $env_provincia = $_POST["env_provincia"];
    $env_telefono = $_POST["env_telefono"];
    $fecha_envio = $_POST["fecha_envio"];
    $insertdate = date('Y-m-d', strtotime($_POST['fecha_envio']));

////////// UPDATE DE LA PARTE DE MENSAJES
    if($id_mensaje<999){
      $update_mensaje = "UPDATE pedido_lineas SET id_mensaje = '$id_mensaje', personalizado = NULL WHERE pedido_lineas.id_pedido = '$id_cabecera'";
    }else{
      $update_mensaje = "UPDATE pedido_lineas SET id_mensaje = '$id_mensaje', personalizado = '$mensaje_area' WHERE pedido_lineas.id_pedido = '$id_cabecera'";
    }
    $resultado_mensaje = mysqli_query($conexion,$update_mensaje);
//////////


////////// UPDATE DE LA PARTE DE ENVIO

    $check_pedido_envio = "SELECT id FROM pedido_envios WHERE id_cabecera = '$id_cabecera'";
    $ejecuta_check = mysqli_query($conexion,$check_pedido_envio);
    $registros_check = mysqli_num_rows($ejecuta_check);

    $factura = array ($fac_nombre, $fac_apellidos, $fac_direccion, $fac_ciudad, $fac_provincia, $fac_telefono);
    $envio = array ($env_nombre, $env_apellidos, $env_direccion, $env_ciudad, $env_provincia, $env_telefono);
    if ($registros_check > 0){      
      if ($factura === $envio){
        $update_envio = "DELETE FROM pedido_envios WHERE id_cabecera = '$id_cabecera'";
      }else{ 
        $update_envio = "UPDATE pedido_envios SET
                            env_nombre='$env_nombre',
                            env_apellidos='$env_apellidos',
                            env_direccion='$env_direccion',
                            env_ciudad='$env_ciudad',
                            env_provincia='$env_provincia',
                            env_telefono='$env_telefono'
                        WHERE id_cabecera = '$id_cabecera'";
      }
    }else{
      if ($factura === $envio){
        // NO SE REALIZA NINGUNA ACCION
        $update_envio = "";
      }else{
        //SE INSERTA UN REGISTRO DE ENVIO YA QUE LOS DATOS DE EDICION SON DISTINTOS Y NO HAY UN REGISTRO DE ENVIO PREVIO
        $update_envio = "INSERT INTO pedido_envios (env_nombre,env_apellidos,env_direccion,env_ciudad,env_provincia,env_telefono,id_cabecera)
                         VALUES ('$env_nombre','$env_apellidos','$env_direccion','$env_ciudad','$env_provincia','$env_telefono','$id_cabecera')";
      }
    }

    $resultado_envio = mysqli_query($conexion,$update_envio);



/////////  



////////// UPDATE DE LA PARTE DE FACTURACION
    $update_fact = "UPDATE pedido_cabeceras SET
                        fac_nombre='$fac_nombre',
                        fac_apellidos='$fac_apellidos',
                        fac_direccion='$fac_direccion',
                        fac_ciudad='$fac_ciudad',
                        fac_provincia='$fac_provincia',
                        fac_telefono='$fac_telefono',
                        tarjeta_num='$pago_numero',
                        fecha_envio='$insertdate'
                    WHERE id = '$id_cabecera'";
    $resultado_fact = mysqli_query($conexion, $update_fact);

//////////
    header("location:panel_admin_detalles?id=$id_cabecera");

?>