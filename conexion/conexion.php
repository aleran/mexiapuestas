<?php

    $mysqli = new MySQLi("localhost","root","102236","mexi_a");

    if (!$mysqli) die ("Error al conectar con el servidor -> ".mysqli_error());
    mysqli_query ($mysqli,"SET NAMES 'utf8'");

    if ($_SESSION["pais"]==1 || $_POST["pais"]==1) {
        date_default_timezone_set('America/Bogota');
        
    }
    elseif ($_SESSION["pais"]==2 || $_POST["pais"]==2) {

        date_default_timezone_set('America/Caracas');
        
    }
    else {
        date_default_timezone_set('America/Mexico_City');
        
    }
?>