<?php
@session_start();

include '../util/utilModelo.php';
include '../util/util.php';

$util = new util();
$utilModelo = new utilModelo();

$id_usuario = $_SESSION['usuario'][0];
$id_pc = filter_input(INPUT_POST, 'id_pc');
$descripcion = filter_input(INPUT_POST, 'descripcion_reporte');
$estado = '1';//por defecto viene en 1 que es activo y 0 es inactivo


//guardar
 if(isset($_POST['guardarReporte'])){

//$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("id_usuario1", "id_PC1", "descripcion_reporte", "estado_reporte");
//$valores son los valores a almacenar
$valores = array("$id_usuario", "$id_pc","$descripcion", "$estado");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "reporte";

$utilModelo -> insertar($nombreDeTabla,$campos, $valores) ;

echo "si funciono";
$_SESSION['mensajeOk']="Accion realizada";
      header('Location:crudReporteVista.php');


//modificar
 }else if(isset($_POST['modificarReporte'])){
 	echo "modificar <br>";

	 $id=$_POST['id'];

	//$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("id_PC1", "descripcion_reporte");
//$valores son los valores a almacenar
$valores = array("$id_pc","$descripcion");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "reporte";
$utilModelo -> modificar($nombreDeTabla,$campos,$valores,'id_reporte', $id) ;
$_SESSION['mensajeOk']="Accion realizada";
header('Location:crudReporteVista.php');


 }
 else if(isset($_POST['activar'])){


			$tabla = "reporte";
			$valor = array("1");
			$campo = array("estado_reporte");
			$id = $_POST['idActivar'];

		$utilModelo -> modificar($tabla,$campo,$valor,'id_reporte', $id) ;
		$_SESSION['mensajeOk']="Accion realizada";
 		header('Location:crudReporteVista.php');

   }
 
 else{

	echo "Eliminar";

			$tabla = "reporte";
			$valor = array("0");
			$campo = array("estado_reporte");
			$id = $_POST['idEliminar'];

		$utilModelo -> modificar($tabla,$campo,$valor,'id_reporte', $id) ;
		$_SESSION['mensajeOk']="Accion realizada";
 		header('Location:crudReporteVista.php');

   }
	exit();
?>