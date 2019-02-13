<?php

    $mysqli = new MySQLi("localhost","u146230243_mexia","Mexi123#$","u146230243_mexia");

    if (!$mysqli) die ("Error al conectar con el servidor -> ".mysqli_error());
    mysqli_query ($mysqli,"SET NAMES 'utf8'");

    if ($_SESSION["pais"]==1 || $_POST["pais"]==1) {
        date_default_timezone_set('America/Bogota');
        
    }
    else {
        date_default_timezone_set('America/Mexico_City');
        
    }
?>