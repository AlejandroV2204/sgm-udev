<?php
include_once "../util/utilModelo.php";
include_once "../util/util.php";
$util = new util();
$utilidad = new utilModelo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Reparaciones</title>
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

            <a href="#modalGuardar"  data-toggle="modal" class=" form-control btn btn-register">Crear Reparacion</a><br><br>
              <div class="widget widget-nopad">
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Reparaciones</h3>
              </div>

              <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th> ID Reparacion </th>
                      <th> ID Reporte</th>
                      <th> Fecha </th>
                      <th> Descripcion De La Reparacion </th>
                      <th> Estado </th>
                      <th class="td-actions">EDITAR/ELIMINAR</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                                  

                  $utilModelo = new utilModelo();
                  $tabla = "reparacion";
                  $result = $utilModelo->consultarVariasTablas("*",$tabla,"1");
                  while ($fila = mysqli_fetch_array($result)) {
                      if ($fila != NULL) {

                        $datos=$fila[0]."||".
                            $fila[1]."||".
  			        					   $fila[2]."||".
                             $fila[3]."||".
                             $fila[4];
                             
                   if($fila[4] == 0){

                    $estado = "En proceso";

                   }else{

                    $estado = "Reparado";

                   }

                          echo "
                            <tr>
                              <td>$fila[0] </td>
                              <td> $fila[1] </td>
                              <td> $fila[2] </td>
                              <td> $fila[3] </td>

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
          </div >

          </div>
          <!-- /FIN TABLA rangos -->


        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /main-inner -->
  </div>


    <!-- inicio modal guardar -->
  <div id="modalGuardar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h3 id="myModalLabel">Crear Reparacion</h3>
    </div>
    <div class="modal-body">

      <form class="span8" action="../reparaciones/reparacionesController.php" method="post" >

                                <div class="form-group">
                                <label for="lugar ubicado" class="form-label">ID Reporte</label>
                <select name="id_reporte1" class="form-select">

                    <?php

                            $tabla = "reporte";

                            $sql = $utilidad->mostrarTodosRegistros($tabla);

                            while($row = $sql->fetch_assoc()){
                                
                                /* El option en html recibe un value (que es el que va a la base de datos) ej: [id_sala]
                                asi como tambien otro valor para mostrar en el formulario ej: [nombre_sala] */
                                echo "<option value = ".$row['id_reporte'].">". $row['id_reporte']. "</option>";
                            }
                  
                        ?>

                </select>
                                </div>
                                <div class="form-group   ">
                                    <input   type="date" name="fecha" id="fecha" tabindex="1" class=" form-control span4"
                                           placeholder="fecha" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="form-group   ">
                                    <input   type="text" name="descripcion_reparacion" id="descripcion_reparacion" tabindex="1" class=" form-control span4"
                                           placeholder="Descripcion De La Reparacion" value="" required>
                                </div>


    </div>
    <div class="modal-footer">
      <!-- Cierre modal -->
      <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
      <!-- Boton envio datos -->
      <button type="submit" name="guardarReparacion" id="guardarReparacion"class="btn btn-primary">Guardar</button>
    </div>

    </form>
  </div>
  <!-- Fin modal -->



  <!-- inicio modal editar -->
<div id="modalEditar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h3 id="myModalLabel">Editar Registros</h3>
  </div>
  <div class="modal-body">

      <form style="min-width: 500px;" action="reparacionesController.php" method="post" >

                                <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                                  <div class="form-group">
                                <label for="lugar ubicado" class="form-label">ID Reporte</label>
                <select name="id_reporte1" class="form-select">

                    <?php

                            $tabla = "reporte";

                            $sql = $utilidad->mostrarTodosRegistros($tabla);

                            while($row = $sql->fetch_assoc()){
                                
                                /* El option en html recibe un value (que es el que va a la base de datos) ej: [id_sala]
                                asi como tambien otro valor para mostrar en el formulario ej: [nombre_sala] */
                                echo "<option value = ".$row['id_reporte'].">". $row['id_reporte']. "</option>";
                            }
                        
                        ?>

                </select>
                </div>
                                  <div class="form-group   ">
                                    <input   type="date" name="fecha" id="fecha" tabindex="1" class=" form-control span4"
                                           placeholder="fecha" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                <div class="form-group   ">
                                    <input   type="text" name="descripcion_reparacion" id="Descripcion" tabindex="1" class=" form-control span4"
                                           placeholder="Descripcion De La Reparacion" value="" required>
                                </div>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarReparacion" id="modificarTrabajador"class="btn btn-primary">Modificar</button>
  </div>

  </form>
</div>
<!-- Fin modal -->



 <!-- inicio modal eliminar -->
<div id="modalEliminar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
    <h3 id="myModalLabel">Eliminar Registro</h3>
  </div>
  <div class="modal-body">

      <form action="reparacionesController.php" method="post" >

                                  <input id="idEliminar" name="idEliminar" type="hidden">
                                  <h3>Seguro desea desactivar la reparacion?</h3>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="eliminar" id="eliminar"class="btn btn-primary">desactivar</button>
  </div>

  </form>
</div>
<!-- Fin modal -->



 
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
       $("#idEliminar").val(d[0]);
       $("#id_reparacion").val(d[0]);
       $("#id_reporte1").val(d[1]);
       $("#fecha").val(d[2]);
       $("#Descripcion").val(d[3]);
    }

  </script>

</body>
<?php include "../componentes/pie.php";?>
</html>

