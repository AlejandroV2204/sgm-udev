<?php
    @session_start();
    include '../util/utilModelo.php';
    $utilModelo = new utilModelo();
    
      if(isset($_POST['guardarPass'])){

    $password = filter_input(INPUT_POST, 'password');
    $codigoSubir = 0;
    $tabla = "usuario";

    //Variables de actuaizar Contraseña

    $campos = array("password", "codigo");

    $valores = array($password, $codigoSubir);

    $utilModelo->modificar($tabla,$campos,$valores,'id_usuario', $_SESSION['usuario'][0]);

    $_SESSION['mensajeOk']="La contraseña fue cambiado con exito";
    
    header('Location: ../cambiarPassword/cambiarPasswordVista.php');
         exit();

    }else{

      header('Location: ../admin/adminVista.php');
      exit();

    }
    ?>