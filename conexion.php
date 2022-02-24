<?php
$link = mysqli_connect("sql10.freemysqlhosting.net", "sql10473863", "h8ewCKT7ID");
mysqli_select_db($link, "sql10473863");
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
