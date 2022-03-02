<?php 
include "../util/util.php";
include_once "../util/utilModelo.php";
$utilModeloReporte2 = new utilModelo();
$utilReporte=new util();

//$id_reporte=$_REQUEST['id'];
$id_usuario1 = filter_input(INPUT_POST,'id_usuario1');
$id_PC1 = filter_input(INPUT_POST,'id_PC1');
$descripcion = filter_input(INPUT_POST,'descripcion');


$campos= array ("id_usuario1","id_PC1","descripcion");
$valores= array ($id_usuario1,$id_PC1,$descripcion);
$tabla= "reporte";  
$utilModeloReporte2 -> insertar($tabla,$campos,$valores);

echo "informacion enviada a la tabla reporte";
$_SESSION['mensajeOK']="Accion realizada";
//header('Location: ../admin/adminVista.php');
 
?>

