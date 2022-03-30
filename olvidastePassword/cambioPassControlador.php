<?php
include_once "../conexion.php";
include_once "../util/utilModelo.php";

  $utilModelo = new utilModelo();

if(isset($_POST['olvideClave'])){

    //Correo al que se le valida
    $email = filter_input(INPUT_POST, 'email');
    //Tabla 
    $tabla = "usuario";

    $consulCorreo = $utilModelo->consultarVariasTablas("*", $tabla, "email='$email'");    
        if($consulCorreo->num_rows > 0){
            //Se genera code
            $code = rand(999999, 111111);
 
            // Convierto a un array el campo para que lo reciva mi funcion
            $valor = array("$code");
            //Campo tal cual como aparece en la base ede datos
            $campo = array("codigo");

        $envio = $utilModelo->modificar($tabla, $campo, $valor, "email", $email);
            if($envio){
               
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
                    }
                }
                 $mensaje = "Hola espero que estes bien $nombre $apellido el codigo de validacion para el
                 cambio de tu contraseña es: $code";


                 echo $destino.$encabesado.$mensaje;

                 mail($destino, $encabesado, $mensaje);

                  if(mail($destino, $encabesado, $mensaje) == true){
                  echo "se mando";
                  }else{
                      echo "puta";
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