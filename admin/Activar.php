<?php
include "../util/util.php";
include_once "../util/utilModelo.php";
$util = new util();
$utilModelo = new utilModelo();

$util -> validarRuta(0);
$id = $_SESSION['usuario'][0];

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
                  while ($fila = mysqli_fetch_array($result)) {
                      if ($fila != NULL) {


                        $datos=$fila[0]."||".
                             $fila[2]."||".
                             $fila[3]."||".
                             $fila[5]."||".
                             $fila[6]."||".
                             $fila[1];


                             echo "<h3>Nombre: $fila[1]</h3><br>
                                    <h3>Apellido: $fila[2]</h3>";

             ?>
            
            <br><br>
              <div class="widget widget-nopad">
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Datos Tecnico</h3>
              </div>

              <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>                      
                      <th> IDENTIFICADOR</th>
                      <th> NOMBRE</th>
                      <th> DIRECCION</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                 

                          echo "
                            <tr>
                             
                              <td> $fila[0] </td>
                              <td> $fila[1] </td>
                              <td> $fila[4] </td>
                  
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

         <!-- /INICIO TABLA Referedo-->

          <div class="span9">

          
              <div class="widget widget-nopad">
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Computadores Notificados</h3>
              </div>

              <!-- /widget-header -->
              <div id="scroll" class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th> CODIGO </th>
                      <th> NOMBRE</th>
                      <th> FECHA INGRESO</th>
                      <th> ESTADO</th>
                      <th> ULTIMO PAGO</th>
                      <th> REFERIDOS</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  $utilModelo = new utilModelo();
                  $tabla = "reporte";
                  $result = $utilModelo->consultarVariasTablas("*",$tabla,"id_reporte='$id'");
                  while ($fila = mysqli_fetch_array($result)) {
                      if ($fila != NULL) {

                        $afilados=$util->mostrarCantidadReferidos($fila[1]);
                        $pagos=$util->validarUsuarioActivo($fila[1]);

                        $datos=$fila[0]."||".
                             $fila[2]."||".
                             $fila[3]."||".
                             $fila[5]."||".
                             $fila[6]."||".
                             $fila[10]."||".
                             $fila[7];

                          echo "
                            <tr>
                              <td>$fila[1] </td>
                              <td> $fila[2] </td>
                              <td> $fila[5]</td>
                              <td>$pagos[1]</td>
                              <td>$pagos[0]</td>
                              <td>$afilados[1]</td>
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
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>




    <?php
  include "../componentes/pie.php";
  ?>
    <!-- Le javascript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.7.2.min.js"></script>
    <script src="../js/excanvas.min.js"></script>
    <script src="../js/funciones.js"></script>
    <script src="../js/chart.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>


    <script type="text/javascript">



    </script>

</body>

</html>