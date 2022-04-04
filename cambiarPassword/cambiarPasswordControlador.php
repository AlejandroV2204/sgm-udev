<?php
    @session_start();
    include '../util/utilModelo.php';
    $utilModelo = new utilModelo();
    
      if(isset($_POST['guardarPass'])){

    $password = filter_input(INPUT_POST, 'password');

    $tabla = "usuario";
    //Variables de actuaizar Contraseña
    $campos = array("password");
    $valores = array($password);
    $utilModelo->modificar($tabla,$campos,$valores,'id_usuario',$_SESSION['usuario'][0]);
    $_SESSION['mensajeOk']="La contraseña fue cambiado con exito";
    header('Location: ../componentes/menuPrincipalAdmin.php');
    exit();
      
    }else{

      header('Location: ../componentes/menuPrincipalAdmin.php');

    }
    ?>