<?php
include_once "../util/utilModelo.php";
include_once "../util/util.php";
$util = new util();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>REPORTES</title>
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

          <div class="span1"></div>

         <!-- /INICIO TABLA Rangos-->

          <div class="span11">

            <a href="#modalGuardar"  data-toggle="modal" class=" form-control btn btn-register">Crear Reporte</a><br><br>
              <div class="widget widget-nopad">
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Reportes</h3>
              </div>

              <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th> ID </th>
                      <th> NOMBRE USUARIO </th>
                      <th> ID PC </th>
                      <th> DESCRIPCIÓN </th>
                      <th> OBSERVACIÓN </th>
                      <th> ESTADO </th>
                      <th class="td-actions">REVISIÓN/EDITAR/Reparar</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  $utilModelo = new utilModelo();
                  $tabla = "reporte, usuario";
                  $campos = "id_reporte, nombre, id_pc1, descripcion_reporte, descripcion_reporte, estado_reporte";
                  $condicion = "id_usuario1 = id_usuario";
                  $result = $utilModelo->consultarVariasTablas($campos, $tabla, $condicion);
                  while ($fila = mysqli_fetch_array($result)) {
                      if ($fila != NULL) {

                        $datos=$fila[0]."||".
                            $fila[1]."||".
  			        					  $fila[2]."||".
  			        					  $fila[3]."||".
                            $fila[4]."||".
                            $fila[5];
                              $estado;

                   if($fila[5] == 1){

                    $estado = "Reparando";

                   }
                   else if($fila[5] == 2){

                    $estado = "Pendiente";

                   }
                   else{

                    $estado = "Reparado";

                   }

                          echo "
                            <tr>
                              <td> $fila[0] </td>
                              <td> $fila[1]  </td>
                              <td> $fila[2] </td>
                              <td> $fila[3] </td>
                              <td> $fila[4] </td>
                              <td>$estado</td>";
                      
                              if($fila[5] == 0){
                                
                                echo "<td class=\"td-actions\"><a  href=\"../revision/crudRevisionVista.php?idReporte=$fila[0]\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-eye-open\"></i></a>
                                <a  data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-pencil\"></i></a>
                                <a href=\"#modalActivar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-success btn-small\"><i class=\"btn-icon-only icon-ok\"> </i></a></td></tr>";
                                
                              }else{
                                
                                echo "<td class=\"td-actions\"><a  href=\"../revision/crudRevisionVista.php?idReporte=$fila[0]\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-eye-open\"></i></a>
                                <a  data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-pencil\"></i></a>
                                <a href=\"#modalEliminar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a></td>";
                              }
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
      <h3 id="myModalLabel">Crear Reporte</h3>
    </div>
    <div class="modal-body">

      <form class="span8" action="crudReporteControlador.php" method="post" >

      <label for="lugar ubicado" class="form-label">Lugar ubicado:</label>
                <select name="id_pc" class="form-select">

                    <?php

                            $tabla = "computador";

                            $sql = $utilidad->mostrarTodosRegistros($tabla);

                            while($row = $sql->fetch_assoc()){
                                
                                /* El option en html recibe un value (que es el que va a la base de datos) ej: [id_sala]
                                asi como tambien otro valor para mostrar en el formulario ej: [nombre_sala] */
                                echo "<option value = ".$row['id_pc'].">". $row['id_pc']. "</option>";
                            }
                        
                        ?>

                </select>

                                <div class="form-group  ">
                                    <input   type="text" name="descripcion_reporte" id="descripcion" tabindex="1" class=" form-control span4"
                                           placeholder="Descripción" value="" required>
                                </div>
                                

    </div>
    <div class="modal-footer">
      <!-- Cierre modal -->
      <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
      <!-- Boton envio datos -->
      <button type="submit" name="guardarReporte" id="guardarTrabajador"class="btn btn-primary">Guardar</button>
    </div>

    </form>
  </div>
  <!-- Fin modal -->



  <!-- inicio modal editar -->
<div id="modalEditar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Editar Registros</h3>
  </div>
  <div class="modal-body">

      <form style="min-width: 500px;" action="crudReporteControlador.php" method="post" >

                                <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                                  <div class="form-group   ">
                                    <input   type="text" name="id_pc" id="id_pc" tabindex="1" class=" form-control span4"
                                           placeholder="ID PC" value="" required>
                                </div>
                                <div class="form-group ">
                                    <input   type="text" name="descripcion_reporte" id="descripcion_reporte" tabindex="1" class=" form-control span4"
                                           placeholder="Descripción" value="" required>
                                </div>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarReporte" id="modificarReporte"class="btn btn-primary">Modificar</button>
  </div>

  </form>
</div>
<!-- Fin modal -->



 <!-- inicio modal eliminar -->
<div id="modalEliminar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Eliminar Reporte</h3>
  </div>
  <div class="modal-body">

      <form action="crudReporteControlador.php" method="post" >

                                  <input id="idEliminar" name="idEliminar" type="hidden">
                                  <h3>¿Seguro desea desactivar el reporte?</h3>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="eliminar" id="eliminar"class="btn btn-primary">Desactivar</button>
  </div>

  </form>
</div>
<!-- Fin modal -->


<!-- inicio modal activar -->
<div id="modalActivar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   <h3 id="myModalLabel">Activar reporte</h3>
 </div>
 <div class="modal-body">

     <form action="crudReporteControlador.php" method="post" >

                                 <input id="idActivar" name="idActivar" type="hidden">
                                 <h3>¿Seguro desea colocar este reporte como activo?</h3>
   </div>
 <div class="modal-footer">
   <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
   <button type="submit" name="activar" id="activar"class="btn btn-primary">Activar</button>
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
       $("#idActivar").val(d[0]);
       $("#id_pc").val(d[2]);
       $("#descripcion_reporte").val(d[3]);
    }

  </script>

</body>
<?php include "../componentes/pie.php"; ?>
</html>
