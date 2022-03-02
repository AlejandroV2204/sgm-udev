<?php 
include "../util/util.php";
include_once "../util/utilModelo.php";
$utilModeloReparacion2 = new utilModelo();
$utilReparacion=new util();

//$id_reparacion=$_REQUEST['id'];
$id_reporte1=filter_input(INPUT_POST,'id_reporte1');
$fecha=filter_input(INPUT_POST,'fecha');
$descripcion=filter_input(INPUT_POST,'descripcion');


$campos= array ("id_reporte1","fecha","descripcion");
$valores= array ($id_reporte1,$fecha,$descripcion);
$tabla= "reparacion";  
$utilModeloReparacion2 -> insertar($tabla,$campos,$valores);

echo "informacion enviada a la tabla reparaciones";
$_SESSION['mensajeOK']="Accion realizada"; 
header('Location:../admin/adminVista.php');
 
?>
