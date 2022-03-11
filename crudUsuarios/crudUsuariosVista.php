<?php
// include "../util/utilOsdo.php";
include_once "../util/utilModelo.php";
include_once "../util/util.php";
$util = new util();

$util -> validarRuta(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Usuarios</title>
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
  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
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

            <a href="#modalGuardar"  data-toggle="modal" class=" form-control btn btn-register">Crear Usuario</a><br><br>
              <div class="widget widget-nopad">
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Usuarios</h3>
              </div>

              <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th> Nombre </th>
                      <th> Apellido</th>
                      <th> Correo </th>
                      <th> Tipo Usuario </th>
                      <th> Estado </th>
                      <th class="td-actions">EDITAR/ELIMINAR</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                                  

                  $utilModelo = new utilModelo();
                  $tabla = "usuario";
                  $result = $utilModelo->consultarVariasTablas("*",$tabla,"1");
                  while ($fila = mysqli_fetch_array($result)) {
                      if ($fila != NULL) {

                        $datos=$fila[0]."||".
                            $fila[1]."||".
  			        					   $fila[2]."||".
  			        					   $fila[3]."||".
                             $fila[4]."||".
                             $fila[5]."||".
                             $fila[6];
  			        					    
                              $tipoUser = "";
                              $estado = "";

                             if($fila[5] == 0){

                              $tipoUser = "Administrador";

                   }else if($fila[5] == 1){

                    $tipoUser = "Monitor";

                   }else{

                    $tipoUser = "Estudiante";

                   }

                   if($fila[6] == 0){

                    $estado = "Activo";

                   }else{

                    $estado = "Inactivo";

                   }

                          echo "
                            <tr>
                              <td>$fila[1] </td>
                              <td> $fila[2] </td>
                               <td>$fila[4]</td>
                               <td>$tipoUser</td>
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
      <h3 id="myModalLabel">Crear Usuario</h3>
    </div>
    <div class="modal-body">

      <form class="span8" action="crudUsuariosControlador.php" method="post" >

                                <div class="form-group">
                                    <input   type="text" name="nombre" id="nombre" tabindex="1" class=" form-control span4"
                                           placeholder="Nombres" value="" required>
                                </div>
                                <div class="form-group   ">
                                    <input   type="text" name="apellido" id="apellido" tabindex="1" class=" form-control span4"
                                           placeholder="Apellidos" value="" required>
                                </div>
                                <div class="form-group  ">
                                    <input   type="email" name="email" id="email" onkeyup="validarCorreo('#username');" tabindex="1" class=" form-control span4"
                                           placeholder="Correo electronico" value="" required>
                                </div>
                                <div class="form-group" id="pass">
                                    <input   type="password" name="password" onkeyup="validarPassword();" id="password"
                                           class=" form-control span4 " placeholder="Contraseña" tabindex="2" required>
                                </div>
                                <div class="form-group   " id="pass1">
                                    <input   type="password" onkeyup="validarPassword();" name="rPassword" id="rPassword"
                                           tabindex="2" class=" form-control span4" placeholder="Confirmar contraseña" required>
                                </div>
                                <div class="form-group hidden" id="errorPass" style="color: #ff0000; font-size: 23px;">
                                    <br>
                                    <img src="../img/Error-128.png" width="20" height="20"><strong> Las contraseñas no
                                        coinciden</strong>
                                </div>

    </div>
    <div class="modal-footer">
      <!-- Cierre modal -->
      <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
      <!-- Boton envio datos -->
      <button type="submit" name="guardarUsuario" id="guardarTrabajador"class="btn btn-primary">Guardar</button>
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

      <form style="min-width: 500px;" action="crudUsuariosControlador.php" method="post" >

                                <div class="form-group">
                                  <input id="codigoE" name="id" type="hidden">
                                  </div>
                                <div class="form-group">
                                  <input   type="text" name="nombre" id="nombreE" tabindex="1" class=" form-control span4"
                                           placeholder="Nombres" value="" required>
                                </div>
                                <div class="form-group">
                                    <input   type="text" name="apellido" id="apellidoE" tabindex="1" class=" form-control span4"
                                           placeholder="Apellidos" value="" required>
                                </div>
                                <div class="form-group">
                                    <input   type="text" name="email" id="emailE" tabindex="1" class=" form-control span4"
                                           placeholder="Correo electronico" value="" required>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <input   type="email" name="tipoUser" id="tipoUserE" tabindex="1" class=" form-control span4"
                                           placeholder="Tipo Usuario" required value="">
                                </div> -->

    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="modificarUsuario" id="modificarTrabajador"class="btn btn-primary">Modificar</button>
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

      <form action="crudUsuariosControlador.php" method="post" >

                                  <input id="idEliminar" name="idEliminar" type="hidden">
                                  <h3>Seguro desea desactivar el trabajador</h3>
    </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    <button type="submit" name="eliminar" id="eliminar"class="btn btn-primary">desactivar</button>
  </div>

  </form>
</div>
<!-- Fin modal -->



  <?php
  include "../componentes/pie.php";
  ?>
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


   function validarPassword() {

        var password = document.getElementById("password").value;
        var rPassword = document.getElementById("rPassword").value;

        if (password !== "" && password !== null && rPassword !== "" && rPassword !== null) {
            if (password === rPassword) {



                document.getElementById("errorPass").className = "hidden";
                document.getElementById("pass").className = "form-group";
                document.getElementById("pass1").className = "form-group";
            }else {
                document.getElementById("pass").className += " has-error";
                document.getElementById("pass1").className += " has-error";
                document.getElementById("errorPass").className = "form-group";

            }
        }
    }

    function agregarForm(datos){
      d=datos.split("||");

       $("#codigoE").val(d[0]);
       $("#idEliminar").val(d[0]);
       $("#nombreE").val(d[1]);
       $("#apellidoE").val(d[2]);
       $("#emailE").val(d[4]);
    }

  </script>

</body>
</html>
