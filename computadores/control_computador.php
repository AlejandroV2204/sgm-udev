<?php

include "../util/util.php";
include_once "../util/utilModelo.php";
$utilModelo = new utilModelo();
$util = new util();

//Variables que se crean de los campos en el formulario (la vista)

$idcomputador = $_REQUEST['id_pc']; // Se comento porque en la tabla esta autoincrement
$sistema_operativo = $_REQUEST['so_pc'];
$idsala = $_REQUEST['sala'];
$motherboard = $_REQUEST['mobo_pc'];
$ram = $_REQUEST['cantidad_ram'];
$velocidadram = $_REQUEST['velocidad_ram'];
$procesador = $_REQUEST['procesador'];
$tipograficos = $_REQUEST['tipo_graficos'];
$capacidaddiscoduro = $_REQUEST['capacidad_disco'];
$panelfrontal = $_REQUEST['panel_frontal'];
$ventiladores = $_REQUEST['ventiladores'];
$salidavideo = $_REQUEST['salidas_video'];
$ultimomantenimiento = date('Y-m-d', strtotime($_POST['ultimo_man']));
$pastatermica = date('Y-m-d', strtotime($_POST['ultima_termica']));
$mouse = $_REQUEST['mouse'];
$teclado = $_REQUEST['teclado'];
$lectoradvd = $_REQUEST['lectora_dvd'];




// https://stackoverflow.com/questions/12115373/detect-unchecked-checkbox-php#:~:text=If%20a%20checkbox%20is%20not,))%20will%20do%20the%20trick.&text=You%20can't%20%2D%20there's%20nothing,%2C%20an%20empty%20text%20field.)

if(isset($_POST['guardarComputador']))
    {

        //$campos es el nombre de los campos tal cual aparece en la base de datos
        $campos = array("id_pc", "id_sala1", "sistema_operativo", "motherboard","ram", "velocidad_ram", "procesador", "tipo_graficos", "capacidad_disco", "mouse", "teclado", "estado_panel_frontal", "lectora_cd", "ventiladores", "cambio_pasta_termica", "ultimo_mantenimiento", "salidas_video", "estado_pc");

        //$valores son los valores a almacenar
        $valores = array("$idcomputador", "$idsala","$sistema_operativo","$motherboard","$ram"."GB","$velocidadram","$procesador","$tipograficos","$capacidaddiscoduro","$mouse","$teclado","$panelfrontal","$lectoradvd", "$ventiladores", "$pastatermica", "$ultimomantenimiento", "$salidavideo", 1);

        //la funcion insertar recibe el nombre de la tabla y los dos arrays de campos y valores
        $nombreDeTabla = "computador";
        $utilModelo->insertar($nombreDeTabla,$campos, $valores);
        echo "si funciono";
        $_SESSION['mensajeOk']="Accion realizada";header('Location: nuevo_computador.php');

    }

    else if(isset($_POST['modificarComputador']))
    {

        $campos = array("id_pc", "id_sala1", "sistema_operativo", "motherboard","ram", "velocidad_ram", "procesador", "tipo_graficos", "capacidad_disco", "mouse", "teclado", "estado_panel_frontal", "lectora_cd", "ventiladores", "cambio_pasta_termica", "ultimo_mantenimiento", "salidas_video", "estado_pc");
        $valores = array("$idcomputador", "$idsala","$sistema_operativo","$motherboard","$ram"."GB","$velocidadram","$procesador","$tipograficos","$capacidaddiscoduro","$mouse","$teclado","$panelfrontal","$lectoradvd", "$ventiladores", "$pastatermica", "$ultimomantenimiento", "$salidavideo", 1);

        $nombreDeTabla = "computador";

        $utilModelo->modificar($nombreDeTabla,$campos,$valores,'id_pc', $idcomputador);
        echo "si funciono";
        $_SESSION['mensajeOk']="Accion realizada";header('Location: nuevo_computador.php');



    }

    else if(isset($_POST['idEliminar']))
    {

        $campo = array("estado_pc");

        $idi=$_POST['idEliminar'];

        $utilModelo -> modificar('computador',$campo,'0','id_pc', $idi);
        $_SESSION['mensajeOk']="Accion realizada";
        header('Location: nuevo_computador.php');


    }

    exit();

?>