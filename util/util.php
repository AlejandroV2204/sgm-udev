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
           /* if ($_SESSION['usuario'][1] == $tipoUsarioPermitido) {
                echo $html;
            }*/
        }

        function validarUsuarioActivo($codigoUsuario)
        {
            $utilModelo = new utilModelo();
            $result = $utilModelo->ultimaFechaPago($codigoUsuario);
            while ($fila = mysqli_fetch_array($result)) {
                if ($fila != NULL) {
                    $fecha = date("d-m-Y", strtotime($fila['fechaMovimiento']));
                }
            }
            if (isset($fecha)) {
                $fechaVencimiento = new DateTime($fecha);
                $intervalo = new DateInterval('P1M');
                $fechaVencimiento->add($intervalo);
                date_add($fechaVencimiento, date_interval_create_from_date_string('1 days'));

                $fechaActual = new DateTime("now");
//            echo $fechaVencimiento->format('Y-m-d') . "\n";
//            echo $fechaActual->format('Y-m-d') . "\n";
//            var_dump($fechaActual == $fechaVencimiento);
//            var_dump($fechaActual <= $fechaVencimiento);
//            die();
                if ($fechaActual <= $fechaVencimiento || $fechaActual == $fechaVencimiento) {
                    $estado = "activo";
//                echo $estado;

                } else {
                    $estado = "vencido";

                }
                $valores = array($fecha, $estado);
//            die();

            } else {
                $valores = array("", "vencido");
            }

            return $valores;


        }

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

        function validarRangoUsuarioPago($cantidadReferidos)
        {
//            echo "cantidad referidos: ".$cantidadReferidos;
            $utilModelo = new utilModelo();
            $tabla = "rangoUsuario";
            $meta = 0;
            $result = $utilModelo->mostrarTodosRegistros($tabla);
            while ($fila = mysqli_fetch_array($result)) {
                if ($fila != NULL) {
                    if ($cantidadReferidos >= $fila['vp']) {
//                        echo "ingreso";
                        $meta = $fila['vp'];
                    }
                }
            }
            return $meta;
        }

<<<<<<< HEAD
        // function generarCodigo()
        // {
        //     $longitud = 6;
        //     $key = '';
        //     $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        //     $max = strlen($pattern) - 1;
        //     for ($i = 0; $i < $longitud; $i++) $key .= $pattern{mt_rand(0, $max)};
        //     return $key;
        // }
=======
        //function generarCodigo()
        //{
          //  $longitud = 6;
            //$key = '';
            //$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
            //$max = strlen($pattern) - 1;
            //for ($i = 0; $i < $longitud; $i++) $key .= $pattern{mt_rand(0, $max)};
            //return $key;
        //}
>>>>>>> andrey

        function validarCodigo($codigo){
          $utilModelo = new utilModelo();
          $util=new util();
          $nuevoCodigo=$codigo;
          //echo $nuevoCodigo;
        $result=$utilModelo->consultarVariasTablas("codigo","usuario","codigo='$nuevoCodigo'");
        $rowcount=mysqli_num_rows($result);
                if($rowcount!= 0)    {
                $nuevoCodigo=$util->generarCodigo();
                return $nuevoCodigo;
                }else{

                  return $nuevoCodigo;
            }

        }

        //Devuelve fecha actual
        function hoy()
        {

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
