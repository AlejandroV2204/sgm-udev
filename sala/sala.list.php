<?php
include_once('../conexion.php');
include_once('../php/header.php');
?>

<table class="table table-striped">
                        <br>
                        <h2>Listado de salas</h2>
                        <br>
                        <thead>
                        <tr class='row100 head'>
                        <th style='width:50px'>ID</th>
                        <th class='column100 column2'  data-column='column2'>Cantidad de computadores</th>
                        <th class='column100 column3'  data-column='column3'>Nombre de la sala</th>
                        <th class='column100 column4'  data-column='column4'>estado</th>
                        <th class='column100 column2'  data-column='column2' colspan="2">Acciones</th>
                        </tr>
                        </thead>
             <tbody>

<?php
$tabla = "sala";
$sql = "SELECT * FROM $tabla where 1";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{

?>
<tr class='row100'>
<td style='width:10px'> <?php echo $row['id_sala'];?></td>
<td> <?php echo $row['cantidad_pc'];?> </td>
<td> <?php echo $row['nombre_sala'];?> </td>
<td> <?php echo $row['estado'];?> </td>
<td><a  href="crearSala.controller.php?EDITAME=<?php echo $row['id_sala']; ?>" class="btn btn-primary" ><i class="bi bi-pencil"></i></a></td>
<td><a  href="crearSala.controller.php?EDITAME=<?php echo $row['id_sala']; ?>" class="btn btn-danger" ><i class="bi bi-trash"></i></a></td>
</tr>
<?php
} 
   include_once('../php/footer.php');

?>