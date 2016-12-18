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
    <!-- Se trata de un formulario que va a constar de 6 framesets. 
    Es una floristeria. 
    1- Mensaje
            Nos va a permitir poner un mensaje para una tarjeta.
            5 Checkbox con 4 mensajes distintos. El 5 pone mensaje personalizado y un textarea para poner lo que sea. 
            Tendra un placeholder diciendo que solo puede escribir 200 caracteres.

    2- Dirección de facturación
            Datos:
                Nombre
                Apellidos
                Direccion
                Ciudad
                CP
                Provincia (SELECT)
                Teléfono
                correo

    3- Dirección de envío
            Datos:
                Checkbox con "igual que la dirección de facturación" que rellene automaticamente los datos si se marca.
                Nombre
                Apellidos
                Direccion
                Ciudad
                CP
                Provincia (SELECT)
                Teléfono
                correo

    4- Fecha de envío
            SELECT mes
            SELECT dia
            SELECT año

    5- Forma de pago
            RadioButton
                VISA
                MASTERCARD
                AMERICAN EXPRESS
            TEXT Numero de tarjeta de credito
            SELECT mes_caducidad
            SELECT año_caducidad
            TEXT CCV (3 digitos)
    
    6- Crear cuenta
            "Para poder realizar el pedido debe crear una cuenta"
            TEXT usuario (correo)
            PASS password
            PASS password (repeticion)

    BOTON CON ENVIAR PEDIDO !-->
