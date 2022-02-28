<?php

include "../util/util.php";
include_once "../util/utilModelo.php";
$utilModelo2 = new utilModelo();
$util = new util();

//Variables que se crean de los campos en el formulario (la vista)
$idcomputador = $_REQUEST['id_pc'];
$sistema_operativo = $_REQUEST['so_pc'];
$idsala = $_REQUEST['sala'];
$motherboard = $_REQUEST['mobo_pc'];
$ram = $_REQUEST['cantidad_ram'];
$velocidadram = $_REQUEST['velocidad_ram'];
$procesador = $_REQUEST['procesador'];
$tipograficos = $_REQUEST['tipo_graficos'];
$capacidaddiscoduro = $_REQUEST['capacidad_disco'];
$mouse = $_REQUEST['mouse'];
$teclado = $_REQUEST['teclado'];
$panelfrontal = $_REQUEST['panel_frontal'];
$lectoradvd = $_REQUEST['lectora_dvd'];
$ventiladores = $_REQUEST['ventiladores'];
$pastatermica = $_REQUEST['ultima_termica'];
$ultimomantenimiento = $_REQUEST['ultimo_man'];
$salidavideo = $_REQUEST['salidas_video'];


	//$campos es el nombre de los campos tal cual aparece en la base de datos
    $campos = array("id_computador", "id_sala1", "sistema_operativo", "motherboard","ram", "velocidad_ram", "procesador", "tipo_graficos", "capacidad_disco", "mouse", "teclado", "estado_panel_frontal", "lectora_cd", "ventiladores", "cambio_pasta_termica", "ultimo_mantenimiento", "salidas_video");
    //$valores son los valores a almacenar
    $valores = array("$idcomputador","$idsala","$sistema_operativo","$motherboard","$ram","$velocidadram","$procesador","$tipograficos","$capacidaddiscoduro","$mouse","$teclado","$panelfrontal","$lectoradvd", "$ventiladores", "$pastatermica", "$ultimomantenimiento", "$salidavideo");
    //la funcion insertar recive el nombre de la tabla y los dos arrays de campos y valores
    $nombreDeTabla = "computador";
    $utilModelo2->insertar($nombreDeTabla,$campos, $valores);
    echo "si funciono";
    // $_SESSION['mensajeOk']="Accion realizada";header('Location: ../crudTrabajador/crudTrabajadorVista.php');
    $_SESSION['mensajeOk']="Accion realizada";header('Location: ../admin/adminVista.php');


?>