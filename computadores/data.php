<?php
require_once('../conexion.php');
include_once "../util/utilModelo.php";
$utilModelo = new utilModelo();
?>

    <?php
        
            if(isset($_POST['request'])){

              $request = $_POST['request'];
              $nombreCampo = array("id_sala1");
              $tabla = "computador";

              if($_POST['request'] == 0)
              {
                
                $campos = "*";
                $valores = "computador";
                $condiciones = "1";
                $result = $utilModelo->consultarVariasTablas($campos, $valores, $condiciones);
                $numero = mysqli_num_rows($result);
              
              }
              else if($_POST['request'] == "Inactive"){

                $campos = "*";
                $valores = "computador";
                $condiciones = "estado_pc = 0";
                $result = $utilModelo->consultarVariasTablas($campos, $valores, $condiciones);
                $numero = mysqli_num_rows($result);

              }
              
              else{

                $result = $utilModelo->mostrarregistros($tabla,$nombreCampo,$request);
                $numero = mysqli_num_rows($result);

              }

              if($numero)
              {
                
                echo "<div class=\"containero\">";

                $imagenes = array("../img/generic-pc.jpg", "../img/generic-pc2.jpg", "../img/generic-pc3.jpeg");
                while ($fila = mysqli_fetch_row($result)) 
                {
                    if ($fila != NULL) 
                    {

                      $datos=$fila[0]."||".$fila[1]."||".$fila[2]."||".$fila[3]."||".$fila[4]."||".$fila[5]."||".$fila[6]."||".$fila[7]."||".$fila[8]."||".$fila[9]."||".$fila[10]."||".$fila[11]."||".$fila[12]."||".$fila[13]."||".$fila[14]."||".$fila[15]."||".$fila[16]."||".$fila[17];
                      $random = $imagenes[rand(0, 2)];

                        echo "<div class=\"card\">";
                            echo "<img src=\"$random\">
                            <h4>$fila[0]</h4>
                            <p>Caracteristicas: </p>
                            <li>Procesador: $fila[6]</li>
                            <li>RAM: $fila[4]</li>
                            <li>Disco duro: $fila[8]</li>
                            <li>Sistema Operativo: $fila[2]</li>
                            <a  href=\"../computadores/fichatecnica.php?idPC=$fila[0]\" class=\"btn btn-small btn-default\"><i class=\"btn-icon-only icon-eye-open\"></i></a><a data-toggle=\"modal\" href=\"#modalEditar\" onclick=\"agregarForm('$datos');\" class=\"btn btn-small btn-info\"><i class=\"btn-icon-only icon-pencil\"></i></a><a href=\"#modalEliminar\"  onclick=\"agregarForm('$datos');\" data-toggle=\"modal\" class=\"btn btn-danger btn-small\"><i class=\"btn-icon-only icon-remove\"> </i></a>";

                        echo "</div>";
                        
                    }
                }
                   
                echo "<h6 class=\"bigstats\"></h6>
                </div>";

              }
  
              else{

                echo "No se encontraron resultados";
                
              }
            }


    ?>
