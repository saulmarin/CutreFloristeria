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
   
<?php
    echo "<div class='row'>";
        echo "<div class='col-md-3'></div>";
        echo "<div class='col-md-6'>";
                echo "<br><br><br><br><br><br><br><br>";
                echo "<div class='well'>";
                    echo "<center><h2>La CutreFloristeria</h2></center>";
                echo "</div>";

                echo "<form id='formulario_login' class='form-horizontal' action='login.php' method='POST'>";

                echo "<div class='well'>";
                    echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='login_user'>Usuario </label>";
                            echo "<input class='form-control' type='text' id='login_user' name='login_user' value='' size='20' maxlength='50' required placeholder='Usuario o email'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label for='fac_apellidos' class='control-label'>Contraseña </label>"; 
                            echo "<input class='form-control' type='password' id='login_pass' name='login_pass' value='' size='40' maxlength='100' required placeholder='Contraseña'>";
                        echo "</div>";
                echo "</div>";

                 echo "<div class='well'>";           
                        echo "<fieldset>";             
                        echo "<div class='col-md-1'></div>";
                        echo "<div class='col-md-10'>";
                            echo "<a><center><input class='btn-lg' type='submit' name='enviar' value='Acceder'></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                            echo "<a href='formulario_registro.php'><input class='btn-lg' type='button' name='registrar' value='Registrar'></a></center>";
                        echo "</div>";
                        echo "<div class='col-md-1'></div>";
                        echo "</fieldset>";
                echo "</div>";

                /*echo "<div class='well'>";           
                        echo "<a href='panel_admin.php'>Administrar</a>";
                    echo "</div>";*/

                echo "</form>";
        echo "</div>"; //segunda columna
        echo "<div class='col-md-3'></div>";
    echo "</div>"; //row
    ?>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js"></script>  
    </body>
</html>