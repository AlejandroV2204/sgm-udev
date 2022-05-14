<?php
include "../util/util.php";
include_once "../util/utilModelo.php";
$util = new util();
$utilModelo = new utilModelo();

$util -> validarRuta(0);
$id = $_SESSION['usuario'][0];
$estado = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tecc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/pages/dashboard.css" rel="stylesheet">
    <link href="../css/pages/plans.css" rel="stylesheet">

</head>

<body>


    <!-- Le javascript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery-1.7.2.min.js"></script>
    <script src="../js/excanvas.min.js"></script>
    <script src="../js/funciones.js"></script>
    <script src="../js/chart.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js"></script>

</body>

</html>