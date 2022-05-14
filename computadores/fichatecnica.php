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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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

    $hoy = new DateTime();
    $fecha = DateTime::createFromFormat('Y-m-d', $row['cambio_pasta_termica']);
    $fecha2 = DateTime::createFromFormat('Y-m-d', $row['ultimo_mantenimiento']);
    $diff = $hoy->diff($fecha);
    $diff2 = $hoy->diff($fecha2);


    ?>
<body>
    <div class="container">

        <div class="widget-content">

            <div class="pricing-plans plans-3">

                <div class="plan-container">
                    <div class="plan">
                        <div class="plan-header">

                            <div class="plan-title">
                                El último cambio de pasta termica fue 
                            </div> <!-- /plan-title -->

                            <div class="plan-price">
                                <?php print_r($diff->format('hace %a días')); ?><span class="term"></span>
                            </div> <!-- /plan-price -->

                        </div> <!-- /plan-header -->

                    </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                <div class="plan-container">
                    <div class="plan">
                        <div class="plan-header">

                            <div class="plan-title">
                            El último mantenimiento
                            </div> <!-- /plan-title -->

                            <div class="plan-price">
                            <?php print_r($diff2->format('hace %a días')); ?><span class="term"></span>
                            </div> <!-- /plan-price -->

                        </div> <!-- /plan-header -->

                    </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                <div class="plan-container">
                    <div class="plan">
                        <div class="plan-header">

                            <div class="plan-title">
                            Este computador ha sido reparado
                            </div> <!-- /plan-title -->

                            <div class="plan-price">
                            2 veces<span class="term"></span>
                            </div> <!-- /plan-price -->

                        </div> <!-- /plan-header -->

                    </div> <!-- /plan -->
                </div> <!-- /plan-container -->

                

            </div>
        </div>

        <div class="widget-content">

                <h1>Ficha tecnica</h1>
                <span><br></span>

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
                            value="<?php echo $row['motherboard']; ?>" disabled>
                    </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Cantidad RAM:
                        <input type="text" name="ram" id="ram" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['ram']; ?>" disabled> </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Velocidad RAM:
                        <input type="text" name="velocidad" id="velocidad" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['velocidad_ram']; ?>" disabled> </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Procesador:
                        <input type="text" name="procesador" id="procesador" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['procesador']; ?>" disabled> </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Tipo graficos:
                        <input type="text" name="tipograficos" id="tipograficos" tabindex="1"
                            class=" form-control span6" value="<?php echo $row['tipo_graficos']; ?>" disabled>
                    </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Disco Duro:
                        <input type="text" name="discoduro" id="discoduro" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['capacidad_disco']; ?>" disabled> </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Mouse:
                        <input type="text" name="ram" id="ram" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['mouse']; ?>" disabled> </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Teclado:
                        <input type="text" name="ram" id="ram" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['teclado']; ?>" disabled> </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Estado Panel Frontal:
                        <input type="text" name="panelfrontal" id="panelfrontal" tabindex="1"
                            class=" form-control span6" value="<?php echo $row['estado_panel_frontal']; ?>" disabled>
                    </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Lectora CD/DVD:
                        <input type="text" name="cddvd" id="cddvd" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['lectora_cd']; ?>" disabled> </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Ventiladores:
                        <input type="text" name="ventiladores" id="ventiladores" tabindex="1"
                            class=" form-control span6" value="<?php echo $row['ventiladores']; ?>" disabled>
                    </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Ultima pasta termica en:
                        <input type="text" name="pastatermica" id="pastatermica" tabindex="1"
                            class=" form-control span6" value="<?php echo $row['cambio_pasta_termica']; ?>" disabled>
                    </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Ultimo mantenimiento:
                        <input type="text" name="manteniento" id="manteniento" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['ultimo_mantenimiento']; ?>" disabled> </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Salidas video:
                        <input type="text" name="salidasvideo" id="salidasvideo" tabindex="1"
                            class=" form-control span6" value="<?php echo $row['salidas_video']; ?>" disabled>
                    </label>
                    </label>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Estado:
                        <input type="text" name="estado" id="estado" tabindex="1" class=" form-control span6"
                            value="<?php echo $row['estado_pc']; ?>" disabled> </label>
                    </label>
                </div>
        </div>
    </div>

    <?php include "../componentes/pie.php"; ?>

</body>

</html>