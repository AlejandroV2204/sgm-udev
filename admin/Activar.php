<?php
include "../util/util.php";
include_once "../util/utilModelo.php";
$util = new util();
$utilModelo = new utilModelo();

$util -> validarRuta(0);
$id = $_SESSION['usuario'][0];
$estado = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tecc</title>
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

  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">

            
           <!-- /INICIO TABLA Datos-->
          <div class="span12">
            <?php 
                  $tabla = "usuario";
                  $result = $utilModelo->consultarVariasTablas("*",$tabla,"id_usuario='$id'");
                  while ($filaIngre = mysqli_fetch_array($result)) {
                      if ($filaIngre != NULL) {
                        $usuarioAdmin=$filaIngre[0]."||".
                        $filaIngre[2]."||".
                        $filaIngre[1];


                             echo "<br><h3>Nombre completo Admin: $filaIngre[1] $filaIngre[2]
                                            </h3>";

                      }   
                    }   
                    ?>
                     <br><br>
              <div class="widget widget-nopad">
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Datos Desactivos</h3>
              </div>

              <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th> NOMBRE</th>
                      <th> APELLIDO</th>
                      <th> CORREO</th>
                      <th> USUARIO</th>
                      <th> ACTIVAR</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                  $resultadoTabla = $utilModelo->consultarVariasTablas("*",$tabla,"estado_usuario='$estado'");
                  while ($fila = mysqli_fetch_array($resultadoTabla)) {
                      if ($fila != NULL) {
                        $datos=$fila[0]. "||" .
                        $fila[2]. "||" .
                        $fila[1]. "||".
                        $fila[4]. "||" .
                        $fila[5];

              if($fila[5] == 0){

              $tipoUser = "Administrador";

               }else if($fila[5] == 1){

                $tipoUser = "Tecnico";

               }else if($fila[5] == 2){

                $tipoUser = "Monitor";

               }else{

                $tipoUser = "Estudiante";

               }
                          echo "
                            <tr>
                              <td> $fila[1] </td>
                              <td> $fila[2] </td>
                              <td> $fila[4] </td>
                              <td> $tipoUser </td>
                              <td class=\"td-actions\"><a href=\"#modalActivar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-small btn-success\"><i class=\"btn-icon-only icon-ok\"> </i></a></td>
                            </tr>";
                  }
                }
          ?>
                  </tbody>
                </table>
              </div>
              <!-- /widget-content -->
            </div>
          </div >

          </div>
          <!-- /FIN TABLA datos -->
              <!-- /widget-content -->
            </div>
          </div >
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <div id="modalActivar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Activar Usuario</h3>
  </div>
  
  <div class="modal-body">

      <form action="Activar_control.php" method="post" >

                                  <input id="id" name="id" type="hidden">
                                  <h3>Estas seguro que desea activar a este usuario</h3>
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
    <script src="../js/chart.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>

     <script>
       
    function agregarForm(datos){
      d=datos.split("||");
       $("#id").val(d[0]);
    }

    </script>

</body>

</html>