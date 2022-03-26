<?php
@session_start();
include '../util/utilModelo.php';
$util = new utilModelo();


$usuario = filter_input(INPUT_POST, 'userini');
$password = filter_input(INPUT_POST, 'ipassword');


$nombreCampo = array("email","password");


$valor = array("$usuario","$password");
$tabla = "usuario";
$result = $util -> mostrarregistros($tabla,$nombreCampo,$valor);
$contador = 0;
while ($fila = mysqli_fetch_array($result)) {
     if ($fila != NULL) {
        $_SESSION['usuario']=array($fila['id_usuario'],$fila['tipo_usuario']);
        $contador++;
    }
}

include "../util/util.php";
$util1 = new util();
$util1 -> validarRuta(4);
?>
