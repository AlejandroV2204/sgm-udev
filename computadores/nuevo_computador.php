<?php include_once('../conexion.php');
      include_once('../util/utilModelo.php');
      include_once('../util/util.php');

      $util = new util();  
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Identificador del PC</label>
                            <input type="text" class="form-control" name="id_pc">
                            <label for="inputPassword4" class="form-label">Sistema operativo</label>
                            <input type="text" class="form-control" name="so_pc">
                        </div>
                        
                        <div class="class container my-3">
                    
                            <div class="col-6">
                                <label for="validationCustom02" class="form-label">Motherboard</label>
                                <input type="text" class="form-control" name="mobo_pc" placeholder="ASUS H61M-K">
                            </div>
                            
                        </div>
                    
                        <!-- <div class="col-md-4"> -->
                            
                            <label for="validationCustom03" class="form-label">Lugar ubicado:</label>
                            <select name="sala" class="form-select">

                        <?php

                        echo "osdo";

                            $tabla = "sala";
                            $campo = array("nombre_sala");
                            $valor = "s1";

                            $sql = $utilidad->mostrarTodosRegistros($tabla);

                            while($row = $sql->fetch_assoc()){
                                
                                // echo "<option value = \"Seleccione\">". $row['nombre_sala']. "</option>";
                                echo "<option value = ".$row['id'].">". $row['nombre_sala']. "</option>";
                            }
                         

                        ?>
                            </select>

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
                            
                            <?php echo "<input type=\"date\" id=\"start\" name=\"trip-start\" 
                                    value=\"$util->hoy();\"
                                    min=\"2018-01-01\" max=\"2018-12-31\">" ?>


                            
                    
                            <div class="col-3">
                                <label for="validationCustom16" class="form-label">Salidas de video</label>
                                <input type="text" class="form-control" name="salidas_video" placeholder="">
                            </div>
                            
                        <!-- </div> -->
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    
                    </form>


                    <form>
  <div class="form-group">
    <label for="id_pc">ID Computador</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-reorder"></i>
        </div>
      </div> 
      <input id="id_pc" name="id_pc" placeholder="PC05-SALA1" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label>Sistema Operativo</label> 
    <div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-radio">
          <input name="so_pc" id="so_pc_0" type="radio" required="required" class="custom-control-input" value="Windows"> 
          <label for="so_pc_0" class="custom-control-label">Windows 10</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-radio">
          <input name="so_pc" id="so_pc_1" type="radio" required="required" class="custom-control-input" value="Windows 8"> 
          <label for="so_pc_1" class="custom-control-label">Windows 8</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-radio">
          <input name="so_pc" id="so_pc_2" type="radio" required="required" class="custom-control-input" value="Ubuntu/Derivados"> 
          <label for="so_pc_2" class="custom-control-label">Ubuntu/Derivados</label>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="mobo_pc">Motherboard</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-braille"></i>
        </div>
      </div> 
      <input id="mobo_pc" name="mobo_pc" placeholder="h61m-k" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="procesador">Procesador</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-microchip"></i>
        </div>
      </div> 
      <input id="procesador" name="procesador" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="velocidad_ram">Velocidad RAM</label> 
    <div>
      <select id="velocidad_ram" name="velocidad_ram" required="required" class="custom-select">
        <option value="800mhz">800mhz</option>
        <option value="1066mhz">1066mhz</option>
        <option value="1333mhz">1333mhz</option>
        <option value="1600mhz">1600mhz</option>
        <option value="1800mhz">1800mhz</option>
        <option value="2133mhz">2133mhz</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label>Tipo graficos</label> 
    <div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="tipo_graficos" id="tipo_graficos_0" type="radio" class="custom-control-input" value="Integrados" required="required"> 
        <label for="tipo_graficos_0" class="custom-control-label">Integrados</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="tipo_graficos" id="tipo_graficos_1" type="radio" class="custom-control-input" value="Dedicados" required="required"> 
        <label for="tipo_graficos_1" class="custom-control-label">Dedicados</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="capacidad_disco">Disco duro</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-codiepie"></i>
        </div>
      </div> 
      <input id="capacidad_disco" name="capacidad_disco" placeholder="ej: 500GB" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group">
    <label>Tiene:</label> 
    <div>
      <div class="custom-control custom-checkbox custom-control-inline">
        <input name="mouse/teclado" id="mouse/teclado_0" type="checkbox" class="custom-control-input" value="mouse" required="required"> 
        <label for="mouse/teclado_0" class="custom-control-label">Mouse</label>
      </div>
      <div class="custom-control custom-checkbox custom-control-inline">
        <input name="mouse/teclado" id="mouse/teclado_1" type="checkbox" class="custom-control-input" value="teclado" required="required"> 
        <label for="mouse/teclado_1" class="custom-control-label">Teclado</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Estado del Panel Frontal</label> 
    <div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="panel_frontal" id="panel_frontal_0" type="radio" class="custom-control-input" value="rabbit" required="required"> 
        <label for="panel_frontal_0" class="custom-control-label">funcional</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="panel_frontal" id="panel_frontal_1" type="radio" class="custom-control-input" value="duck" required="required"> 
        <label for="panel_frontal_1" class="custom-control-label">con fallas</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="panel_frontal" id="panel_frontal_2" type="radio" class="custom-control-input" value="fish" required="required"> 
        <label for="panel_frontal_2" class="custom-control-label">no funciona</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Lectora CD/DVD</label> 
    <div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="lectora_dvd" id="lectora_dvd_0" type="radio" class="custom-control-input" value="si" required="required"> 
        <label for="lectora_dvd_0" class="custom-control-label">si</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="lectora_dvd" id="lectora_dvd_1" type="radio" class="custom-control-input" value="no" required="required"> 
        <label for="lectora_dvd_1" class="custom-control-label">no</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="ventiladores">Numero Ventiladores:</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-first-order"></i>
        </div>
      </div> 
      <input id="ventiladores" name="ventiladores" placeholder="3" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="salidas_video">Salidas Video</label> 
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fa fa-wrench"></i>
        </div>
      </div> 
      <input id="salidas_video" name="salidas_video" type="text" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group">
    <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
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