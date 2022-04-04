<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/estiloLogin.css" rel="stylesheet" id="estiloLogin">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/login.js"></script>
    <script src="../js/funciones.js"></script>
    <title>Validar Codigo</title>
</head>
<body>
<form action="cambioPassControlador.php" method="post">
<div class="container" >
  <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
       <h3>Ingrese su codigo</h3>
          </div>
          <div class="form-group">
         <input type="text" name="code" id="code" tabindex="1" class="form-control"
         placeholder="Codigo" pattern= "[0-9]+" value="">
            </div>
            <div class="row">
                <div class="col-sm-5 col-sm-offset-3">
                    <input type="submit" name="valida" id="login-submit" tabindex="4"
                        class="form-control btn btn-login" value="Validar Codigo">
                    </div>
                </div>
       </div> 
      </div>
   </div>
</div>
    
</body>
</html>