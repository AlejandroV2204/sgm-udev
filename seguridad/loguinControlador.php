<?php
@session_start();
include '../util/utilModelo.php';
$util = new utilModelo();

$usuario = filter_input(INPUT_POST, 'userini');
$password = filter_input(INPUT_POST, 'ipassword');
$validar = 1;

$nombreCampo = array("email","password", "estado_usuario");

$valor = array("$usuario","$password", "$validar");
$tabla = "usuario";
$result = $util -> mostrarregistros($tabla,$nombreCampo,$valor);
$contador = 0;
while ($fila = mysqli_fetch_array($result)) {
     if ($fila != NULL) {
        $_SESSION['usuario']=array($fila['id_usuario'],$fila['tipo_usuario'],$fila['codigo']);
        $contador++;
    }
}

include "../util/util.php";
$util1 = new util();
$util1 -> validarRuta(4);
?>
