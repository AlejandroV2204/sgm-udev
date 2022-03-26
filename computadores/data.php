<?php
header('Content-Type: application/json');

require_once('conexion.php');

$sqlQuery = "SELECT * FROM reporte ORDER BY id_reporte";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

mysqli_close($conn);

print json_encode($data);
?>