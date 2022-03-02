<?php
include "../util/util.php";
include_once "../util/utilModelo.php";
$utilModelo2 = new utilModelo();
$util = new util();

include_once('./componentes/menuPrincipal.php');
//include_once('../conexion.php');

$cantidad_pc = $_REQUEST['cantidad_pc'];
$nombre_sala = $_REQUEST['nombre_sala'];
$estado = $_REQUEST['estado'];


//$campos es el nombre de los campos tal cual aparece en la base de datos
$campos = array("cantidad_pc", "nombre_sala", "estado");
//$valores son los valores a almacenar
$valores = array("$cantidad_pc", "$nombre_sala", "$estado");
//la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
$nombreDeTabla = "sala";
$utilModelo2->insertar($nombreDeTabla,$campos, $valores);
echo "si funciono";
// $_SESSION['mensajeOk']="Accion realizada";header('Location: ../crudTrabajador/crudTrabajadorVista.php');
$_SESSION['mensajeOk']="Accion realizada";header('Location: ../admin/adminVista.php');

/*$nombre_sala= $_POST['nombre_sala'];
$cantidad_pc= $_POST['cantidad_pc'];
$estado= $_POST['estado'];

$sql = "INSERT INTO sala VALUES (default,'$cantidad_pc','$nombre_sala','$estado')";
echo $sql;

if (mysqli_query($conn, $sql)) {
              echo "New record created successfully";
}else{
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/
mysqli_close($conn);
header("location:sala.list.php");
?>
<?php
include_once('../php/footer.php');

?>

    