<!--<frame> </frame>!-->

    <script>
        function mensaje_activar(){
            var estado = document.getElementById("mensaje_area").disabled;
            var mensajes = 4;
            if (estado == true){
                document.getElementById("mensaje_area").disabled = false;
                for(i=1;i<=mensajes;i++){
                    document.getElementById("mensaje"+i).disabled = true;
                    document.getElementById("mensaje"+i).checked = false;
                }
            }else{
                document.getElementById("mensaje_area").disabled = true;
                document.getElementById("mensaje_area").value = "";
                for(i=1;i<=mensajes;i++){
                    document.getElementById("mensaje"+i).disabled = false;
                }
            }
        }

        function envio_facturacion_datos(){
            var estado = document.getElementById("fac_igual_env").checked;
            if( estado == true){
                document.getElementById("env_nombre").value = document.getElementById("fac_nombre").value;
                document.getElementById("env_apellidos").value = document.getElementById("fac_apellidos").value;
                document.getElementById("env_direccion").value = document.getElementById("fac_direccion").value;
                document.getElementById("env_ciudad").value = document.getElementById("fac_ciudad").value;
                document.getElementById("env_cp").value = document.getElementById("fac_cp").value;
                document.getElementById("env_provincia").value = document.getElementById("fac_provincia").value;
                document.getElementById("env_telefono").value = document.getElementById("fac_telefono").value;
                document.getElementById("env_correo").value = document.getElementById("fac_correo").value;
            }else{
                document.getElementById("env_nombre").value = "";
                document.getElementById("env_apellidos").value = "";
                document.getElementById("env_direccion").value = "";
                document.getElementById("env_ciudad").value = "";
                document.getElementById("env_cp").value = "";
                document.getElementById("env_provincia").value = "almeria";
                document.getElementById("env_telefono").value = "";
                document.getElementById("env_correo").value = "";
            }

        }


        function copia_correo(){
            document.getElementById("cuenta_correo").value = document.getElementById("fac_correo").value;
        }


        function comprueba_pass(){
            var pass = document.getElementById("cuenta_pass").value;
            var pass_rep = document.getElementById("cuenta_pass_rep").value;
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

        /*$("cuenta_pass_rep").onchange(function(){
                    $("cuenta_pass_rep").addClass("glyphicon");
                    $("cuenta_pass_rep").addClass("glyphicon-remove");
                    $("cuenta_pass_rep").addClass("form-control-feedback");
        });*/

        function calcula_dias(){
            document.getElementById("fecha_dia").options.length = 0;
            var mes_grande = ["1","3","5","7","8","10","12"];
            var mes_actual = document.getElementById("fecha_mes").value;
            var es_mes_grande = mes_grande.indexOf(mes_actual);
            var dias = 0;
            var ano = document.getElementById("fecha_ano").value;
            var bisiesto = ano%4;
            
            if( es_mes_grande >= 0){
                dias = 31;                
            }else{
                dias = 30;   
            }
            if(mes_actual=="2"){
                dias = 28;
                if(mes_actual=="2" && bisiesto==0){
                    dias = 29;            
                }                
            }
            for ($i=1; $i <= dias; $i++) { 
                var desplegable = document.getElementById("fecha_dia");
                var opcion = document.createElement("option");
                opcion.text = $i;
                desplegable.options.add(opcion,$i);
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

                echo "<div class='well'>";
                    echo "<a href='formulario_edicion.php'>Editar perfil</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<a style='position:absolute;' href='login.php'>Salir</a>";
                echo "</div>";

                echo "<form id='formulario_datos' class='form-horizontal' action='pedido.php' method='POST'>";

                echo "<div class='well'>";
                    //echo "<frameset>";
                    echo "<fieldset><legend><h2>1. Mensaje</h2></legend>";

                        echo "<div class='radio'>";
                            echo "<label><input type='radio' id='mensaje2' name='mensaje' value='1'>Te quiero</label><br>";
                            echo "<label><input type='radio' id='mensaje1' name='mensaje' value='2'>Lo siento</label><br>";
                            echo "<label><input type='radio' id='mensaje3' name='mensaje' value='3'>Feliz cumpleaños</label><br>";
                            echo "<label><input type='radio' id='mensaje4' name='mensaje' value='4'>Enhorabuena</label><br>";
                        echo "</div>";

                        echo "<div class='checkbox'>";
                            echo "<label><input onclick='mensaje_activar()' type='checkbox' id='mensaje_personalizado' name='mensaje_personalizado' value='1'>Mensaje personalizado: </label><br>";
                            echo "<textarea class='form-control' id='mensaje_area' name='mensaje_area' disabled rows='5' cols='20' placeholder='Máximo 200 caracteres.'></textarea>";
                        echo "</div>";

                    echo "</fieldset>";
                echo "</div>";


                echo "<div class='well'>";
                    echo "<fieldset><legend><h2>2. Datos de facturación</h2></legend>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='fac_nombre'>Nombre: </label>";
                            echo "<input class='form-control' type='text' id='fac_nombre' name='fac_nombre' value='' size='20' maxlength='50' required placeholder='Nombre'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label for='fac_apellidos' class='control-label'>Apellidos: </label>"; 
                            echo "<input class='form-control' type='text' id='fac_apellidos' name='fac_apellidos' value='' size='40' maxlength='100' required placeholder='Apellidos'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='fac_direccion'>Dirección: </label>";
                            echo "<input class='form-control' type='text' id='fac_direccion' name='fac_direccion' value='' size='40' maxlength='150' required placeholder='Dirección de facturación'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='fac_ciudad'>Ciudad: </label>";
                            echo "<input class='form-control' type='text' id='fac_ciudad' name='fac_ciudad' value='' size='30' maxlength='50' required placeholder='Ciudad'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='fac_cp'>Código postal: </label>";
                            echo "<input class='form-control' type='text' id='fac_cp' name='fac_cp' value='' pattern='{0-9}' size='5' maxlength='5' required placeholder='Codigo postal'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='fac_provincia'>Provincia: </label>";
                            echo "<select class='form-control' id='fac_provincia' name='fac_provincia'>";
                        

                                $provincias = array("almeria","cadiz","cordoba","granada","huelva","jaen","malaga","sevilla");
                                foreach ($provincias as $provincia) {
                                    echo "<option value='".$provincia."'>".ucfirst($provincia)."</option>";
                                }

                            echo "</select>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='fac_telefono'>Teléfono: </label>";    
                            echo "<input class='form-control' type='text' pattern='{0-9}' id='fac_telefono' name='fac_telefono' value='' size='9' maxlength='9' required placeholder='Telefono'>";
                        echo "</div>";

                        echo "<div class='form-group'>"; 
                            echo "<label class='control-label' for='fac_correo'>Correo: </label>";
                            echo "<input class='form-control' type='text' id='fac_correo' name='fac_correo' value='' size='40' maxlength='100' required placeholder='Dirección de correo'>";
                        echo "</div>";

                    echo "</fieldset>";
                echo "</div>";

                echo "<div class='well'";
                        echo "<fieldset><legend><h2>3. Datos de envío</h2></legend>";

                            echo "<div class='checkbox'>"; 
                                echo "<label><input onclick='envio_facturacion_datos()' type='checkbox' id='fac_igual_env' name='fac_igual_env' value='1'>Mismos datos que facturación</label>";
                            echo "</div>";
                            
                            echo "<div class='form-group'>"; 
                                echo "<label class='control-label' for='env_nombre'>Nombre: </label>";
                                echo "<input class='form-control' type='text' id='env_nombre' name='env_nombre' value='' size='20' maxlength='50' required placeholder='Nombre'>";
                            echo "</div>";

                            echo "<div class='form-group'>"; 
                                echo "<label class='control-label' for='env_apellidos'>Apellidos: </label>"; 
                                echo "<input class='form-control' type='text' id='env_apellidos' name='env_apellidos' value='' size='40' maxlength='100' required placeholder='Apellidos'>";
                            echo "</div>";

                            echo "<div class='form-group'>"; 
                                echo "<label class='control-label' for='env_direccion'>Dirección: </label>";
                                echo "<input class='form-control' type='text' id='env_direccion' name='env_direccion' value='' size='40' maxlength='150' required placeholder='Dirección de facturación'>";
                            echo "</div>";

                            echo "<div class='form-group'>"; 
                                echo "<label class='control-label' for='env_ciudad'>Ciudad: </label>";
                                echo "<input class='form-control' type='text' id='env_ciudad' name='env_ciudad' value='' size='30' maxlength='50' required placeholder='Ciudad'>";
                            echo "</div>";

                            echo "<div class='form-group'>"; 
                                echo "<label class='control-label' for='env_cp'>Código postal: </label>";
                                echo "<input class='form-control' type='text' id='env_cp' name='env_cp' value='' pattern='{0-9}' size='5' maxlength='5' required>";
                            echo "</div>";

                            echo "<div class='form-group'>"; 
                                echo "<label class='control-label' for='env_provincia'>Provincia: </label>";
                                echo "<select class='form-control' id='env_provincia' name='env_provincia'>";

                                    $provincias = array("almeria","cadiz","cordoba","granada","huelva","jaen","malaga","sevilla");
                                    foreach ($provincias as $provincia) {
                                        echo "<option value='".$provincia."'>".ucfirst($provincia)."</option>";
                                    }

                                echo "</select>";
                            echo "</div>";

                            echo "<div class='form-group'>"; 
                                echo "<label class='control-label' for='env_telefono'>Teléfono: </label>";
                                echo "<input class='form-control' type='text' id='env_telefono' name='env_telefono' value='' value='' size='9' maxlength='9' required>";
                            echo "</div>";

                            echo "<div class='form-group'>"; 
                                echo "<label class='control-label' for='env_correo'>Correo: </label>";
                                echo "<input class='form-control' type='text' id='env_correo' name='env_correo' value='' size='40' maxlength='100' required placeholder='Dirección de correo'>";
                            echo "</div>";

                        echo "</fieldset>";
                    echo "</div>";


                    echo "<div class='well'>";
                        echo "<fieldset><legend><h2>4. Fecha de envío</h2></legend>";

                            echo "<div class='form-group'>"; 
                                echo "<div class='col-md-4'>";
                                    echo "<select class='form-control col-md-4' onchange='calcula_dias()' id='fecha_mes' name='fecha_mes'>";
                                        $meses = array
                                                (
                                                    array(1,2,3,4,5,6,7,8,9,10,11,12),
                                                    array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre")
                                                );
                                                
                                        for ($i=0 ; $i < 12 ; $i++) {
                                                echo "<option value='".$meses[0][$i]."'>".$meses[1][$i]."</option>";
                                        }

                                    echo "</select>";
                                echo "</div>";

                                echo "<div class='col-md-4'>";
                                    echo "<select class='form-control' id='fecha_dia' name='fecha_dia'>";
                                    echo "</select>";
                                echo "</div>";

                                echo "<div class='col-md-4'>";
                                    echo "<select class='form-control' onchange='calcula_dias()' id='fecha_ano' name='fecha_ano'>";

                                        $ano_ini = 2016;
                                        $ano_fin = 2018;
                                        for ($i=$ano_ini; $i <= $ano_fin ; $i++) { 
                                            echo "<option value='".$i."'>".$i."</option>";
                                        }

                                    echo "</select>";
                                echo "</div>";
                            echo "</div>";

                        echo "</fieldset>";
                    echo "</div>";    
                    

                    echo "<div class='well'>";
                        echo "<fieldset><legend><h2>5. Forma de pago</h2></legend>";

                            echo "<div class='radio'>";
                                echo "<h3>Tarjeta de pago:</h3>";
                                echo "<div class='col-md-4'>";
                                    echo "<label><input type='radio' id='tarjeta_visa' name='tarjeta' value='visa'> VISA </label>";
                                echo "</div>";  
                                echo "<div class='col-md-4'>";
                                    echo "<label><input type='radio' id='tarjeta_mastercard' name='tarjeta' value='mastercard'> MASTERCARD</label>";
                                echo "</div>";  
                                echo "<div class='col-md-4'>";
                                    echo "<label><input type='radio' id='tarjeta_american' name='tarjeta' value='american_express'> AMERICAN EXPRESS </label>";
                                echo "</div><br><br>";  
                            echo "</div>";  

                            echo "<div class='form-group'>";
                                echo "<label class='control-label col-md-3' for='pago_numero'>Numero de tarjeta:</label>";
                                echo "<div class='col-md-5'>";
                                    echo "<input type='text' class='form-control' id='pago_numero' name='pago_numero' value='' maxlength='12' placeholder='Introduce tu numero de tarjeta'>";
                                echo "</div>";
                            echo "</div>";

                            echo "<div class='form-group'>";
                                echo "<label class='control-label col-md-2' for='pago_mes'>Mes: </label>";
                                echo "<div class='col-md-2'>";
                                    echo "<select class='form-control' id='pago_mes' name='pago_mes'>";

                                            for ($i=1; $i <= 12 ; $i++) { 
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }

                                    echo "</select>";
                                echo "</div>";

                                echo "<label class='control-label col-md-1' for='pago_ano'>Año: </label>";
                                echo "<div class='col-md-2'>";
                                    echo "<select class='form-control' id='pago_ano' name='pago_ano'>";

                                        $pago_ano_ini = 2016;
                                        $pago_ano_fin = 2031;
                                        for ($i=$pago_ano_ini; $i <= $pago_ano_fin; $i++) { 
                                            echo "<option value='".$i."'>".$i."</option>";
                                        }

                                    echo "</select>";
                                echo "</div>";

                                echo "<label class='control-label col-md-1' for='pago_ccv'>CCV: </label>";
                                echo "<div class='col-md-2'>";
                                    echo "<input class='form-control' type='text' id='pago_ccv' name='pago_ccv' value='' maxlength='3' size='3' pattern='{0-9}' placeholder='Pon tu CCV'>";
                                echo "</div>";

                            echo "</div>";
                            
                        echo "</fieldset>";
                    echo "</div>";

                    echo "<div class='well'>";
                        /*echo "<fieldset><legend><h2>6. Crear cuenta</h2></legend>";

                            echo "<div class='form-group'>";
                                echo "<label class='control-label' for='cuenta_correo'>Direccion de correo: </label>";
                                echo "<input class='form-control glyphicon-envelope' onclick='copia_correo()' type='text' id='cuenta_correo' name='cuenta_correo' value='' maxlength='100' required placeholder='Dirección de correo'>";
                            echo "</div>";

                            echo "<div class='form-group'>";
                                echo "<label class='control-label' for='cuenta_pass'>Contraseña: </label>";
                                echo "<input class='form-control' oninput='comprueba_pass()' type='password' id='cuenta_pass' name='cuenta_pass' value='' size='40' maxlength='100' required placeholder='Introducir contraseña'>";
                            echo "</div>";

                            echo "<div class='form-group' id='error_pass'>";
                                echo "<label class='control-label' for='cuenta_pass_rep'>Repetir contraseña: </label>";
                                echo "<input class='form-control' oninput='comprueba_pass()' type='password' id='cuenta_pass_rep' name='cuenta_pass_rep' value=''  value='' size='40' maxlength='100' required placeholder='Repetir contraseña'>";
                                echo "<div style='color:red;font-style:italic' id='error_pass_texto'></div>";         
                            echo "</div>";*/
                       // echo "<div class='col-md-4'></div>";
                        //echo "<div class='col-md-4'>";
                            echo "<center><input class='btn-lg' type='submit' name='enviar' value='Enviar'></center>";
                           // echo "</div>";
                        //echo "<div class='col-md-4'></div>";
                        
                        //echo "</fieldset>";
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