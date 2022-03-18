<?php
    /**
     * heruko: 420114024b50d*
     */
    include '../conexion.php';
    include_once "utilModelo.php";
        @session_start();


    class util
    {

        function validarRuta($tipoUsarioPermitido)
        {
            if (isset($_SESSION['usuario'])) {
                if ($_SESSION['usuario'][1] == $tipoUsarioPermitido) {

                } else {
                    switch ($_SESSION['usuario'][1]) {
                        case 0:// usuario administrador
                            header('Location: ../admin/adminVista.php');
                            exit();
                            break;
                        case 1://usuario venderor
                            header('Location: ../vendedor/vendedorVista.php');
                            exit();
                            break;
                        case 2://usuario stadart
                            header('Location: ../usuario/usuarioStandartVista.php');
                            exit();
                            break;

                        default:
                            // code...
                            break;
                    }

                }

            } else {

                header('Location: ../index.php');
                exit();
            }
        }

        function validarElemento($tipoUsarioPermitido, $html)
        {
           if ($_SESSION['usuario'][1] == $tipoUsarioPermitido) {
                echo $html;
            }
        }

        // Convertir de una cadena de caracteres a un entero el tipo usuario
        function converUser($tipo){

            $retornoTipo;

             if($tipo == "Administrador"){
  
                $retornoTipo = 0;

             }else if($tipo == "Tecnico"){

                $retornoTipo = 1;

             }else if($tipo == "Monitor"){

                $retornoTipo = 2;

             }else{

                $retornoTipo = 3;

             }

            return $retornoTipo;

        }

        // function validarUsuarioActivo($codigoUsuario)
        // {
        //     $utilModelo = new utilModelo();
        //     $result = $utilModelo->ultimaFechaPago($codigoUsuario);
        //     while ($fila = mysqli_fetch_array($result)) {
        //         if ($fila != NULL) {
        //             $fecha = date("d-m-Y", strtotime($fila['fechaMovimiento']));
        //         }
        //     }
        //     if (isset($fecha)) {
        //         $fechaVencimiento = new DateTime($fecha);
        //         $intervalo = new DateInterval('P1M');
        //         $fechaVencimiento->add($intervalo);
        //         date_add($fechaVencimiento, date_interval_create_from_date_string('1 days'));

        //         $fechaActual = new DateTime("now");
        //    echo $fechaVencimiento->format('Y-m-d') . "\n";
        //    echo $fechaActual->format('Y-m-d') . "\n";
        //    var_dump($fechaActual == $fechaVencimiento);
        //    var_dump($fechaActual <= $fechaVencimiento);
        //    die();
        //         if ($fechaActual <= $fechaVencimiento || $fechaActual == $fechaVencimiento) {
        //             $estado = "activo";
        //        echo $estado;

        //         } else {
        //             $estado = "vencido";

        //         }
        //         $valores = array($fecha, $estado);
        //    die();

        //     } else {
        //         $valores = array("", "vencido");
        //     }

        //     return $valores;


        // }

        function mostrarCantidadReferidos($codigo)
        {

            $utilModelo2 = new utilModelo();
            $nombreCampo = array("codigoReferido");
            $valor = array($codigo);
            $tabla = "usuario";
            $result = $utilModelo2->mostrarregistros($tabla, $nombreCampo, $valor);
            $referidos = "";
            $contadorReferidos = 0;
            while ($fila = mysqli_fetch_array($result)) {
                if ($fila != NULL) {
                    $contadorReferidos++;
//            $saldo = $fila['saldo'];
                    $referidos = $referidos . ' <a href="javascript:;" class="shortcut"><i class="shortcut-icon  icon-user"></i><span class="shortcut-label">' . $fila['nombre'] . ' <br> <b>CODIGO: ' . $fila['codigo'] . '</b></span> </a>';
                }
            }
            return array($referidos, $contadorReferidos);
        }

        function validarRangoUsuario($cantidadReferidos)
        {
//            $cantidadReferidos = $cantidadReferidos + 5;
            $utilModelo = new utilModelo();
            $tabla = "rangoUsuario";
            $meta = 0;
            $rango = "";
            $bandera = false;
            $c = 0;
            $result = $utilModelo->mostrarTodosRegistros($tabla);
            while ($fila = mysqli_fetch_array($result)) {
                if ($fila != NULL) {
                    $c++;
                    if ($bandera) {
                        $meta = $fila['vp'];
                        $bandera = false;
                    }
                    if ($cantidadReferidos >= $fila['vp']) {
//                        echo "ingreso";
                        $rango = $fila['rango'];
                        $bandera = true;
                    }

                }
            }
//            echo $c;
//            echo $cantidadReferidos;
//            die();
            return array($meta, $rango);

        }

        //Devuelve fecha actual
        function hoy()
        {

            // return date("Y") . "-" . date("m") . "-" . date("d");
            return date("Y") . "-" . date("m") . "-" . date("d");
        }

        function mayorEdad()
        {

            return date("Y") - 18 . "-" . date("m") . "-" . date("d");

        }

        //devuelve ultimo dia del mes
        function ultimoDia()
        {
            $month = date('m');
            $year = date('Y');
            $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));

            return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
        }

        //devuelve primer dia del mes
        function primerDia()
        {
            $month = date('m');
            $year = date('Y');
            return date('Y-m-d', mktime(0, 0, 0, $month, 1, $year));
        }

    }

?>
