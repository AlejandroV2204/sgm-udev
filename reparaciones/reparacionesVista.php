<?php

include_once('../componentes/menuPrincipal.php')
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/estiloLogin.css" rel="stylesheet" id="estiloLogin">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <link href="../css/style.css" rel="stylesheet">
    <script src="../js/login.js"></script>
    <script src="../js/funciones.js"></script>
    <title>INICIO</title>
</head>

<div class="row"> 
<div class="offset-md-3 col-md-6">
<form  action ="reparacionesController.php" method ="post" class="row g-3">
 
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Id_reporte1</label>
    <input type="text" class="form-control" name="id_reporte1"  id="validationDefault02"  required>
  </div>

  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Fecha</label>
    <input type="text" class="form-control" name="fecha"  id="validationDefault02"  required>
  </div>
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here"  name="descripcion" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Descripcion</label>
</div>
 
 
    </select>
  </div>
 
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
</form>
</div>
<!---<div class="row"> 
<div class="offset-md-3 col-md-6">
<form  action ="reparacionesController.php" class="col-md-9 go-right">
 
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Id_reporte</label>
    <input type="text" class="form-control" name="id_reporte1"  id="validationDefault02"  required>
  </div>

  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Fecha</label>
    <input type="text" class="form-control" name="fecha"  id="validationDefault02"  required>
  </div>
  </div>
  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here"  name="descripcion" id="floatingTextarea2" style="height: 100px"></textarea>
  <label for="floatingTextarea2">Descripcion</label>
</div>
 
 
    </select>
  </div>
 
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="col-12">
  </div>
  <button type="button" class="btn btn-info">Guardar</button>
  <button type="button" class="btn btn-default">Cancelar</button>
  </div>
</form>
</div>-->


<?php
include_once('../componentes/pie.php');
?>