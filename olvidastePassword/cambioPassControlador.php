<?php
include_once "../conexion.php";
include_once "../util/utilModelo.php";

  $utilModelo = new utilModelo();

if(isset($_POST['olvideClave'])){

    //Correo al que se le valida
    $email = $_POST['email'];
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

        $utilModelo->modificar($tabla, $campo, $valor, "email", $email);

           echo "Todo va bien";


        // Codigo Dilan 


         // $insert_code = "UPDATE usuario SET $campo = $code WHERE email = '$email'";
            // $run_query =  mysqli_query($con, $insert_code);
        //     $email = mysqli_real_escape_string($con, $_POST['email']);
        //     $check_email =  "SELECT * FROM usuario WHERE email='$email'";
        //     $run_sql = mysqli_query($con, $check_email);
        //     if($run_query){
        //         $subject = "Password Reset Code";
        //         $message = "Your password reset code is $code";
        //         $sender = "From: shahiprem7890@gmail.com";
        //         if(mail($email, $subject, $message, $sender)){
        //             $info = "We've sent a passwrod reset otp to your email - $email";
        //             $_SESSION['info'] = $info;
        //             $_SESSION['email'] = $email;
        //             header('location: reset-code.php');
        //             exit();
        //         }else{
        //             $errors['otp-error'] = "Failed while sending code!";
        //         }
        //     }else{
        //         $errors['db-error'] = "Something went wrong!";
        //     }
         }else{
             $_SESSION['error'] = "Correo inesistente";
            echo "El correo no esta en la base de datos";
        }
}
?>