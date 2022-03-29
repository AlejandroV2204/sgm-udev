<?php
@session_start();
include_once "../util/util.php";
include_once "../util/utilModelo.php";
$utilModelo = new utilModelo();
$util = new util();


$id_reporte1 = filter_input(INPUT_POST, 'id_reporte1');
$fecha = filter_input(INPUT_POST, 'fecha');
$descripcion_reparacion = filter_input(INPUT_POST, 'descripcion_reparacion');
$estado_reparacion ='1';


if(isset($_POST['guardarReparacion'])){

    echo "Guardar";


//$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("id_reporte1", "fecha", "descripcion_reparacion", "estado_reparacion");
//$valores son los valores a almacenar
$valores = array("$id_reporte1", "$fecha", "$descripcion_reparacion", "$estado_reparacion");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "reparacion";
$utilModelo->insertar($nombreDeTabla,$campos, $valores);

echo "si funciono";
// $_SESSION['mensajeOk']="Accion realizada";header('Location: ../crudTrabajador/crudTrabajadorVista.php');
$_SESSION['mensajeOk']="Accion realizada";

header('Location: ../reparaciones/reparacionesVista.php');


//modificar
}else if(isset($_POST['modificarReparacion'])){

    echo "modificar";

    $id=$_POST['id'];

   //$campos es el nombre de los campos tal cual aparece en la base de datos
   $campos = array("id_reporte1", "fecha", "descripcion_reparacion", "estado_reparacion");
//$valores son los valores a almacenar
$valores = array("$id_reporte1", "$fecha", "$descripcion_reparacion", "$estado_reparacion");
//la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "reparacion";
$utilModelo -> modificar($nombreDeTabla,$campos,$valores,'id_reparacion', $id) ;
$_SESSION['mensajeOk']="Accion realizada";

    header('Location: reparacionesVista.php');
}else{

   echo "Eliminar";

           $campo = array("estado_reparacion");
           $id=$_POST['idEliminar'];

       $utilModelo -> modificar('reparacion',$campo,'0','id_reparacion', $id) ;
       $_SESSION['mensajeOk']="Accion realizada";
        header('Location: reparacionesVista.php');

  }

   exit();

?>