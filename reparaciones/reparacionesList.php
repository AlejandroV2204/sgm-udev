<?php 


include_once("../conexion.php");
include_once('../header.php')

?>
<?php

$id_reparacion=@$_POST['id_reparacion'];
$id_usuario2=@$_POST['id_usuario2'];
$id_PC2=@$_POST['id_PC2'];
$fecha=@$_POST['fecha'];
$descripcion=@$_POST['descripcion'];



echo $id_reparacion."<br> <br>"; 
echo $id_usuario2. "<br> <br>";  
echo $id_PC2 ."<br> <br>";  
echo $fecha. "<br> <br>";  
echo $descripcion ;



?>
<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

  <body>
  <table class="table table-dark table-striped">
<tr>
            <!--<th>ID</th>-->
            <th>id_reparacion</th>
            <th>id_usuario2</th>
            <th>id_PC2</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Editar</th>
            <th>Eliminar</th>
           <!-- <th>Total</th>-->
        </tr>
  </body>
        <?php

        //insercion de datos en la tabla 'reparaciones'
            $table = "reparacion";
            $sql = "SELECT * FROM $table WHERE 1";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
         


              //aqui se invocan los campos que ingreso a la tabla reparacion con el formato de la tabla e iconos utilizando el boostrap
        ?>

        
           <tr class='row100'>
           <td style ='width:10px'><?php echo $row ['id'];?></td>
           <td ><?php echo $row ['id_reporte1'];?></td>
           <td ><?php echo $row ['fecha'];?></td>
           <td ><?php echo $row ['descripcion'];?></td>
           <td><a  href="reparacionesController.php=<?php echo $row['id']; ?>" class="btn btn-primary" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
           <td><a  href="reparacionesController.php?EDITAME=<?php echo $row['id']; ?>" class="btn btn-danger" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></i></a></td>
          
           </tr>
         
       
         

<?php 
      }  
include_once('../footer.php')

?>