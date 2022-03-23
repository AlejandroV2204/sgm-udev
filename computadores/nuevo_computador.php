<?php 
    include_once('../conexion.php');
    include_once('../util/utilModelo.php');
    include_once('../util/util.php');

    $util = new util();  
    $utilidad = new utilModelo();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Computadores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/pages/dashboard.css" rel="stylesheet">
    <link href="../css/pages/plans.css" rel="stylesheet">
</head>

<body>

    <?php include "../componentes/menuPrincipalAdmin.php"; ?>

    <!-- ============= INICIO -TABLA ======================================================================================================== -->

    <div class="widget widget-nopad">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Computadores</h3>
                <a href="#modalGuardar" data-toggle="modal" class=" form-control btn btn-register"><i
                        class="icon-plus"></i> Nuevo registro</a><br><br>
            </div>

            <div class="containero">

                <?php
                
                    $imagenes = array("../img/generic-pc.jpg", "../img/generic-pc2.jpg", "../img/generic-pc3.jpeg");
                    
                    $tabla = "computador";
                    $result = $utilidad->consultarVariasTablas("*",$tabla,"1");
                    while ($fila = mysqli_fetch_row($result)) {

                    
                        $random = $imagenes[rand(0, 2)];

                        echo "<div class=\"card\">";

                            echo "<img src=\"$random\">
                            <h4>$fila[0]</h4>
                            <p>Caracteristicas: </p>
                            <li>Procesador: $fila[6]</li>
                            <li>RAM: $fila[4]</li>
                            <li>Disco duro: $fila[8]</li>
                            <li>Sistema Operativo: $fila[2]</li>";


                        echo "</div>";
                        
                    }

                    ?>


                <!-- /widget-header -->
                <div class="widget-content">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <!-- <th> ID </th> -->
                                <th> Sala</th>
                                <th> S.O </th>
                                <!-- <th> Motherboard </th> -->
                                <th> Motherboard </th>
                                <!-- <th> Velocidad RAM </th> -->
                                <th> Velocidad RAM </th>
                                <!-- <th> Graficos </th> -->
                                <th> Procesador </th>
                                <th> Capacidad Disco </th>
                                <!-- <th> Mouse </th> -->
                                <!-- <th> Teclado </th> -->
                                <!-- <th> Panel frontal </th> -->
                                <!-- <th> Lectora DVD </th> -->
                                <!-- <th> Ventiladores </th> -->
                                <th> Ultima termica </th>
                                <th> Ultimo mantenimiento </th>
                                <!-- <th> Salidas video </th> -->
                                <th> Estado </th>
                                <th class="td-actions">EDITAR/ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
    
    
                      $tabla = "computador";
                      $result = $utilidad->consultarVariasTablas("*",$tabla,"1");
                      while ($fila = mysqli_fetch_array($result)) {
                          if ($fila != NULL) {
    
                            $datos=$fila[0]."||".$fila[1]."||".$fila[2]."||".$fila[3]."||".$fila[4]."||".$fila[5]."||".$fila[6]."||".$fila[7]."||".$fila[8]."||".$fila[9]."||".$fila[10]."||".$fila[11]."||".$fila[12]."||".$fila[13]."||".$fila[14]."||".$fila[15]."||".$fila[16]."||".$fila[17];
                                   
                            $estado = "";

                            if($fila[17] == 0){

                                $estado = "Inactivo";

                            } else if($fila[17] == 1){

                                $estado = "Activo";
                            }

                                echo "
                                  <tr>
                                    <td>$fila[1] </td>
                                    <td> $fila[2] </td>
                                     <td>$fila[3]</td>
                                     <td>$fila[4]</td>
                                     <td>$fila[6]</td>
                                     <td>$fila[8]</td>
                                     <td>$fila[14]</td>
                                     <td>$fila[15]</td>
                                     <td>$estado</td>
                                     
                                    <td class=\"td-actions\"><a  data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-pencil\"></i></a><a href=\"#modalEliminar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a></td>
                                  </tr>";
    
                              }
                            }
                             ?>
                        </tbody>
                    </table>
                </div>

                <h6 class="bigstats"></h6>
                <!-- /widget-content -->
            </div>
        </div>



    </div>

    <!-- /FIN TABLA -->

    <!-- =================================================================================================================== -->

    <!-- INICIO MODAL GUARDAR -->
    <div id="modalGuardar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Registrar PC</h3>
        </div>
        <div class="modal-body">

            <form class="span5" action="control_computador.php" method="post">

                <label for="serial" class="form-label">Identificador del PC</label>
                <input type="text" class="form-control" name="id_pc">

                <p>
                    Sistema operativo: <br>
                    <input type="radio" name="so_pc" value="WINDOWS 8.1"> Windows 8.1<br>
                    <input type="radio" name="so_pc" value="WINDOWS 10"> Windows 10<br>
                    <input type="radio" name="so_pc" value="LINUX"> Linux

                </p>

                <label for="placa base" class="form-label">Motherboard</label>
                <input type="text" class="form-control" name="mobo_pc" placeholder="ej: asus h61m-k">

                <label for="lugar ubicado" class="form-label">Lugar ubicado:</label>
                <select name="sala" class="form-select">

                    <?php

                            $tabla = "sala";

                            $sql = $utilidad->mostrarTodosRegistros($tabla);

                            while($row = $sql->fetch_assoc()){
                                
                                /* El option en html recibe un value (que es el que va a la base de datos) ej: [id_sala]
                                asi como tambien otro valor para mostrar en el formulario ej: [nombre_sala] */
                                echo "<option value = ".$row['id_sala'].">". $row['nombre_sala']. "</option>";
                            }
                        
                        ?>

                </select>

                <label for="procesadores" class="form-label">Procesador</label>
                <input type="text" class="form-control" name="procesador" placeholder="ej: Intel Pentium E5300">

                <label for="cantidad de ram" class="form-label">Cantidad RAM</label>
                <input type="range" name="cantidad_ram" class="form-range" min="0" max="32" step="4"
                    oninput="rangeValue.innerText = this.value+'GB'">
                <p id="rangeValue">4GB</p>

                <label for="velocidad" class="form-label">Velocidad RAM</label>
                <select name="velocidad_ram" class="form-select">
                    <option selected value="1333mhz">1333Mhz</option>
                    <option value="1006mhz">1066Mhz</option>
                    <option value="1600mhz">1600mhz</option>
                    <option value="2133mhz">2133mhz</option>
                    <option value="2600mhz">2600mhz</option>

                </select>

                <p>
                    Tipo de graficos:<br>
                    <input type="radio" name="tipo_graficos" value="INTEGRADOS"> Integrados <br>
                    <input type="radio" name="tipo_graficos" value="DEDICADOS"> Dedicados

                </p>

                <label for="capacidad disco" class="form-label">Capacidad disco</label>
                <input type="text" class="form-control" name="capacidad_disco" placeholder="ej: 500GB">

                <p>
                    El computador tiene: <br>
                    <small>Teclado:</small> <br>
                    <input type="radio" name="teclado" value="SI"> SI <br>
                    <input type="radio" name="teclado" value="NO"> NO <br>
                    <small>Mouse:</small> <br>
                    <input type="radio" name="mouse" value="SI"> SI <br>
                    <input type="radio" name="mouse" value="NO"> NO <br>
                    <small>Lectora DVD:</small> <br>
                    <input type="radio" name="lectora_dvd" value="SI"> SI <br>
                    <input type="radio" name="lectora_dvd" value="NO"> NO <br>

                </p>

                <p>
                    Estado del panel frontal: <br>
                    <input type="radio" name="panel_frontal" value="Funcional"> Funcional<br>
                    <input type="radio" name="panel_frontal" value="Fallando"> con fallas<br>
                    <input type="radio" name="panel_frontal" value="Sin funcionar"> No funciona

                </p>

                <label for="ventiladores" class="form-label">No. Ventiladores</label>
                <input type="number" class="form-control" name="ventiladores" placeholder="">


                <label for="pasta termica" class="form-label">Ultima pasta termica</label>
                <input type="date" id="start" name="ultima_termica" value="<?php echo date('Y-m-d'); ?>"
                    min="2018-01-01" max="2025-12-31">

                <label for="mantenimiento" class="form-label">Ultimo mantenimiento</label>
                <input type="date" id="start" name="ultimo_man" value="<?php echo date('Y-m-d'); ?>" min="2018-01-01"
                    max="2025-12-31">

                <p>
                    Salidas de video: <br>
                    <input type="radio" name="salidas_video" value="HDMI"> HDMI<br>
                    <input type="radio" name="salidas_video" value="VGA - DVI"> VGA O DVI<br>
                    <input type="radio" name="salidas_video" value="AMBAS"> AMBAS

                </p>

        </div>
        <div class="modal-footer">
            <!-- Cierre modal -->
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            <!-- Boton envio datos -->
            <button type="submit" name="guardarComputador" id="guardarTrabajador"
                class="btn btn-primary">Guardar</button>
        </div>

        </form>
    </div>
    <!-- FIN MODAL GUARDAR -->

    <!-- INICIO MODAL EDITAR -->
    <div id="modalEditar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Editar Registros</h3>
        </div>
        <div class="modal-body">

            <form style="min-width: 500px;" action="control_computador.php" method="post">

                <div class="form-group">
                    <input id="codigoE" name="id_pc" type="hidden">
                </div>


                <label for="serial" class="form-label">Identificador del PC</label>
                <input type="text" class="form-control" name="id_pc">

                <p>
                    Sistema operativo: <br>
                    <input type="radio" name="so_pc" value="WINDOWS 8.1"> Windows 8.1<br>
                    <input type="radio" name="so_pc" value="WINDOWS 10"> Windows 10<br>
                    <input type="radio" name="so_pc" value="LINUX"> Linux

                </p>

                <label for="placa base" class="form-label">Motherboard</label>
                <input type="text" class="form-control" name="mobo_pc" placeholder="ej: asus h61m-k">

                <label for="lugar ubicado" class="form-label">Lugar ubicado:</label>
                <select name="sala" class="form-select">

                    <?php

                            $tabla = "sala";

                            $sql = $utilidad->mostrarTodosRegistros($tabla);

                            while($row = $sql->fetch_assoc()){
                                
                                /* El option en html recibe un value (que es el que va a la base de datos) ej: [id_sala]
                                asi como tambien otro valor para mostrar en el formulario ej: [nombre_sala] */
                                echo "<option value = ".$row['id_sala'].">". $row['nombre_sala']. "</option>";
                            }
                        
                        ?>

                </select>

                <label for="procesadores" class="form-label">Procesador</label>
                <input type="text" class="form-control" name="procesador" placeholder="ej: Intel Pentium E5300">

                <label for="cantidad de ram" class="form-label">Cantidad RAM</label>
                <input type="range" name="cantidad_ram" class="form-range" min="0" max="32" step="4"
                    oninput="rangeValue.innerText = this.value+'GB'">
                <p id="rangeValue">4GB</p>

                <label for="velocidad" class="form-label">Velocidad RAM</label>
                <select name="velocidad_ram" class="form-select">
                    <option selected value="1333mhz">1333Mhz</option>
                    <option value="1006mhz">1066Mhz</option>
                    <option value="1600mhz">1600mhz</option>
                    <option value="2133mhz">2133mhz</option>
                    <option value="2600mhz">2600mhz</option>

                </select>

                <p>
                    Tipo de graficos:<br>
                    <input type="radio" name="tipo_graficos" value="INTEGRADOS"> Integrados <br>
                    <input type="radio" name="tipo_graficos" value="DEDICADOS"> Dedicados

                </p>

                <label for="capacidad disco" class="form-label">Capacidad disco</label>
                <input type="text" class="form-control" name="capacidad_disco" placeholder="ej: 500GB">

                <p>
                    El computador tiene: <br>
                    <small>Teclado:</small> <br>
                    <input type="radio" name="teclado" value="SI"> SI <br>
                    <input type="radio" name="teclado" value="NO"> NO <br>
                    <small>Mouse:</small> <br>
                    <input type="radio" name="mouse" value="SI"> SI <br>
                    <input type="radio" name="mouse" value="NO"> NO <br>
                    <small>Lectora DVD:</small> <br>
                    <input type="radio" name="lectora_dvd" value="SI"> SI <br>
                    <input type="radio" name="lectora_dvd" value="NO"> NO <br>

                </p>

                <p>
                    Estado del panel frontal: <br>
                    <input type="radio" name="panel_frontal" value="Funcional"> Funcional<br>
                    <input type="radio" name="panel_frontal" value="Fallando"> con fallas<br>
                    <input type="radio" name="panel_frontal" value="Sin funcionar"> No funciona

                </p>

                <label for="ventiladores" class="form-label">No. Ventiladores</label>
                <input type="number" class="form-control" name="ventiladores" placeholder="">


                <label for="pasta termica" class="form-label">Ultima pasta termica</label>
                <input type="date" id="start" name="ultima_termica" value="<?php echo date('Y-m-d'); ?>"
                    min="2018-01-01" max="2025-12-31">

                <label for="mantenimiento" class="form-label">Ultimo mantenimiento</label>
                <input type="date" id="start" name="ultimo_man" value="<?php echo date('Y-m-d'); ?>" min="2018-01-01"
                    max="2025-12-31">

                <p>
                    Salidas de video: <br>
                    <input type="radio" name="salidas_video" value="HDMI"> HDMI<br>
                    <input type="radio" name="salidas_video" value="VGA - DVI"> VGA O DVI<br>
                    <input type="radio" name="salidas_video" value="AMBAS"> AMBAS

                </p>

        </div>
        <div class="modal-footer">
            <!-- Cierre modal -->
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            <!-- Boton envio datos -->
            <button type="submit" name="modificarComputador" id="guardarTrabajador"
                class="btn btn-primary">Modificar</button>
        </div>

    </div>


    </form>
    </div>
    <!-- FIN MODAL EDITAR -->

    <!-- INICIO MODAL ELIMINAR -->
    <div id="modalEliminar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Desactivar computador</h3>
        </div>
        <div class="modal-body">

            <form action="control_computador.php" method="post">

                <input id="idEliminar" name="idEliminar" type="hidden">
                <h3>Seguro desea desactivar el computador</h3>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            <button type="submit" name="eliminar" id="eliminar" class="btn btn-primary">Desactivar</button>
        </div>

        </form>
    </div>
    <!-- Fin modal -->

    <?php include "../componentes/pie.php"; ?>

    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.7.2.min.js"></script>
    <script src="../js/excanvas.min.js"></script>
    <script src="../js/chart.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js"></script>
    <script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>

    <script type="text/javascript">
    function agregarForm(datos) {
        d = datos.split("||");

        $("#codigoE").val(d[0]);
        $("#idEliminar").val(d[0]);
        $("#so_pc").val(d[2]);
        $("#mobo_pc").val(d[3]);
        $("#sala").val(d[1]);
        $("#procesador").val(d[6]);
        $("#cantidad_ram").val(d[4]);
        $("#velocidad_ram").val(d[5]);
        $("#tipo_graficos").val(d[7]);
        $("#capacidad_disco").val(d[8]);
        $("#panel_frontal").val(d[11]);
        $("#ventiladores").val(d[13]);
        $("#ultima_termica").val(d[14]);
        $("#ultimo_man").val(d[15]);
        $("#salidas_video").val(d[16]);

        // $("#apellidoE").val(d[2]);
        // $("#emailE").val(d[4]);
    }
    </script>

</body>

</html>