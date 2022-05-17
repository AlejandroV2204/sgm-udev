<?php
include_once('../conexion.php');
include_once "../util/utilModelo.php";
include_once "../util/util.php";
$util = new util();

$util -> validarRuta(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Salas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
  rel="stylesheet">
  <link href="../css/font-awesome.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/pages/dashboard.css" rel="stylesheet">
  <link href="../css/pages/plans.css" rel="stylesheet">
</head>
<body>
  <?php
  include "../componentes/menuPrincipalAdmin.php";
  ?>
  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">

          <div class="span3"></div>

         <!-- /INICIO TABLA Rangos-->

          <div class="span9">

            <a href="#modalGuardar"  data-toggle="modal" class=" form-control btn btn-register">Crear Sala</a><br><br>
            <div class="widget widget-nopad">
        
        <div class="widget widget-table action-table">
            
          <div class="containero">
                <?php
                $imagenes = array("../img/salas/diseño.jpg", "../img/salas/laboratorio.jpg", "../img/salas/salon1.jpg", "../img/salas/salonAdmin.jpg");
                
                $utilModelo = new utilModelo();
                  $tabla = "sala";
                  $result = $utilModelo->consultarVariasTablas("*",$tabla,"1");
                  while ($fila = mysqli_fetch_array($result)) {
                      if ($fila != NULL) {

                        $datos=$fila[0]."||".
                            $fila[1]."||".
  			        					  $fila[2]."||".
  			        					  $fila[3];

                            $estado = "";

                            if( $fila[3] == 0){
                                 $estado ="Ocupada";

                            }else if( $fila[3] == 1){
                                 $estado = "Libre";

                            }

                      $random = $imagenes[rand(0, 3)];

                        // La tarjeta donde se muestan los computadores

                        echo "<div class=\"card\">";
                            echo "<img src=\"$random\">
                            <h6>$fila[2]</h6>
                            <p>Especificacion</p>
                            <li>Cantidad: $fila[1]</li>
                            <li>Estado: $estado</li>";

                            //Si el estado del pc es '1' (activo) se muestra el modal de eliminar
                            if($fila[3] == 1){
                                echo "<a  href=\"\" class=\"btn btn-small btn-default\"><i class=\"btn-icon-only icon-eye-open\"></i></a>
                                <a data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-pencil\"></i></a>
                                <a href=\"#modalEliminar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>";

                            }else if($fila[3] == 0){
                                echo "<a href=\"\" class=\"btn btn-small btn-default\"><i class=\"btn-icon-only icon-eye-open\"></i></a>
                                <a data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-pencil\"></i></a>
                                <a href=\"#modalActivar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-ok\"> </i></a>";

                            }

                        echo "</div>";
                        
                    }
                }
                    
                ?>
                <h6 class="bigstats"></h6>
                </div>
              </div >
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
    <!-- /FIN TABLA rangos -->
      
      <?php 
      include "../componentes/pie.php";
      ?>
    <!-- inicio modal guardar -->
  <div id="modalGuardar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h3 id="myModalLabel">Crear Sala</h3>
    </div>
    <div class="modal-body">

      <form class="span8" action="crearSala.Controller.php" method="post" >

                                <div class="form-group">
                                    <input   type="text" name="cantidad_pc" id="cantidad_pc" tabindex="1" class=" form-control span4"
                                           placeholder="Cantidad de computadores" value="" required>
                                </div>
                                <div class="form-group   ">
                                    <input   type="text" name="nombre_sala" id="nombre_sala" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre de la sala" value="" required>
                                </div>
                  </div>
    <div class="modal-footer">
      <!-- Cierre modal -->
      <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
      <!-- Boton envio datos -->
      <button type="submit" name="guardarSala" id="guardarTrabajador"class="btn btn-primary">Guardar</button>
    </div>

    </form>
  </div>
  <!-- Fin modal -->



  <!-- inicio modal editar -->
<div id="modalEditar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Editar Salas</h3>
  </div>
  <div class="modal-body">

      <form style="min-width: 500px;" action="crearSala.controller.php" method="post" >

                                <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                                <div class="form-group">
                                  <input   type="text" name="cantidad_pc" id="Cantidad" tabindex="1" class=" form-control span4"
                                           placeholder="Cantidad de computadores" value="" required>
                                </div>
                                <div class="form-group">
                                    <input   type="text" name="nombre_sala" id="Sala" tabindex="1" class=" form-control span4"
                                           placeholder="Nombre de la sala" value="" required>
                      </div>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarSala" id="modificarTrabajador"class="btn btn-primary">Modificar</button>
  </div>

  </form>
</div>
<!-- Fin modal -->



 <!-- inicio modal eliminar -->
<div id="modalEliminar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Eliminar Registro</h3>
  </div>
  <div class="modal-body">

      <form action="crearSala.controller.php" method="post" >

                                  <input id="idEliminar" name="idEliminar" type="hidden">
                                  <h3>Seguro desea desactivar la sala?</h3>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="eliminar" id="eliminar"class="btn btn-primary">desactivar</button>
  </div>

  </form>
</div>
<!-- Fin modal -->

<div id="modalActivar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Activar Sala</h3>
  </div>
  
  <div class="modal-body">

      <form action="crearSala.controller.php" method="post" >

                                  <input id="id_Activar" name="id_Activar" type="hidden">
                                  <h3>Volvera a sevicio la siguiente sala</h3>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="activar" id="activar"class="btn btn-primary">Activar</button>
  </div>

  </form>
</div>

  
  <!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="../js/jquery-1.7.2.min.js"></script>
  <script src="../js/excanvas.min.js"></script>
  <script src="../js/funciones.js"></script>
  <script src="../js/chart.min.js" ></script>
  <script src="../js/bootstrap.js"></script>
  <script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>


  <script type="text/javascript">

    function agregarForm(datos){
      d=datos.split("||");

       $("#codigoE").val(d[0]);
       $("#id_Activar").val(d[0]);
       $("#idEliminar").val(d[0]);
       $("#Cantidad").val(d[1]);
       $("#Sala").val(d[2]);
    }

  </script>

</body>
</html>

