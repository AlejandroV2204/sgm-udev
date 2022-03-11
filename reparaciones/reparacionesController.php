<?php 
include "../util/util.php";
include_once "../util/utilModelo.php";
$utilModeloReparacion2 = new utilModelo();
$utilReparacion=new util();

// $id_reparacion=$_REQUEST['id'];
$id_reporte1=filter_input(INPUT_POST,'id_reporte');
$fecha=filter_input(INPUT_POST,'fecha');
$descripcion=filter_input(INPUT_POST,'descripcion');
$estado = '0';

 if(isset($_POST['guardarReparacion'])){
    
    echo "Guardar";

    $campos= array ("id_reporte1","fecha","descripcion", "estado");
    $valores= array ("$id_reporte1","$fecha","$descripcion","$estado");
    $tabla= "reparacion";  
    $utilModeloReparacion2 -> insertar($tabla,$campos,$valores);
    
    echo "informacion enviada a la tabla reparaciones";
$_SESSION['mensajeOK']="Accion realizada"; 
header('Location: reparacionesVista.php');

    
  
    
    //modificar
     }else if(isset($_POST['codigoE'])){
         echo "modificar";
    
         $id=$_POST['id'];
    
        //$campos es el nombre de los campos tal cual aparece en la base de datos
    $campos = array("id_reporte1", "fecha", "descripcion");
    //$valores son los valores a almacenar
    $valores= array ("$id_reporte1","$fecha","$descripcion","$activo");
    //la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
    $tabla= "reparacion";  
    $utilModeloReparacion2 -> insertar($tabla,$campos,$valores,'id',$id);
    $_SESSION['mensajeOk']="Accion realizada";
    
         //header('Location: reparacionesVista.php');
     }else{
    
        echo "Eliminar";
    
                $campo = array("estado");
                $id=$_POST['idEliminar'];
    
            $utilModelo -> modificar('reparacion',$campo,'1','id', $id_reparacion) ;
            $_SESSION['mensajeOk']="Accion realizada";
             //header('Location: reparacionesVista.php');
    
       }
        exit();
?>
