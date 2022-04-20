<?php
@session_start();

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$id_reporte = filter_input(INPUT_GET, 'id_reporte');
$observacion = filter_input(INPUT_GET, 'observacion_reporte');
$estado = '2';//por defecto viene en 1 que es activo, 0 es inactivo y 2 es pendiente.

echo $id_reporte . "<br>"; 

//modificar

	//$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("revision_reporte", "estado_reporte");
//$valores son los valores a almacenar
$valores = array("$observacion", "$estado");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "reporte";
$condicion = $id_reporte;
$utilModelo->modificar($nombreDeTabla,$campos,$valores,'id_reporte', $condicion) ;
$_SESSION['mensajeOk']="Accion realizada";
header('Location:../reporte/crudReporteVista.php');
	exit();
?>



