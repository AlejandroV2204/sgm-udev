<?php
include_once "utilModelo.php";

//recibe el correo de usuario para validar
$user =$_POST["email"];
$table = "usuario"



      // if($clave==0) {
        
      //       validarCorreo($user);
      // }


      //Cambio logica y nombre de la validacion del usuario para reutilizar para que me valide el correo
      function validarCorreo($user) {
        $utilModelo = new utilModelo();
            $result = $utilModelo->consultarVariasTablas($user, $table ,"email='$user'");
              $rowcount=mysqli_num_rows($result);
               
            
                if($rowcount != 0) {
            echo "<span style='font-weight:bold;color:red;'>El Correo de usuario ya existe.</span>";

                }else{
                  echo( "<span style='font-weight:bold;color:green;'>Correo Disponible.</span>");

            }
      
    }

 ?>
