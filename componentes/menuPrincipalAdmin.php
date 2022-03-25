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
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
          <a class="brand" ><img src="../img/udev_logo2.png"></a>
            <div class="nav-collapse">
                <ul class="nav pull-right">

                    <h2><li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-user"></i>
                                    <?php echo $nombre; ?>
                                    <b class="caret"></b></a>
                        <ul class="dropdown-menu">

                        
                               <!-- Validar opciones para mi admin -->
                                <?php
                                $util->validarElemento(0, '<li><a href="../admin/verControlVista.php"><i class="icon-bell"></i>Control Tecnico</a></li>');
                                $util->validarElemento(0, '<li><a href="../cambiarPassword/cambiarPasswordVista.php"><i class="icon-key"></i>Cambiar contraseña</a></li>');
                            ?>

                                <!-- Validar opciones para mi tecno -->
                                <?php
                                $util->validarElemento(1, '<li><a href="../cambiarPassword/cambiarPasswordVista.php"><i class="icon-key"></i>Cambiar contraseña</a></li>');
                                $util->validarElemento(2, '<li><a href="../cambiarPassword/cambiarPasswordVista.php"><i class="icon-key"></i>Cambiar contraseña</a></li>');
                                $util->validarElemento(3, '<li><a href="../cambiarPassword/cambiarPasswordVista.php"><i class="icon-key"></i>Cambiar contraseña</a></li>');
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
                <li class="active"><a href="../admin/adminVista.php"><i class=" icon-home"></i><span>Inicio</span> </a>
                </li>

                <!-- Validacion de las cosas que podra hacer mi administrador -->
                <?php
                                $util->validarElemento(0, '<li><a href="../crudUsuarios/crudUsuariosVista.php"><i class="icon-user"></i><span></span>Usuarios</a></li> ');
                                $util->validarElemento(0, '<li><a href="../computadores/nuevo_computador.php"><i class="icon-desktop"></i><span></span>Nuevo Computador</a></li>');
                                $util->validarElemento(0, '<li><a href="../reparaciones/reparacionesVista.php"><i class="icon-certificate"></i><span></span>Reparaciones</a></li>');
                                $util->validarElemento(0, '<li><a href="../sala/crearSala.vista.php"><i class="icon-archive"></i><span></span>Nuevo Sala</a></li>');
                                $util->validarElemento(0, '<li><a href="../reporte/crudReporteVista.php"><i class="icon-tasks"></i><span></span>Reportes</a></li>');
                ?>


                <!-- Valido las cosas que va a utilizar mi tecnico -->
                <?php
                                $util->validarElemento(1, '<li><a href="../crudUsuarios/crudUsuariosVista.php"><i class="icon-user"></i><span></span>Usuarios</a></li> ');
                                $util->validarElemento(1, '<li><a href="../reparaciones/reparacionesVista.php"><i class="icon-certificate"></i><span></span>Reparaciones</a></li>');
                                $util->validarElemento(1, '<li><a href="../reporte/crudReporteVista.php"><i class="icon-tasks"></i><span></span>Reportes</a></li>');
                ?>

                <?php       
                                $util->validarElemento(2, '<li><a href="../crudUsuarios/crudUsuariosVista.php"><i class="icon-user"></i><span></span>Usuarios</a></li> ');
                                $util->validarElemento(2, '<li><a href="../reporte/crudReporteVista.php"><i class="icon-tasks"></i><span></span>Reportes</a></li>');
                ?>

                <?php
                                $util->validarElemento(3, '<li><a href="../crudUsuarios/crudUsuariosVista.php"><i class="icon-user"></i><span></span>Usuarios</a></li> ');
                                $util->validarElemento(3, '<li><a href="../reporte/crudReporteVista.php"><i class="icon-tasks"></i><span></span>Reportes</a></li>');
                ?>


            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->