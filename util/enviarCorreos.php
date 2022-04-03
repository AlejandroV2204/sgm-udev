<?php
//Utilidades
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Librerias
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

//Clase
class correoSmtp{
    //Funcion
   function enviarCorreos($destinatario,$asunto,$mensaje){

    //Instancia 
     $email = new PHPMailer(true);

        try{

            //Server sentencia
            $email->SMTPDebug = 0;
            $email->isSMTP();
            $email->Host = "smtp-julianesteban.alwaysdata.net";                      //El host
            $email->SMTPAuth = true;
            //Editables de envio
            $email->Username = 'julianesteban@alwaysdata.net';                     //SMTP usuario designado
            $email->Password = 'osquitarPerro';                            //Contraseña
            $email->STMPSecure = 'tls';
            $email->Port = 587;                                     //puerto

            //Destinatario
            $email->setFrom('julianesteban@alwaysdata.net', 'Administracion');
            $email->addAddress($destinatario, '');       //Agrego destinatario

            // Contenedor
            $email->isHTML(true);               //Inserto correo en HTML
            $email->Subject = $asunto;
            $email->Body = $mensaje;
            $email->AltBody = 'Funcion no definida';

            $email->send();

        }catch (Exception $e) {
            echo "<h2 class = 'login-form-link'>Error de conexion con el servicio<h2>";
            //header("Location: ../olvidastePassword/cambioPassVista.php"); 
            return false;

   }
 }
}
?>