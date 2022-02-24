<?php

include_once('../header.php')
?>
<div class="row"> 
<div class="offset-md-3 col-md-6">
<form  action ="reparacionesController.php" method ="post" class="row g-3">
 
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
    <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
</form>
</div>


<?php

include_once("../footer.php");
