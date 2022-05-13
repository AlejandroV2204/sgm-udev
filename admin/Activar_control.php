<?php
@session_start();
include_once '../util/utilModelo.php';
$utilModelo = new utilModelo();

if(isset($_POST["activar"])){
echo "Activar";

$campo = array("estado_usuario");
$valor = array('1');

$id=$_POST['id'];

$utilModelo->modificar('usuario',$campo, $valor,'id_usuario', $id) ;
$_SESSION['mensajeOk']="Accion realizada";
header('Location: Activar.php');

}

?>