<?php
    include_once "../util/utilModelo.php";
    include_once "../util/util.php";
    $utilModelo = new utilModelo();
    $util = new util();
    $nombreCampo = array("id_usuario");
    $valor = array($_SESSION['usuario'][0]); 
    
    $tabla = "usuario";

    $result = $utilModelo->mostrarregistros($tabla, $nombreCampo, $valor);
    while ($fila = mysqli_fetch_array($result)) {
        if ($fila != NULL) {
            $nombre = $fila['nombre'];
            $codigoUsuario = $fila['id_usuario'];

        }
    }

?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a
                    class="brand" href="adminVista.php">SGM - U_DEV</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">

                    <h2><li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-user"></i> 
                                    <?php echo $nombre; ?> 
                                    <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                                $util->validarElemento(0, '<li><a href="../controlSolicitudes/controlSolicitudesVista.php"><i class="icon-bell"></i>Notificacion Tecnico</a></li>');
                                $util->validarElemento(0, '<li><a href="../cambiarPassword/cambiarPasswordVista.php"><i class="icon-key"></i>Cambiar contraseña</a></li>');
                            ?>

                            <?php
                                $util->validarElemento(1, '<li><a href="../cambiarPassword/cambiarPasswordVista.php"><i class="icon-key"></i>Cambiar contraseña</a></li>');
                            ?>

                            <li><a href="../seguridad/cerrarSesion.php"><i class="icon-signout"></i>Cerrar sesion</a>
                            </li>
                        </ul>
                    </li>
                </h2>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!-- /container -->
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="subnavbar">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <li class="active"><a href="../admin/adminVista.php"><i
                                class=" icon-home"></i><span>Inicio</span> </a></li>

                                <!-- Se comentaron, probablemente no se utilize -->
                <!-- <li><a href="../registrarPago/registroPagoVista.php"><i class="icon-group"></i><span>Pagar Mensualidad</span> </a></li>
                <li><a href="../asociados/estadoAsociadosVista.php"><i class="icon-group"></i><span>Asociados</span> </a></li>
                <li><a href="../controlSolicitudes/controlSolicitudesVista.php"><i class="icon-book"></i><span></span>Solicitudes</a></li>
                <li><a href="../publicidad/publicidadVistaPreliminar.php"><i class="icon-book"></i><span></span>Publicidad </a></li>-->
                <li><a href="../crudUsuarios/crudUsuariosVista.php"><i class="icon-book"></i><span></span>Usuarios</a></li> 
                <li><a href="../computadores/nuevo_computador.php"><i class="icon-book"></i><span></span>Nuevo Computador</a></li>
                <li><a href="../reparaciones/reparacionesVista.php"><i class="icon-book"></i><span></span>Reparaciones</a></li>
                <li><a href="../sala/crearSala.vista.php"><i class="icon-book"></i><span></span>Nuevo Sala</a></li>
                <li><a href="../reporte/crearReporte.vista.php"><i class="icon-book"></i><span></span>Nuevo Reporte</a></li>
                

            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->
