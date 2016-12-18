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
            var pass = document.getElementById("registro_pass").value;
            var pass_rep = document.getElementById("registro_pass_rep").value;
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
    echo "<div class='row'>";
        echo "<div class='col-md-3'></div>";
        echo "<div class='col-md-6'>";

                echo "<div class='well'>";
                    echo "<center><h2>La CutreFloristeria</h2></center>";
                echo "</div>";

                
                echo "<form id='formulario_login' class='form-horizontal' action='registro.php' method='POST'>";

                echo "<div class='well'>";
                        echo "<fieldset><legend><h2>Registrar usuario</h2></legend>";
                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='registro_nombre'>Nombre: </label>";
                            echo "<input class='form-control' type='text' id='registro_nombre' name='registro_nombre' value='' size='20' maxlength='50' required placeholder='Nombre'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label for='registro_apellidos' class='control-label'>Apellidos: </label>"; 
                            echo "<input class='form-control' type='text' id='registro_apellidos' name='registro_apellidos' value='' size='40' maxlength='100' required placeholder='Apellidos'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='registro_usuario'>Usuario </label>";
                            echo "<input class='form-control' type='text' id='registro_usuario' name='registro_usuario' value='' size='20' maxlength='50' required placeholder='Usuario o email'>";
                        echo "</div>";

                        echo "<div class='form-group'>";
                            echo "<label class='control-label' for='registro_correo'>Direccion de correo: </label>";
                            echo "<input class='form-control glyphicon-envelope' onclick='copia_correo()' type='text' id='registro_correo' name='registro_correo' value='' maxlength='100' required placeholder='Dirección de correo'>";
                        echo "</div>";

                        echo "<div class='form-group'>";
                            echo "<label class='control-label' for='cuenta_pass'>Contraseña: </label>";
                            echo "<input class='form-control' oninput='comprueba_pass()' type='password' id='registro_pass' name='registro_pass' value='' size='40' maxlength='100' required placeholder='Introducir contraseña'>";
                        echo "</div>";

                        echo "<div class='form-group' id='error_pass'>";
                            echo "<label class='control-label' for='registro_pass_rep'>Repetir contraseña: </label>";
                            echo "<input class='form-control' oninput='comprueba_pass()' type='password' id='registro_pass_rep' name='registro_pass_rep' value=''  value='' size='40' maxlength='100' required placeholder='Repetir contraseña'>";
                            echo "<div style='color:red;font-style:italic' id='error_pass_texto'></div>";         
                        echo "</div>";
                echo "</div>";
                
                 echo "<div class='well'>";           
                        echo "<fieldset>";             
                        echo "<div class='col-md-1'></div>";
                        echo "<div class='col-md-10'>";
                            echo "<center>";
                            echo "<input class='btn-lg' type='submit' name='registrar' value='Registrar'></center>";
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