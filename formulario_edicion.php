<!DOCTYPE html>
<html lang="en">
    <head>
        <title>La CutreFloristeria</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body onload="calcula_dias()">
<script>
        function comprueba_pass(){
            var pass = document.getElementById("edicion_pass").value;
            var pass_rep = document.getElementById("edicion_pass_rep").value;
            if(pass == pass_rep){ 
                var clase = document.getElementById("error_pass").classList;
                clase.remove("has-error");
                clase.add("has-success");
                clase.add("has-feedback"); 
                document.getElementById("error_pass_texto").innerHTML = "";           
            }else{
                var clase = document.getElementById("error_pass").classList;
                clase.add("has-error");
                clase.add("has-feedback");
                document.getElementById("error_pass_texto").innerHTML = "Las contraseñas no coinciden"; 
            }
        }
</script>
<?php

    session_start();
    $id_usuario = $_SESSION["userId"];
    require("conexion.php");
        
    $conexion = mysqli_connect($db_host, $db_user, $db_password) or die("error connect");
    mysqli_select_db($conexion, $db_database)or die("error db");
    mysqli_set_charset($conexion, "utf8");

    $consulta = "SELECT * FROM usuarios WHERE usuarios.id='$id_usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    $fila = mysqli_fetch_array($resultado);



    echo "<div class='row'>";
        echo "<div class='col-md-3'></div>";
        echo "<div class='col-md-6'>";

                echo "<div class='well'>";
                    echo "<center><h2>La CutreFloristeria</h2></center>";
                echo "</div>";

                echo "<div class='well'>";
                    echo "<a href='formulario_pedido.php'>Volver</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<a style='position:absolute;' href='login.php'>Salir</a>";
                echo "</div>";
                
                echo "<form id='formulario_login' class='form-horizontal' action='edicion.php' method='POST'>";

                echo "<div class='well'>";
                        echo "<fieldset><legend><h2>Editar usuario</h2></legend>";
                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='edicion_nombre'>Nombre: </label>";
                            echo "<input class='form-control' type='text' id='edicion_nombre' name='edicion_nombre' value='".$fila['nombre']."' size='20' maxlength='50' required placeholder='Nombre'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label for='edicion_apellidos' class='control-label'>Apellidos: </label>"; 
                            echo "<input class='form-control' type='text' id='edicion_apellidos' name='edicion_apellidos' value='".$fila["apellidos"]."' size='40' maxlength='100' required placeholder='Apellidos'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='edicion_usuario'>Usuario </label>";
                            echo "<input class='form-control' type='text' id='edicion_usuario' name='edicion_usuario' value='".$fila["usuario"]."' size='20' maxlength='50' required placeholder='Usuario o email'>";
                        echo "</div>";

                        echo "<div class='form-group'>";
                            echo "<label class='control-label' for='edicion_correo'>Direccion de correo: </label>";
                            echo "<input class='form-control glyphicon-envelope' onclick='copia_correo()' type='text' id='edicion_correo' name='edicion_correo' value='".$fila["correo"]."' maxlength='100' required placeholder='Dirección de correo'>";
                        echo "</div>";

                        echo "<div class='form-group'>";
                            echo "<label class='control-label' for='cuenta_pass'>Contraseña: </label>";
                            echo "<input class='form-control' oninput='comprueba_pass()' type='password' id='edicion_password' name='edicion_password' value='' size='40' maxlength='100' required placeholder='Introducir contraseña'>";
                        echo "</div>";

                        echo "<div class='form-group' id='error_pass'>";
                            echo "<label class='control-label' for='edicion_pass_rep'>Repetir contraseña: </label>";
                            echo "<input class='form-control' oninput='comprueba_pass()' type='password' id='edicion_pass_rep' name='edicion_pass_rep' value=''  value='' size='40' maxlength='100' required placeholder='Repetir contraseña'>";
                            echo "<div style='color:red;font-style:italic' id='error_pass_texto'></div>";         
                        echo "</div>";
                echo "</div>";
                
                 echo "<div class='well'>";           
                        echo "<fieldset>";             
                        echo "<div class='col-md-1'></div>";
                        echo "<div class='col-md-10'>";
                            echo "<center>";
                            echo "<input class='btn-lg' type='submit' name='edicion' value='Actualizar perfil'></center>";
                        echo "</div>";
                        echo "<div class='col-md-1'></div>";
                        echo "</fieldset>";
                    echo "</div>";
                echo "</form>";
        echo "</div>"; //segunda columna
        echo "<div class='col-md-3'></div>";
    echo "</div>"; //row
    ?>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js"></script>  
    </body>
</html>