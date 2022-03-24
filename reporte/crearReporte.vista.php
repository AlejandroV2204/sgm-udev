<?php
include "../util/util.php";
include_once "../util/utilModelo.php";
$util = new util();

$util -> validarRuta(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>sgm-udev</title>
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
<div class="container">
    <div class="row">
		<form action = "crearReporte.controller.php" method = "post"  role="form" class="col-md-9 go-right">
			<h2>Crear reporte</h2>
      <br>
       
			<div class="form-group">
      <label for="validationDefault01">ID usuario</label>
			<input id="validationDefault01" name="id_usuario1" type="text" class="form-control" required>
		</div>
		<div class="form-group">
    <label for="validationDefault02">ID PC</label>
			<input id="validationDefault02" name="id_PC1" type="text" class="form-control" required>
		</div>
		<div class="form-group">
    <label for="floatingTextArea2">Descripción</label>
			<textarea id="floatingTextArea2" name="descripcion" class="form-control" required></textarea>
		</div>
    <div class="col-12">
    <button class="btn btn-primary" type="submit">Crear</button>
  </div>
    </div>
</form>     
</div>


<?php 
include_once('../componentes/pie.php');
?>