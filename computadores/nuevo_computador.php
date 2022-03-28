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
                while ($fila = mysqli_fetch_row($result)) 
                {
                    if ($fila != NULL) 
                    {

                      $datos=$fila[0]."||".$fila[1]."||".$fila[2]."||".$fila[3]."||".$fila[4]."||".$fila[5]."||".$fila[6]."||".$fila[7]."||".$fila[8]."||".$fila[9]."||".$fila[10]."||".$fila[11]."||".$fila[12]."||".$fila[13]."||".$fila[14]."||".$fila[15]."||".$fila[16]."||".$fila[17];
                      $random = $imagenes[rand(0, 2)];

                        echo "<div class=\"card\">";
                            echo "<img src=\"$random\">
                            <h4>$fila[0]</h4>
                            <p>Caracteristicas: </p>
                            <li>Procesador: $fila[6]</li>
                            <li>RAM: $fila[4]</li>
                            <li>Disco duro: $fila[8]</li>
                            <li>Sistema Operativo: $fila[2]</li>
                            <a data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-pencil\"></i></a><a href=\"#modalEliminar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>";

                        echo "</div>";
                        
                    }
                }
                    
                ?>




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
                <input type="text" class="form-control" name="id_pc" required>

                <p>
                    Sistema operativo: <br>
                    <input type="radio" name="so_pc" value="WINDOWS 8.1" required> Windows 8.1<br>
                    <input type="radio" name="so_pc" value="WINDOWS 10" required> Windows 10<br>
                    <input type="radio" name="so_pc" value="LINUX" required> Linux

                </p>

                <label for="placa base" class="form-label">Motherboard</label>
                <input type="text" class="form-control" name="mobo_pc" placeholder="ej: asus h61m-k"
                    required>

                <label for="lugar ubicado" class="form-label">Lugar ubicado:</label>
                <select name="sala"  class="form-select" required>
                    <option selected disabled value="">Salas</option>

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
                <input type="text" class="form-control" name="procesador" 
                    placeholder="ej: Intel Pentium E5300" required>

                <label for="cantidad de ram" class="form-label">Cantidad RAM</label>
                <input type="range" name="cantidad_ram"  class="form-range" min="0" max="32" step="4"
                    oninput="rangeValue.innerText = this.value+'GB'" required>
                <p id="rangeValue">4GB</p>

                <label for="velocidad" class="form-label">Velocidad RAM</label>
                <select name="velocidad_ram"  class="form-select" required>
                    <option selected disabled value="">Escoge</option>
                    <option value="1333mhz">1333Mhz</option>
                    <option value="1006mhz">1066Mhz</option>
                    <option value="1600mhz">1600mhz</option>
                    <option value="2133mhz">2133mhz</option>
                    <option value="2600mhz">2600mhz</option>

                </select>

                <p>
                    Tipo de graficos:<br>
                    <input type="radio" name="tipo_graficos" value="INTEGRADOS" required> Integrados
                    <br>
                    <input type="radio" name="tipo_graficos" value="DEDICADOS" required> Dedicados

                </p>

                <label for="capacidad disco" class="form-label">Capacidad disco</label>
                <input type="text" class="form-control" name="capacidad_disco" 
                    placeholder="ej: 500GB" required>

                <p>
                    El computador tiene: <br>
                    <small>Teclado:</small> <br>
                    <input type="radio" name="teclado" value="SI" required> SI <br>
                    <input type="radio" name="teclado" value="NO" required> NO <br>
                    <small>Mouse:</small> <br>
                    <input type="radio" name="mouse" value="SI" required> SI <br>
                    <input type="radio" name="mouse" value="NO" required> NO <br>
                    <small>Lectora DVD:</small> <br>
                    <input type="radio" name="lectora_dvd" value="SI" required> SI <br>
                    <input type="radio" name="lectora_dvd" value="NO" required> NO <br>

                </p>

                <p>
                    Estado del panel frontal: <br>
                    <input type="radio" name="panel_frontal" value="Funcional" required>
                    Funcional<br>
                    <input type="radio" name="panel_frontal" value="Fallando" required> con
                    fallas<br>
                    <input type="radio" name="panel_frontal" value="Sin funcionar" required> No
                    funciona

                </p>

                <label for="ventiladores" class="form-label">No. Ventiladores</label>
                <input type="number" class="form-control" name="ventiladores" placeholder="" required>


                <label for="pasta termica" class="form-label">Ultima pasta termica</label>
                <input type="date" id="start" name="ultima_termica" 
                    value="<?php echo date('Y-m-d'); ?>" min="2018-01-01" max="2025-12-31" required>

                <label for="mantenimiento" class="form-label">Ultimo mantenimiento</label>
                <input type="date" id="start" name="ultimo_man" value="<?php echo date('Y-m-d'); ?>"
                    min="2018-01-01" max="2025-12-31" required>

                <p>
                    Salidas de video: <br>
                    <input type="radio" name="salidas_video" value="HDMI" required> HDMI<br>
                    <input type="radio" name="salidas_video" value="VGA - DVI" required> VGA O
                    DVI<br>
                    <input type="radio" name="salidas_video" value="AMBAS" required> AMBAS
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
                    <input id="codigoE" name="numero" type="hidden">
                </div>

                <!-- <label for="serial" class="form-label">Identificador del PC</label>
                <input type="text" class="form-control" name="id_pc"> -->

                <p>
                    Sistema operativo: <br>
                    <input type="radio" name="so_pc" id="so_pcE" value="WINDOWS 8.1" required> Windows 8.1<br>
                    <input type="radio" name="so_pc" id="so_pcE" value="WINDOWS 10" required> Windows 10<br>
                    <input type="radio" name="so_pc" id="so_pcE" value="LINUX" required> Linux

                </p>

                <label for="placa base" class="form-label">Motherboard</label>
                <input type="text" class="form-control" name="mobo_pc" id="mobo_pcE" placeholder="ej: asus h61m-k"
                    required>

                <label for="lugar ubicado" class="form-label">Lugar ubicado:</label>
                <select  id="salaE" name="sala" class="form-select" required>
                    <option selected disabled value="">Salas</option>

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
                <input type="text" class="form-control" name="procesador" id="procesadorE"
                    placeholder="ej: Intel Pentium E5300" required>

                <label for="cantidad de ram" class="form-label">Cantidad RAM</label>
                <input type="range" name="cantidad_ram" id="cantidad_ramE" class="form-range" min="0" max="32" step="4"
                    oninput="rangeValue.innerText = this.value+'GB'" required>
                <p id="rangeValue">4GB</p>

                <label for="velocidad" class="form-label">Velocidad RAM</label>
                <select name="velocidad_ram" id="velocidad_ramE" class="form-select" required>
                    <option selected disabled value="">Escoge</option>
                    <option value="1333mhz">1333Mhz</option>
                    <option value="1006mhz">1066Mhz</option>
                    <option value="1600mhz">1600mhz</option>
                    <option value="2133mhz">2133mhz</option>
                    <option value="2600mhz">2600mhz</option>

                </select>

                <p>
                    Tipo de graficos:<br>
                    <input type="radio" name="tipo_graficos" id="tipo_graficosE" value="INTEGRADOS" required> Integrados
                    <br>
                    <input type="radio" name="tipo_graficos" id="tipo_graficosE" value="DEDICADOS" required> Dedicados

                </p>

                <label for="capacidad disco" class="form-label">Capacidad disco</label>
                <input type="text" class="form-control" name="capacidad_disco" id="capacidad_discoE"
                    placeholder="ej: 500GB" required>

                <p>
                    El computador tiene: <br>
                    <small>Teclado:</small> <br>
                    <input type="radio" name="teclado" id="tecladoE" value="SI" required> SI <br>
                    <input type="radio" name="teclado" id="tecladoE" value="NO" required> NO <br>
                    <small>Mouse:</small> <br>
                    <input type="radio" name="mouse" id="mouseE" value="SI" required> SI <br>
                    <input type="radio" name="mouse" id="mouseE" value="NO" required> NO <br>
                    <small>Lectora DVD:</small> <br>
                    <input type="radio" name="lectora_dvd" id="lectora_dvdE" value="SI" required> SI <br>
                    <input type="radio" name="lectora_dvd" id="lectora_dvdE" value="NO" required> NO <br>

                </p>

                <p>
                    Estado del panel frontal: <br>
                    <input type="radio" name="panel_frontal" id="panel_frontalE" value="Funcional" required>
                    Funcional<br>
                    <input type="radio" name="panel_frontal" id="panel_frontalE" value="Fallando" required> con
                    fallas<br>
                    <input type="radio" name="panel_frontal" id="panel_frontalE" value="Sin funcionar" required> No
                    funciona

                </p>

                <label for="ventiladores" class="form-label">No. Ventiladores</label>
                <input type="number" class="form-control" name="ventiladores" id="ventiladoresE" placeholder="" required>


                <label for="pasta termica" class="form-label">Ultima pasta termica</label>
                <input type="date" name="ultima_termica" id="ultima_termicaEE"
                    value="<?php echo date('Y-m-d'); ?>" min="2018-01-01" max="2025-12-31" required>

                <label for="mantenimiento" class="form-label">Ultimo mantenimiento</label>
                <input type="date" name="ultimo_man" id="ultimo_manE" value="<?php echo date('Y-m-d'); ?>"
                    min="2018-01-01" max="2025-12-31" required>

                <p>
                    Salidas de video: <br>
                    <input type="radio" name="salidas_video" id="salidas_videoE" value="HDMI" required> HDMI<br>
                    <input type="radio" name="salidas_video" id="salidas_videoE" value="VGA - DVI" required> VGA O
                    DVI<br>
                    <input type="radio" name="salidas_video" id="salidas_videoE" value="AMBAS" required> AMBAS
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
                <h3>Seguro desea desactivar el computador?</h3>
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
        // $("#id_pc").val(d[0]);
        $("#salaE").val(d[1]);
        $("#so_pcE").val(d[2]);
        $("#mobo_pcE").val(d[3]);
        $("#cantidad_ramE").val(d[4]);
        $("#velocidad_ramE").val(d[5]);
        $("#procesadorE").val(d[6]);
        $("#tipo_graficosE").val(d[7]);
        $("#capacidad_discoE").val(d[8]);
        $("#mouseE").val(d[9]);
        $("#tecladoE").val(d[10]);
        $("#panel_frontalE").val(d[11]);
        $("#lectora_dvdE").val(d[12]);
        $("#ventiladoresE").val(d[13]);
        $("#ultima_termicaE").val(d[14]);
        $("#ultimo_manE").val(d[15]);
        $("#salidas_videoE").val(d[16]);

    }
    </script>

</body>

</html>
