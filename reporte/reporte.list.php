<?php 
include_once('../conexion.php');
include_once('../header.php');
?>

<table class="table table-dark table-hover">

    <br>
    <h2>Lista reporte</h2>
    <br>
    <thead>
        <tr class = 'row100 head'>
            <th style = 'width:50px'>ID</th>
            <th class = 'column100 column2' data-column = 'column2'>ID usuario</th>
            <th class = 'column100 column3' data-column = 'column3'>ID PC</th>
            <th class = 'column100 column4' data-column = 'column4'>Descripción</th>
            <th class = 'column100 column5' data-column = 'column5'>Editar</th>
            <th class = 'column100 column4' data-column = 'column4'>Eliminar</th>
        </tr>
    </thead>

<tbody>

    <?php

    $tabla = "reporte";
    $sql = "SELECT * FROM $tabla WHERE 1";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {

    ?>

    <tr class = 'row100'>

        <td style = 'width:10px'> <?php echo $row['id_reporte']; ?> </td>
        <td> <?php echo $row['id_usuario1']; ?> </td>
        <td> <?php echo $row['id_PC1']; ?> </td>
        <td> <?php echo $row['descripcion']; ?> </td>
        <td><a href="crearReporte.controller.php?EDITAME = <?php echo $row['id_reporte']; ?>" class = "btn btn-primary" ><i class = "bi bi-pencil"></i></a></td>
        <td><a href="crearReporte.controller.php?EDITAME = <?php echo $row['id_reporte']; ?>" class = "btn btn-danger" ><i class = "bi bi-trash"></i></a></td>

    </tr>

<?php 
    }
include_once('../footer.php');
?>