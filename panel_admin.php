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
        function detalles(num_fila){
            var fila = "detalles"+num_fila;
            document.getElementById(fila).style.display = 'block';
        }
        
        function confirmDelete(delUrl) {
            if (confirm("¿Eliminar el registro?")) {
                document.location = delUrl;
            }
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
                echo "<a style='position:absolute;' href='login.php'>Salir</a><br>";
            echo "</div>";

            echo "<div class='panel-body'>";
                echo "<center><table class='table-striped'>";
                    echo "<tbody class='table-hover'>";
                        session_start();
                        $iduser = $_SESSION["userId"];
                        require("conexion.php");
                        $conexion = mysqli_connect($db_host, $db_user, $db_password) or die("error connect");
                        mysqli_select_db($conexion, $db_database)or die("error db");
                        mysqli_set_charset($conexion, "utf8");

                        $consulta = "SELECT * FROM pedido_cabeceras";

                        $consulta = "SELECT usuarios.usuario as usuario, usuarios.nombre as nombre, pedido_cabeceras.fecha_fac as fpedido, pedido_cabeceras.fecha_envio as fenvio, mensajes.contenido as mensaje, mensajes.precio as precio, pedido_lineas.id_pedido as id_pedido
                                        FROM pedido_cabeceras
                                            JOIN usuarios ON pedido_cabeceras.id_usuario = usuarios.id
                                            JOIN pedido_lineas ON pedido_lineas.id_pedido = pedido_cabeceras.id
                                            JOIN mensajes ON pedido_lineas.id_mensaje = mensajes.id";

                        $resultado = mysqli_query($conexion, $consulta);
                        $num_rows = mysqli_num_rows($resultado);
                        if ($num_rows > 0){
                            echo "<tr>";
                                    echo  "<td width='2%'><br><br><br></td>";
                                    echo  "<td width='20%'>Usuario</td>";
                                    echo  "<td width='20%'>Fecha Pedido</td>";
                                    echo  "<td width='20%'>Fecha Envío</td>";
                                    echo  "<td width='15%'>Mensaje</td>";
                                    echo  "<td width='6%'>Precio</td>";
                                    echo  "<td width='7%'>Detalles</td>";
                                    echo  "<td width='6%'> </td>";
                                    echo  "<td width='4%'>Borrar<br></td>";
                                echo "</tr>";
                            while($row=mysqli_fetch_array($resultado)){
                                echo "<tr>";
                                    echo  "<td width='2%'><br><br></td>";
                                    echo  "<td width='20%'>".$row['usuario']."</td>";
                                    echo  "<td width='20%'>".$row['fpedido']."</td>";
                                    echo  "<td width='20%'>".$row['fenvio']."</td>";
                                    echo  "<td width='15%'>".$row['mensaje']."</td>";
                                    echo  "<td width='6%'>".$row['precio']."</td>";
                                    echo  "<td width='7%'>";
                                    echo  "<a href='panel_admin_detalles.php?id=".$row['id_pedido']."'>Detalles</a>";
                                    echo  "</td>";
                                    echo  "<td width='6%'> </td>";
                                    $id_pedido = $row['id_pedido'];
                                    //echo  "<td width='4%'><a href='panel_admin_detalles.php?id=".$row['id_pedido']."'>[x]</a></td>"; 
                                    //echo  "<a href='http://stackoverflow.com' onclick='return confirm('Are you sure?');'    >My Link</a>";  
                                    //echo "<a href='delete.page?id=1' onclick='"return confirm('Are you sure you want to delete?')>Delete</a>";
                                    echo "<td><a class = 'echo_link' href='#' onclick='if(confirm(\"¿Desea eliminar el registro?\")) location.href=\"panel_admin_borrar.php?id=$id_pedido\";'>[ X ]</a></td>";
                                echo "</tr>";
                                echo "<tr>";
                                    echo  "<td colspan='9'><br></td>";
                                echo "</tr>";
                            }
                        }

                    echo "</tbody>";
                echo "</table></center>";
            echo "</div>";

        echo "</div>"; //segunda columna



        echo "<div class='col-md-1'></div>";
    echo "</div>"; //row
    ?>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.js"></script>  
    </body>
</html>