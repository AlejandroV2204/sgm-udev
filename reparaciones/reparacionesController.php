<?php 


include_once("../conexion.php");

$id_reparacion=@$_POST['id'];
$id_reporte=@$_POST['id_reporte1'];

$fecha=@$_POST['fecha'];
$descripcion=@$_POST['descripcion'];



$sql="INSERT INTO reparacion VALUES(default,'$id_reparacion','$id_reporte','$fecha','$descripcion')";

 echo $sql;
if(mysqli_query($conn,$sql)){
    echo "New record created successfully ";
}else{
    echo "Error: ". $sql . "<br>". mysqli_error($conn);

}
mysqli_close($conn);
header("location:reparacionesList.php")



?>
