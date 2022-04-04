<?php
@session_start();

//Librerias
include_once "../conexion.php";
include_once "../util/utilModelo.php";
include_once "../util/enviarCorreos.php";

  //Instancio
  $utilModelo = new utilModelo();
  $enviarEmail = new correoSmtp();

  
    //Correo al que se le valida
    $email = filter_input(INPUT_POST, 'email');

  //El boton que me trae la informacion
if(isset($_POST['olvideClave'])){

    //Tabla 
    $tabla = "usuario";

    // Consulto en campo en mi base de datos
    $consulCorreo = $utilModelo->consultarVariasTablas("*", $tabla, "email='$email'");    
        
    // si el correo existe en la base de datos
          if($consulCorreo->num_rows > 0){
      
            $valor = array()

            //Campo tal cual como aparece en la base ede datos
            $campo = array("password");

                    //Modifico el campo code password
                $edicion = $utilModelo->modificar($tabla, $campo, $valor, "email", $email);
                 if($edicion){
               
                 //A donde mando el mensaje
                 $destino = $email;
                 //El encavesado del mensaje
                 $encabesado = "Correo de cambio contraseña".
                 "Enviado desde la pagina SGM_UDEV";

                 //Extracion de el nombre y el apellido del usuario para mandarlo al correo
                 $nombreCampo = array("email");
                 $valor = array($email);
                 $resultado = $utilModelo->mostrarregistros("usuario", $nombreCampo, $valor);
                while ($fila = mysqli_fetch_array($resultado)) {
                    if ($fila != NULL) {
                         $nombre = $fila['nombre'];
                         $apellido = $fila['apellido'];
                         $password = $fila['password'];
                    }
                }

                 $complemento = "<h2> Tu password nueva es: $password<h2>";

                 $mensaje = "<h3>Udev Pagina oficial matenimiento Reporte y aviso de confirmacion de cambio password</h3>
                 <h3>Hola espero que estes bien $nombre $apellido el motivo de este mensaje es darle es codigo de 
                 validacion para su respectivo cambio de contraseña. </h3>
                 <br>
                 $complemento";

                 $enviarEmail->enviarCorreos($destino, $encabesado, $mensaje);

                  if($enviarEmail = true){
                //   echo "se mando";
                   header("Location: ../seguridad/loginVista.php");
                  }else{
                    header("Location: cambioPassVista.php");
                //   echo "puta";
                  }

            }else{
                $errors['db-error'] = "Something went wrong!";
            }
    }else{

        $_SESSION['error'] = "Correo inesistente";
        echo "El correo no esta en la base de datos";
    }
}

?>