<?php
$link = mysqli_connect("bs8xt34tfk2kcawkul5c-mysql.services.clever-cloud.com", "ukr70bves9og4fn5", "tsQBVGEuldvU2dl3D6x7");
mysqli_select_db($link, "bs8xt34tfk2kcawkul5c");
$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
