<?php
@session_start();
//include 'usuarioModelo.php';
include '../util/utilModelo.php';
include '../util/util.php';
$util = new util();
$utilModelo = new utilModelo();
$nombre = filter_input(INPUT_POST, 'nombre');
$apellido = filter_input(INPUT_POST, 'apellido');
$correo = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$activo = '1';//por defecto viene en 0 que es inactivo y 1 es activo
$tipo = '0';//el tipo numero 2 es un usuario stadart ademas tenemos tipo 0 para los administradores y tipo 1 para los venderores.


//guardar
 if(isset($_POST['guardarUsuario'])){

echo "Guardar";

//$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("nombre", "apellido", "email", "password", "tipo_usuario", "estado");
//$valores son los valores a almacenar
$valores = array("$nombre","$apellido","$correo","$password","$tipo","$activo");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "usuario";

$utilModelo -> insertar($nombreDeTabla,$campos, $valores) ;

echo "si funciono";
$_SESSION['mensajeOk']="Accion realizada";
      header('Location:crudUsuariosVista.php');


//modificar
 }else if(isset($_POST['modificarUsuario'])){
 	echo "modificar";

	 $id=$_POST['id'];

	//$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("nombre", "apellido", "email");
//$valores son los valores a almacenar
$valores = array("$nombre","$apellido","$correo");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "usuario";
$utilModelo -> modificar($nombreDeTabla,$campos,$valores,'id', $id) ;
$_SESSION['mensajeOk']="Accion realizada";

     header('Location: crudUsuariosVista.php');
 }else{

	echo "Eliminar";

			$campo = array("estado");
			$id=$_POST['idEliminar'];

		$utilModelo -> modificar('usuario',$campo,'1','id', $id) ;
		$_SESSION['mensajeOk']="Accion realizada";
 		header('Location: crudUsuariosVista.php');

   }
	exit();
?>