<?php 
include "../util/util.php";
include_once "../util/utilModelo.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = "row">
        <div class = "offset-md-3 col-md-6"
        <br>
            <h1>Crear Reporte</h1>
            <form action = "crearReporte.controller.php" method = "post" class="row g-3">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">ID Usuario</label>
    <input type="text" class="form-control" name = "id_usuario1" id="validationDefault01" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">ID PC</label>
    <input type="text" class="form-control" name = "id_PC1" id="validationDefault02" required>
  </div>
  <div class="col-md-6">

  <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" name = "descripcion" style="height: 100px" id="floatingTextarea"></textarea>
  <label for="floatingTextarea">Descripción</label>
  <div class="col-6">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>
</div> 
        </body>
</html>

<?php 
include_once('../componentes/pie.php');
?>