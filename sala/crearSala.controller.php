<?php
@session_start();
include_once "../util/util.php";
include_once "../util/utilModelo.php";
$utilModelo = new utilModelo();
$util = new util();

$cantidad_pc = filter_input(INPUT_POST, 'cantidad_pc');
$nombre_sala = filter_input(INPUT_POST, 'nombre_sala');
$estado_sala ='1';


if(isset($_POST['guardarSala'])){

    echo "Guardar";


//$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("cantidad_pc", "nombre_sala", "estado_sala");
//$valores son los valores a almacenar
$valores = array("$cantidad_pc", "$nombre_sala", "$estado_sala");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "sala";
$utilModelo->insertar($nombreDeTabla,$campos, $valores);

echo "si funciono";
// $_SESSION['mensajeOk']="Accion realizada";header('Location: ../crudTrabajador/crudTrabajadorVista.php');
$_SESSION['mensajeOk']="Accion realizada";

header('Location: ../sala/crearSala.vista.php');


//modificar
}else if(isset($_POST['modificarSala'])){

    echo "modificar";

    $id=$_POST['id'];

   //$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("cantidad_pc", "nombre_sala", "estado_sala");
//$valores son los valores a almacenar
$valores = array("$cantidad_pc","$nombre_sala","$estado_sala");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "sala";
$utilModelo -> modificar($nombreDeTabla,$campos,$valores,'id_sala', $id) ;
$_SESSION['mensajeOk']="Accion realizada";

    header('Location: crearSala.vista.php');
}else if(isset($_POST["activar"])){
	echo "Activar";
	
	$campo = array("estado_sala");
	$valor = array('1');
	
	$id=$_POST['id_Activar'];
	
	$utilModelo->modificar('sala',$campo, $valor,'id_sala', $id) ;
	$_SESSION['mensajeOk']="Accion realizada";
	header('Location: crearSala.vista.php');
	
	}else{

   echo "Eliminar";

           $table = "sala";
           $campo = array("estado_sala");
           $id = $_POST['idEliminar'];

       $utilModelo -> modificar($table,$campo,'0','id_sala', $id) ;
       $_SESSION['mensajeOk']="Accion realizada";
        header('Location: crearSala.vista.php');

  }

   exit();

?>


    