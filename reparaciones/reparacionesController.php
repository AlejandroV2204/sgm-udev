<?php 
include "../util/util.php";
include_once "../util/utilModelo.php";
$utilModeloRepacacion = new utilModelo();
$utilReparacion=new util();

$id_reparacion=$_REQUEST['id'];
$id_reporte1=$_REQUEST['id_reporte'];
$fecha=$_REQUEST['fecha'];
$descripcion=$_REQUEST['descripcion'];


$campos= array ("id","id_reporte1","fecha","descripcion");
$valores= array ("$id_reparacion","$id_reporte1","$fecha","$descripcion");
$tabla= "reparacion"   ;  
$utilModeloRepacacion2 ->insertar($tabla,$campos,$valores);
echo "informacion enviada a la tabla reparaciones";
$_SESSION['mensajeOK']="Accion realizada";header('Locarion:../admin/adminVista.php');
 
?>
