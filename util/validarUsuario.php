<?php
include_once "utilModelo.php";

//recibe el correo de usuario para validar
 $cor = $_POST["#email"];
 $tabla = "usuario";

      //Cambio logica y nombre de la validacion del usuario para reutilizar para que me valide el correo
      function validarCorreo($cor) {
        
        $utilModelo = new utilModelo();

            $result = $utilModelo->consultarVariasTablas("*", $tabla ,"email='$cor'");
              $rowcount=mysqli_num_rows($result);
               
            
              if($rowcount != 0) {

               echo "<span style='font-weight:bold;color:red;'>El Correo de usuario ya existe.</span>";

              }else{

                echo( "<span style='font-weight:bold;color:green;'>Correo Disponible.</span>");

            }
      
    }

 ?>
