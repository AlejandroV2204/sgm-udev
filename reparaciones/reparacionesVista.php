<?php
    include "../componentes/menuPrincipalAdmin.php";
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



    <div class="container">
    <div class="row">
		<form role="form" method="post" action="crearSala.controller.php" class="col-md-9 go-right">
			<h2>Crear Reporte</h2>
      <br>
			<div class="form-group">
      <label for="name">id reporte</label>
			<input id="name" name="id_reporte1" type="text" class="form-control" required>
			
		</div>
		<div class="form-group">
    <label for="phone">Fecha</label>
			<input id="phone" name="fecha" type="tel" class="form-control" required>
			
		</div>
		<div class="col-md-4">
    <label for="validationDefault02" class="form-label">Fecha</label>
    <input type="text" class="form-control" name="fecha"  id="validationDefault02"  required>
  </div>
		</div>
</div>
   <ul  class="col-12">
     <button type="submit" class="btn btn-primary">Crear</button>
  </ul>
  
  </div>
 

<?php

include_once('../componentes/pie.php');

?>

