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
    <title>Document</title>
</head>
<body src="../img/fondo_login.png">
            <!-- Contenedor vista -->
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-14">
                                <a class="active" id="login-form-link">Olvidaste tu Contraseña</a>
                        </div>
                    </div>
                    <hr>
                </div>
                           <!-- Inicio metodo envio de correo recuperar contra -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="cambioPassControlador.php" method="post" role="form"
                                  style="display: block;">
                                      
                                  <div class="row">
                                      <div class="col-sm-6 col-sm-offset-3">        
                                  <img src="../img/signin/imagenSeguridad.png"> 
                                      </div>
                                  </div>

                                <div class="form-group">
                                    <input type="text" name="email" id="email" tabindex="1" class="form-control"
                                           placeholder="Correo">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="olvideClave" tabindex="4"
                                                    value="Enviar" class = "form-control btn btn-login">
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <!-- Fin recuperar Contra -->
</body>
</html>