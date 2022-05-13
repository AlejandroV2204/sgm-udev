<?php
include_once "../util/utilModelo.php";
include_once "../util/util.php";
$util = new util();
$utilmodelo = new utilModelo();

$util -> validarRuta(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ficha tecnica</title>
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
</head>

<?php
    include "../componentes/menuPrincipalAdmin.php";
    
    $idpc = filter_input(INPUT_GET, 'idPC');
    
    $tabla = "computador";
    $nombreCampo = array("id_pc");
    $valores = array("$idpc");
    
    $consulta = $utilModelo->mostrarregistros($tabla, $nombreCampo, $valores);
    
    $row = $consulta->fetch_assoc();
    $id_pc = $row['id_pc'];
    ?>

<body>
    <div class="container">
        
        
        <form action="crudRevisionControlador.php" method="GET" class="row g-3">
            <h1>Ficha tecnica</h1>

          <!-- ------------------------------------------------------------------ -->

            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Nombre PC:
                    <input type="text" name="nombre_pc" id="nombre_pc" tabindex="1" class=" form-control span6"
                        value="<?php echo $row['id_pc']; ?>" disabled> </label>
                </label>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Sala:
                    <input type="text" name="sala" id="sala" tabindex="1" class=" form-control span6"
                        value="<?php echo $row['id_sala1']; ?>" disabled> </label>
                </label>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Sistema Operativo:
                    <input type="text" name="so" id="so" tabindex="1" class=" form-control span6"
                        value="<?php echo $row['sistema_operativo']; ?>" disabled> </label>
                </label>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Placa Madre:
                    <input type="text" name="motherboard" id="motherboard" tabindex="1" class=" form-control span6"
                        value="<?php echo $row['motherboard']; ?>" disabled> </label>
                </label>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Cantidad RAM:
                    <input type="text" name="ram" id="ram" tabindex="1" class=" form-control span6"
                        value="<?php echo $row['ram']; ?>" disabled> </label>
                </label>
            </div>
            
    </div>
    </form>

    <?php include "../componentes/pie.php"; ?>

</body>

</html>