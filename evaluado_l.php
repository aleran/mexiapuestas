<?php
	include("conexion/conexion.php");
	include("sesiones/time_sesion.php");  

    	$sql="INSERT INTO resultados_l(id_sorteo,resultado) VALUES('".$_POST["id_sorteo"]."','".$_POST["r_sorteo"]."')";

    $rs=mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    $sql2="UPDATE sorteos SET eval='1' WHERE id='".$_POST["id_sorteo"]."'";
    $rs2=mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
    
    echo "<script>alert('Sorteo evaluado'); window.location='list_sorteos.php';</script>";
?>