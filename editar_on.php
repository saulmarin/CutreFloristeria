<script>
function mensaje_activar(){
                document.getElementById("mensaje_area").disabled = false;
}
function mensaje_desactivar(){
                document.getElementById("mensaje_area").disabled = true;
}
</script>

<?php
echo "<form id='formulario_editar_detalles' class='form-horizontal' action='editar_pedido.php?id=$id' method='POST'>";
echo "<center><table class='table-striped' style='width:40%;>";
        echo "<tbody class='table-hover'>";
            echo "<tr>";
                echo  "<td colspan='2'><br><center>Datos de Usuario</center><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Usuario:</td><td width='50%'>".$row['usuario']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Correo:</td><td width='50%'>".$row['correo']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td colspan='2'><br><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td colspan='2'><br><center>Datos de Facturacion</center><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Nombre:</td><td width='50%'><input value='".$row['c_nombre']."' type='text' id='fac_nombre' name='fac_nombre' size='25%' maxlength='100' required ></td>";
            echo "</tr>";


            echo "<tr>";
                echo  "<td width='50%'>Apellidos:</td><td><input value=".$row['c_apellidos']." type='text' id='fac_apellidos' name='fac_apellidos' size='25%' maxlength='100' required ></td>";
            echo "</tr>";


            echo "<tr>";
                echo  "<td width='50%'>Direccion:</td><td width='50%'><input value='".$row['c_direccion']."' type='text' id='fac_direccion' name='fac_direccion' size='25%' maxlength='100' required ></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Ciudad:</td><td width='50%'><input value='".$row['c_ciudad']."' type='text' id='fac_ciudad' name='fac_ciudad' size='25%' maxlength='100' required ></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Provincia:</td><td width='50%'>";
                echo "<select id='fac_provincia' name='fac_provincia'>";

                                    $provincias = array("almeria","cadiz","cordoba","granada","huelva","jaen","malaga","sevilla");
                                    foreach ($provincias as $provincia) {
                                        if ($provincia == $row['c_provincia']){
                                            echo "<option value='".$provincia."' selected>".ucfirst($provincia)."</option>";
                                        }else{
                                            echo "<option value='".$provincia."'>".ucfirst($provincia)."</option>";
                                        }
                                    }

                echo "</select>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Telefono:</td><td width='50%'><input value='".$row['c_telefono']."' type='text' id='fac_telefono' name='fac_telefono' size='25%' maxlength='100' required ></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Fecha Facturacion:</td><td width='50%'>".$row['c_ffact']."</td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Numero Tarjeta:</td><td width='50%'><input value='".$row['c_tarjeta']."' type='text' id='fac_tarjeta' name='fac_tarjeta' size='25%' maxlength='100' required ></td>";
            echo "</tr>";
                echo "<tr>";
                echo  "<td colspan='2'><br><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td colspan='2'><br><center>Datos de Envío</center><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Nombre:</td><td width='50%'><input value='".$row['e_nombre']."' type='text' id='env_nombre' name='env_nombre' size='25%' maxlength='100' required ></td>";
            echo "</tr>";


            echo "<tr>";
                echo  "<td width='50%'>Apellidos:</td><td><input value=".$row['e_apellidos']." type='text' id='env_apellidos' name='env_apellidos' size='25%' maxlength='100' required ></td>";
            echo "</tr>";


            echo "<tr>";
                echo  "<td width='50%'>Direccion:</td><td width='50%'><input value='".$row['e_direccion']."' type='text' id='env_direccion' name='env_direccion' size='25%' maxlength='100' required ></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Ciudad:</td><td width='50%'><input value='".$row['e_ciudad']."' type='text' id='env_ciudad' name='env_ciudad' size='25%' maxlength='100' required ></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Provincia:</td><td width='50%'>";
                echo "<select id='env_provincia' name='env_provincia'>";

                                    $provincias = array("almeria","cadiz","cordoba","granada","huelva","jaen","malaga","sevilla");
                                    foreach ($provincias as $provincia) {
                                        if ($provincia == $row['e_provincia']){
                                            echo "<option value='".$provincia."' selected>".ucfirst($provincia)."</option>";
                                        }else{
                                            echo "<option value='".$provincia."'>".ucfirst($provincia)."</option>";
                                        }
                                    }

                echo "</select>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Telefono:</td><td width='50%'><input value='".$row['e_telefono']."' type='text' id='env_telefono' name='env_telefono' size='25%' maxlength='100' required ></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Fecha Envío:</td><td width='50%'><input id='fecha_envio' name='fecha_envio' type='date' value='".$row['c_fenv']."' min='2016-09-01' max='2018-12-31'></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td colspan='2'><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td colspan='2'><br><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td colspan='2'><br><center>Datos de Mensaje</center><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Mensaje:</td>";
                echo "<td width='50%'><div class='radio'>";
                        $mensajes = "SELECT mensajes.contenido, mensajes.id FROM mensajes";
                        $msj = mysqli_query($conexion,$mensajes);                        
                            while($row_msj = mysqli_fetch_array($msj)){
                                $checked = "";
                                $funcion = " onclick='mensaje_desactivar();' ";
                                $estado = " disabled";
                                if ($row_msj["contenido"] == "Personalizado"){
                                    $funcion = " onclick='mensaje_activar();' ";
                                }
                                if ($row_msj["contenido"] == $row["mensaje"]){
                                    $checked = " checked='checked' ";
                                    if ($row_msj["contenido"] == "Personalizado"){
                                        $estado = " ";
                                    }
                                }
                                echo "<label><input type='radio'".$funcion."id='mensaje".$row_msj["id"]."' name='mensaje' value='".$row_msj["id"]."'".$checked.">".$row_msj["contenido"]."</label><br>";                                    
                            }
                echo "</div></td>";
                        
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Personalizado:</td><td width='50%'><input value='".$row['personalizado']."' type='text' id='mensaje_area' name='mensaje_area' size='35%' maxlength='100' required".$estado."></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td width='50%'>Precio:</td><td width='50%'>".$row['precio']."€</td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td colspan='2'><br></td>";
            echo "</tr>";
            echo "<tr>";
                echo  "<td colspan='2'><br><center><input class='btn-lg' type='submit' name='enviar' value='Actualizar'></center></td>";
            echo "</tr>";

    echo "</tbody>";
echo "</table></center>";
echo "</form>";



?>