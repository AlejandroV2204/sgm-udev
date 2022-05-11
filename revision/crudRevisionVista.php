<?php
// include "../util/utilOsdo.php";
include_once "../util/utilModelo.php";
include_once "../util/util.php";
$util = new util();
$utilmodelo = new utilModelo();

$util -> validarRuta(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>REVISIÓN</title>
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

$idReporte = filter_input(INPUT_GET, 'idReporte');

$tabla = "reporte";
$nombreCampo = array("id_reporte");
$valores = array("$idReporte");

$consulta = $utilModelo->mostrarregistros($tabla, $nombreCampo, $valores);

$row = $consulta->fetch_assoc();
$id_reporte = $row['id_reporte'];
?>

    <div class = "span11">
        
            <h1>Revisión De Reporte</h1>
            <form action = "crudRevisionControlador.php" method = "GET" class="row g-3">
  <div class="col-md-4">
    
    <input type="hidden" name="id_reporte" id="id_reporte" tabindex="1" class=" form-control span6"  value="<?php echo $id_reporte; ?>" > </label>
    
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Nombre PC:
      <input type="text" name="descripcion_reporte" id="id_pc1" tabindex="1" class=" form-control span6"  value="<?php echo $row['id_pc1']; ?>" disabled> </label>
    </label>
  </div>
  <div class="col-md-6">

  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Descripción:
      <input type="text" name="descripcion_reporte" id="id_reporte" tabindex="1" class=" form-control span6"  value="<?php echo $row['descripcion_reporte']; ?>" disabled> </label>
    </label>
  </div>
  <div class="col-md-6">

  <div class="form-floating">
  <label for="floatingTextarea">Observación:</label>
  <textarea class="form-control" placeholder="Deja tu observación aquí." name = "observacion_reporte" style="height: 100px" id="floatingTextarea"></textarea>
  <div class="col-6">
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</div>
</form>

<?php  
include "../componentes/pie.php";
?> 

</body>
</html>
