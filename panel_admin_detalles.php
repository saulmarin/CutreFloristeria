<!DOCTYPE html>
<html lang="en">
    <head>
        <title>La CutreFloristeria</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <script>
        function edicion_on(){
            document.getElementById('wrapper_editar_off').style.display = 'none';
            document.getElementById('editar_off').style.display = 'none';

            document.getElementById('wrapper_editar_on').style.display = 'block';
            document.getElementById('editar_on').style.display = 'block';
        }

        function edicion_off(){
            document.getElementById('wrapper_editar_off').style.display = 'block';
            document.getElementById('editar_off').style.display = 'block';

            document.getElementById('wrapper_editar_on').style.display = 'none';
            document.getElementById('editar_on').style.display = 'none';
        }
    </script>
   
<?php
    echo "<div class='row'>";
        echo "<div class='col-md-1'></div>";


        echo "<div class='col-md-10'>";

            echo "<div class='well'>";
                echo "<center><h2>La CutreFloristeria</h2></center>";
            echo "</div>";

            echo "<div class='well'>";
                echo "<a href='panel_admin.php'>Volver</a>&nbsp&nbsp&nbsp&nbsp<a href='login.php'>Salir</a><br>";
            echo "</div>";

            echo "<div class='panel-body'>";
                echo "<center id='wrapper_editar_off'><a onclick='edicion_on();'>Editar pedido</a></center>";
                echo "<center id='wrapper_editar_on' style='display:none;'><a onclick='edicion_off();'>Cancelar edición</a></center>";
                echo "<br>";
                //echo "<center><table class='table-striped' style='width:30%;>";
                    //echo "<tbody class='table-hover'>";
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
                            $consulta = "SELECT usuarios.usuario as usuario,
                                                usuarios.correo as correo,
                                                pedido_cabeceras.fac_nombre as c_nombre,
                                                pedido_cabeceras.fac_apellidos as c_apellidos,
                                                pedido_cabeceras.fac_direccion as c_direccion,
                                                pedido_cabeceras.fac_ciudad as c_ciudad,
                                                pedido_cabeceras.fac_provincia as c_provincia,
                                                pedido_cabeceras.fac_telefono as c_telefono,
                                                pedido_cabeceras.fecha_envio as c_fenv,
                                                pedido_cabeceras.fecha_fac as c_ffact,
                                                pedido_cabeceras.tarjeta_num as c_tarjeta,
                                                pedido_envios.env_nombre as e_nombre,
                                                pedido_envios.env_apellidos as e_apellidos,
                                                pedido_envios.env_direccion as e_direccion,
                                                pedido_envios.env_ciudad as e_ciudad,
                                                pedido_envios.env_provincia as e_provincia,
                                                pedido_envios.env_telefono as e_telefono,
                                                mensajes.contenido as mensaje,
                                                mensajes.precio as precio,
                                                pedido_lineas.personalizado as personalizado
                                        FROM pedido_cabeceras
                                        JOIN usuarios ON pedido_cabeceras.id_usuario = usuarios.id
                                        JOIN pedido_lineas ON pedido_lineas.id_pedido = pedido_cabeceras.id
                                        JOIN mensajes ON pedido_lineas.id_mensaje = mensajes.id
                                        JOIN pedido_envios ON pedido_envios.id_cabecera = pedido_cabeceras.id
                                        WHERE pedido_cabeceras.id = '$id'";
                        }else{
                            $consulta = "SELECT usuarios.usuario as usuario,
                                                usuarios.correo as correo,
                                                pedido_cabeceras.fac_nombre as c_nombre,
                                                pedido_cabeceras.fac_apellidos as c_apellidos,
                                                pedido_cabeceras.fac_direccion as c_direccion,
                                                pedido_cabeceras.fac_ciudad as c_ciudad,
                                                pedido_cabeceras.fac_provincia as c_provincia,
                                                pedido_cabeceras.fac_telefono as c_telefono,
                                                pedido_cabeceras.fecha_envio as c_fenv,
                                                pedido_cabeceras.fecha_fac as c_ffact,
                                                pedido_cabeceras.tarjeta_num as c_tarjeta,
                                                pedido_cabeceras.fac_nombre as e_nombre,
                                                pedido_cabeceras.fac_apellidos as e_apellidos,
                                                pedido_cabeceras.fac_direccion as e_direccion,
                                                pedido_cabeceras.fac_ciudad as e_ciudad,
                                                pedido_cabeceras.fac_provincia as e_provincia,
                                                pedido_cabeceras.fac_telefono as e_telefono,
                                                mensajes.contenido as mensaje,
                                                mensajes.precio as precio,
                                                pedido_lineas.personalizado as personalizado
                                        FROM pedido_cabeceras
                                        JOIN usuarios ON pedido_cabeceras.id_usuario = usuarios.id
                                        JOIN pedido_lineas ON pedido_lineas.id_pedido = pedido_cabeceras.id
                                        JOIN mensajes ON pedido_lineas.id_mensaje = mensajes.id
                                        WHERE pedido_cabeceras.id = '$id'";
                        }  

                        $resultado = mysqli_query($conexion, $consulta);
                        $num_rows = mysqli_num_rows($resultado);
                        if ($num_rows > 0){
                            while($row=mysqli_fetch_array($resultado)){
                                echo "<div id='editar_off' style='display:block;'>";
                                    include("editar_off.php");
                                echo "</div>";
                                echo "<div id='editar_on' style='display:none;'>";
                                    include("editar_on.php");
                                echo "</div>";
                            }
                        }

            echo "</div>";

        echo "</div>"; //segunda columna



        echo "<div class='col-md-1'></div>";
    echo "</div>"; //row
    ?>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js"></script>  
    </body>
</html>