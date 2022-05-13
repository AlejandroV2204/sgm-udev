<?php

    @session_start();

    include "../util/util.php";
    include_once "../util/utilModelo.php";
    $utilModelo2 = new utilModelo();
    $util = new util();
    $nombreCampo = array("id_usuario");
    $valor = array($_SESSION['usuario'][0]);
    $tabla = "usuario";

    $result = $utilModelo2->mostrarregistros($tabla, $nombreCampo, $valor);
    while ($fila = mysqli_fetch_array($result)) {
        if ($fila != NULL) {
            $nombre = $fila['nombre'];
            $codigoUsuario = $fila['id_usuario'];
            $code = $fila['codigo'];

        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>u_dev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/pages/dashboard.css" rel="stylesheet">
    <link href="../css/pages/plans.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <?php 

    // Condicion de funcion o no funcion

    if($code == 0){

    include "../componentes/menuPrincipalAdmin.php";

    }else{
        
        //No se pone nada de fondo

    }
    ?>
</head>

<body>

<!-- Cambio expuesto por Julian condicion pra obligar a el usuario a cambiar password  -->
<?php 

     if($code != 0){

    ?>

     <!-- inicio modal eliminar -->
<div id="modalextra" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-header" align="center">
    <h3 id="myModalLabel">Aviso de cambio para cambio de contraseña</h3>
  </div>
      
  <div class="modal-body" align="center">
      <form action="../cambiarPassword/cambiarPasswordVista.php" method="post">
        
       <p>Se informa que es obligatorio que cambies tu contraseña ingresa mediante el boton abajo</p>
       
  <div align="center">
       <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" name="renvioPass" id="renvioPass" class="btn btn-primary">Entrar Cambio Contraseña</button>
       </div>
       <div>
  </form>
</div>
<!-- Fin modal -->



    <!-- Aqui trabaja el reponsable de inicio para ser mas preciso
    Trabaja Dilan  -->
  <?php

    // Responcibe de Dilan
  }else{

  ?>

      <!-- De la linia 104 empieza code de Dilan Alerta no tocar lo de dilan  -->
 
       <!-- Toda la visual de dilan se sube al develop con un buen funcionamiento
       mediante el proceso de aliniacion -->
    <div class="containero">
        <!-- <h2>Hola <?php echo $nombre ?>, es un gusto tenerte de vuelta!</h2> -->

        <div class="row">


            <div class="card-category-1">

                <?php
                        
                            
                    $tabla = "reporte, usuario";
                    $result = $utilModelo2->consultarVariasTablas("id_reporte, descripcion_reporte, nombre",$tabla,"id_usuario1 = id_usuario");
                    while ($fila = mysqli_fetch_row($result)) {


                      echo  "<div class=\"basic-card basic-card-dark\">
                                <div class=\"card-content\">
                                  <span class=\"card-title\">Reporte# $fila[0]</span>
                                        <p class=\"card-text\">
                                            $fila[1]
                                        </p>
                                </div>
            
                                <div class=\"card-link\">
                                        <a href=\"../revision/crudRevisionVista.php?idReporte=$fila[0]\" title=\"Read Full\"><span>Reporte hecho por: $fila[2]</span></a>
                                 </div>
                             </div>
                                
                                
                                ";
                                
                            }

                        ?>
            </div>
        </div>
        </div>
        
<?php
            include "../componentes/pie.php";
             ?>
    <?php
  }
?>
    
    <!-- Javascript -->
    <script src="../js/jquery-1.7.2.min.js"></script>
  <script src="../js/excanvas.min.js"></script>
  <script src="../js/funciones.js"></script>
  <script src="../js/chart.min.js" ></script>
  <script src="../js/bootstrap.js"></script>
  <script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>

<script src="js/base.js"></script>

</body>
</html>