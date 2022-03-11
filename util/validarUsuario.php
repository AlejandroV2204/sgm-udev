<?php
include_once "utilModelo.php";

//recibe el nombre de usuario para validar
$user =$_POST["email"];
//recibe el codigo de referido que se verica su existencia
$referido =$_POST["b"];
//clave que se envia para saber que funcion utilizar 0 = validar usuario 1 = validar referido 
$clave =$_POST["clave"];



      if($clave==0) {
        
            validarCorreo($user);
      }else{
            validarReferido($referido);
      }


      //Cambio logica y nombre de la validacion del usuario para reutilizar para que me valide el correo
      function validarCorreo($b) {
        $utilModelo = new utilModelo();
            $result = $utilModelo->consultarVariasTablas("*","email","id='$b'");
              $rowcount=mysqli_num_rows($result);
            
            
                if($rowcount!= 0) {
            echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";

                }else{
                  echo( "<span style='font-weight:bold;color:green;'>Usuario Disponible.</span>");

            }
      
    }
    function validarReferido($b) {
        $utilModelo = new utilModelo();
            $result = $utilModelo->consultarVariasTablas("*","usuario","codigo='$b'");
            $rowcount=mysqli_num_rows($result);            
                if($rowcount!= 0) {
                    echo( "<span style='font-weight:bold;color:green;'>Codigo Valido.</span>");

                }else{
                 
                     echo "<span style='font-weight:bold;color:red;'>No se encuentra el referido</span>";

            }
      
    }



 ?>
