<?php
    $mensaje = $_POST["mensaje"];
    $mensaje_area = $_POST["mensaje_area"];
    $checkbox_mensaje = $_POST["mensaje_personalizado"];

    $fac_nombre = $_POST["fac_nombre"];
    $fac_apellidos = $_POST["fac_apellidos"];
    $fac_direccion = $_POST["fac_direccion"];
    $fac_ciudad = $_POST["fac_ciudad"];
    $fac_cp = $_POST["fac_cp"];
    $fac_provincia = $_POST["fac_provincia"];
    $fac_telefono = $_POST["fac_telefono"];
    $fac_correo = $_POST["fac_correo"];

    $env_nombre = $_POST["env_nombre"];
    $env_apellidos = $_POST["env_apellidos"];
    $env_direccion = $_POST["env_direccion"];
    $env_ciudad = $_POST["env_ciudad"];
    $env_cp = $_POST["env_cp"];
    $env_provincia = $_POST["env_provincia"];
    $env_telefono = $_POST["env_telefono"];
    $env_correo = $_POST["env_correo"];

    $fecha_dia = $_POST["fecha_dia"];
    $fecha_mes = $_POST["fecha_mes"];
    $fecha_ano = $_POST["fecha_ano"];

    $fecha_envio = "'".$fecha_ano."-".$fecha_mes."-".$fecha_dia."'";

    echo $fecha_envio;

    $pago_tarjeta = $_POST["tarjeta"];
    $pago_numero = $_POST["pago_numero"];
    $pago_mes = $_POST["pago_mes"];
    $pago_ano = $_POST["pago_ano"];
    $pago_ccv = $_POST["pago_ccv"];

    /*$cuenta_correo = $_POST["cuenta_correo"];
    $cuenta_pass = $_POST["cuenta_pass"];
    $cuenta_pass_rep = $_POST["cuenta_pass_rep"];*/
    
    $checkbox = $_POST["fac_igual_env"];
    session_start();
    $id_usuario = $_SESSION["userId"];

    require("conexion.php");
    $conexion = mysqli_connect($db_host, $db_user, $db_password) or die("error connect");
    mysqli_select_db($conexion, $db_database)or die("error db");
    mysqli_set_charset($conexion, "utf8");

    $insert_pedido = "INSERT INTO pedido_cabeceras(fac_nombre,fac_apellidos,fac_direccion,fac_ciudad,fac_cp,fac_provincia,fac_telefono,fac_correo,fecha_fac,fecha_envio,tarjeta_tipo,tarjeta_num,tarjeta_mes,tarjeta_ano,tarjeta_ccv,id_usuario) VALUES ('".$fac_nombre."','".$fac_apellidos."','".$fac_direccion."','".$fac_ciudad."','".$fac_cp."','".$fac_provincia."','".$fac_telefono."','".$fac_correo."',now(),".$fecha_envio.",'$pago_tarjeta','$pago_numero','$pago_mes','$pago_ano','$pago_ccv','$id_usuario')";

    $resultado = mysqli_query($conexion, $insert_pedido);
    $id_cabecera = mysqli_insert_id($conexion);

    if ($checkbox != 1){
        $insert_envio = "INSERT INTO pedido_envios(env_nombre,env_apellidos,env_direccion,env_ciudad,env_cp,env_provincia,env_telefono,env_correo,id_cabecera) VALUES ('$env_nombre','$env_apellidos','$env_direccion','$env_ciudad','$env_cp','$env_provincia','$env_telefono','$env_correo','$id_cabecera')";
        $resultado2 = mysqli_query($conexion, $insert_envio);
    }


    if ($checkbox_mensaje == 1){
        $insert_mensaje = "INSERT INTO pedido_lineas(id_mensaje, personalizado, id_pedido) VALUES ('999','$mensaje_area','$id_cabecera')";
    }else{
        $insert_mensaje = "INSERT INTO pedido_lineas(id_mensaje, id_pedido) VALUES ('$mensaje','$id_cabecera')";
    }
    $resultado3 = mysqli_query($conexion, $insert_mensaje);

    if($resultado){
        mysqli_close($conexion);
        header("location:formulario_pedido.php");
    }else{
        header("location:formulario_pedido.php");
    }

?>