<?php

include_once "../conexion.php";

$con = mysqli_connect("bs8xt34tfk2kcawkul5c-mysql.services.clever-cloud.com", "ukr70bves9og4fn5", "tsQBVGEuldvU2dl3D6x7");
// $con = mysqli_select_db($link, "bs8xt34tfk2kcawkul5c");


if(isset($_POST['olvideClave'])){
        // $email = mysqli_real_escape_string($con, $_POST['email']);
        $email = $_POST['email'];
        $check_email = "SELECT * FROM usuario WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usuario SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            // if($run_query){
            //     $subject = "Password Reset Code";
            //     $message = "Your password reset code is $code";
            //     $sender = "From: shahiprem7890@gmail.com";
            //     if(mail($email, $subject, $message, $sender)){
            //         $info = "We've sent a passwrod reset otp to your email - $email";
            //         $_SESSION['info'] = $info;
            //         $_SESSION['email'] = $email;
            //         header('location: reset-code.php');
            //         exit();
            //     }else{
            //         $errors['otp-error'] = "Failed while sending code!";
            //     }
            // }else{
            //     $errors['db-error'] = "Something went wrong!";
            // }
        }else{
            // $errors['email'] = "This email address does not exist!";
            echo "El correo no esta en la base de datos";
        }
    }
?>