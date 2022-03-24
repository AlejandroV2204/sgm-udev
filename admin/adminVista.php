<?php
    include "../util/util.php";
    include_once "../util/utilModelo.php";
    $utilModelo2 = new utilModelo();
    $util = new util();
    // $util->validarRuta(0);
    // $nombreCampo = array("id_usuario");
    // $valor = array($_SESSION['usuario'][0]);
    // $tabla = "usuario";
    // $result = $utilModelo2->mostrarregistros($tabla, $nombreCampo, $valor);
    // while ($fila = mysqli_fetch_array($result)) {
    //     if ($fila != NULL) {
    //         $saldo = $fila['nombre'];
    //     }
    // }

    include "../componentes/menuPrincipalAdmin.php";
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>u_dev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/pages/dashboard.css" rel="stylesheet">
    <link href="../css/pages/plans.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/chart.min.js" type="text/javascript"></script>
  </head>
<body>
 
    <div class="main">
      <div class="main-inner">
        <div class="container">
          <div class="row">

                    <div id="chart-container">
                        <canvas id="graphCanvas"></canvas>
                    </div>

                    <script>
                    $(document).ready(function() {
                        showGraph();
                    });

                    function showGraph() {
                        {
                            $.post("data.php",
                                function(data) {
                                    console.log(data);
                                    var name = [];
                                    var marks = [];

                                    for (var i in data) {
                                        name.push(data[i].id_usuario1);
                                        marks.push(data[i].id_PC1);
                                    }

                                    var chartdata = {
                                        labels: name,
                                        datasets: [{
                                            label: 'Student Marks',
                                            backgroundColor: '#49e2ff',
                                            borderColor: '#46d5f1',
                                            hoverBackgroundColor: '#CCCCCC',
                                            hoverBorderColor: '#666666',
                                            data: marks
                                        }]
                                    };

                                    var graphTarget = $("#graphCanvas");

                                    var barGraph = new Chart(graphTarget, {
                                        type: 'bar',
                                        data: chartdata
                                    });
                                });
                        }
                    }
                    </script>

                </div>

                <?php include "../componentes/pie.php"; ?>

                <!-- Le javascript
<-- ============================================================================================ -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="../js/excanvas.min.js"></script>
                <script src="../js/bootstrap.js"></script>
                <script language="javascript" type="text/javascript" src="../js/full-calendar/fullcalendar.min.js">
                </script>

                <script src="../js/base.js"></script>

</body>

</html>