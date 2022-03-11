<?php include_once('../conexion.php');
      include_once('util/utilModelo.php');

      $utilidad = new utilModelo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>NOMBRE S.A.</title>
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
                        
                    
                    <form class="row g-3 my-3" action="control_computador.php" method="post">
                        
                        <h1>Nuevo computador</h1>
                        <br>
                        <br>
                        <!-- <div class="col-md-2"> -->
                            <label for="validationCustom01" class="form-label">Identificador del PC</label>
                            <input type="text" class="form-control" name="id_pc">
                            <label for="inputPassword4" class="form-label">Sistema operativo</label>
                            <input type="text" class="form-control" name="so_pc">
                        <!-- </div> -->
                        
                        <!-- <div class="class container my-3"> -->
                    
                            <!-- <div class="col-3"> -->
                                <label for="validationCustom02" class="form-label">Motherboard</label>
                                <input type="text" class="form-control" name="mobo_pc" placeholder="ASUS H61M-K">
                            <!-- </div> -->
                            
                        <!-- </div> -->
                    
                        <!-- <div class="col-md-4"> -->

                        <?php

                            $utilidad->mostrarregistros('sala', )

                        ?>
                            <label for="validationCustom03" class="form-label">Lugar ubicado:</label>
                            <select name="sala" class="form-select">
                            <option selected value="1">Sala 1</option>
                            <option value="2">Sala 2</option>
                            <option value="3">Sala 3</option>
                            <option>Sala 4</option>
                            <option>Sala 5</option>
                            <option>Sala 6</option>
                            </select>"

                        <!-- </div> -->
                    
                        <!-- <div class="class container my-3"> -->
                    
                            <div class="col-3">
                                    <label for="validationCustom04" class="form-label">Procesador</label>
                                    <input type="text" class="form-control" name="procesador" placeholder="Intel Pentium E5300">
                                </div>
                        
                                
                        
                                <label for="customRange3" class="form-label">Cantidad RAM</label>
                                    <input type="range" name="cantidad_ram" class="form-range" min="0" max="32" step="4" oninput="rangeValue.innerText = this.value">
                                    <p id="rangeValue">4</p>
                        
                                    <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Velocidad RAM</label>
                                <select name="velocidad_ram" class="form-select">
                                <option selected value="1333mhz">1333Mhz</option>
                                <option value="1006mhz">1066Mhz</option>
                                <option value="1600mhz">1600mhz</option>
                                <option value="2133mhz">2133mhz</option>
                                <option value="2600mhz">2600mhz</option>
                                
                                </select>
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom07" class="form-label">Tipo de graficos</label>
                                <input type="text" class="form-control" name="tipo_graficos" placeholder="Dedicados/Integrados">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom08" class="form-label">Capacidad disco</label>
                                <input type="text" class="form-control" name="capacidad_disco" placeholder="500GB">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom09" class="form-label">Mouse</label>
                                <input type="text" class="form-control" name="mouse" placeholder="">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom10" class="form-label">Teclado</label>
                                <input type="text" class="form-control" name="teclado" placeholder="">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom11" class="form-label">Estado del panel frontal</label>
                                <input type="text" class="form-control" name="panel_frontal" placeholder="">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom12" class="form-label">Lectora CD/DVD</label>
                                <input type="text" class="form-control" name="lectora_dvd" placeholder="">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom13" class="form-label">Ventiladores</label>
                                <input type="text" class="form-control" name="ventiladores" placeholder="">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom14" class="form-label">Ultima pasta termica</label>
                                <input type="text" class="form-control" name="ultima_termica" placeholder="">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom15" class="form-label">Ultimo mantenimiento</label>
                                <input type="text" class="form-control" name="ultimo_man" placeholder="">
                            </div>
                    
                            <div class="col-3">
                                <label for="validationCustom16" class="form-label">Salidas de video</label>
                                <input type="text" class="form-control" name="salidas_video" placeholder="">
                            </div>
                            
                        <!-- </div> -->
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    
                    </form>
            




                </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /div-main -->

<?php
    include "../componentes/pie.php";
?>
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/excanvas.min.js"></script>
<script src="../js/chart.min.js" type="text/javascript"></script>
<script src="../js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>

<script src="js/base.js"></script>

</body>
</html>