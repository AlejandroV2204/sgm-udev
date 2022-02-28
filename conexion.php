<?php
$link = mysqli_connect("db4free.net", "udev_edu", "OscarJavier");
mysqli_select_db($link, "udev_edu");
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
