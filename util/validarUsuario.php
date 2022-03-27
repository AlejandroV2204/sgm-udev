<?php
include_once "utilModelo.php";
$utilModelo = new utilModelo();

      //Cambio logica y nombre de la validacion del usuario para reutilizar para que me valide el correo
       function validarCorreo($cor) {

        //recibe el correo de usuario para validar
           $campo = "email";
           $tabla = "usuario";

           echo $cor;


            $result = $utilModelo->consultarVariasTablas($campo ,$tabla ,"$campo'='$cor");
              
            $rowcount=mysqli_num_rows($result);
               
              if($rowcount != 0) {

               echo "<span style='font-weight:bold;color:red;'>El Correo ya existe intente con otro.</span>";

              }else{

                echo( "<span style='font-weight:bold;color:green;'>Correo Disponible.</span>");

            }
      
     }
    
 ?>
