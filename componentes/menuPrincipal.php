<?php
    include_once "../util/utilModelo.php";
    include_once "../util/util.php";
     
       @session_start();
     
    $utilModelo = new utilModelo();
    $util = new util();

    /*$nombreCampo = array("id_usuario");

    $valor = array($_SESSION['usuario'][0]);
    
    $tabla = "usuario";


    $result = $utilModelo->mostrarregistros($tabla, $nombreCampo, $valor);
    while ($fila = mysqli_fetch_array($result)) {
        if ($fila != NULL) {
            $nombre = $fila['nombre'];
            $codigoUsuario = $fila['id'];
        }
    }*/

?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container"><a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a
                    class="brand" >SGM U_DEV</a>
            <div class="nav-collapse">
                <ul class="nav pull-right">


                   <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="icon-user"></i> 
                                    <?php echo $nombre; ?> 
                                    <b class="caret"></b></a>
                        <ul class="dropdown-menu">
        

                            <?php
                                $util->validarElemento(0, '<li><a href="../admin/adminVista.php"><i class="icon-bell"></i> Control Admin</a></li>');
                            ?>

                            <?php
                                $util->validarElemento(2, '<li><a href="../cambiarPassword/cambiarPasswordVista.php"><i class="icon-key"></i> Cambiar contraseña</a></li>');
                                $util->validarElemento(1, '<li><a href="../cambiarPassword/cambiarPasswordVista.php"><i class="icon-key"></i> Cambiar contraseña</a></li>');

                                $util->validarElemento(2, '<li><a href="#modalEditar"  data-toggle="modal" ><i class="icon-pencil"></i>Actualizar Datos</a></li>');
                                $util->validarElemento(1, '<li><a href="#modalEditar"  data-toggle="modal" ><i class="icon-pencil"></i>Actualizar Datos</a></li>');
                            ?>
                            <li><a href="../seguridad/cerrarSesion.php"><i class="icon-signout"></i>Cerrar sesion</a>
                            </li>
                        </ul>
                    </li>
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
                <li class="active"><a href="../usuario/usuarioStandartVista.php"><i
                                class=" icon-home"></i><span>Inicio</span> </a></li>
                <li><a href="reports.html"><i class="icon-group"></i><span>¿Quienes somos?</span> </a></li>
                <li><a href="guidely.html"><i class="icon-book"></i><span></span>Politicas </a></li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->
