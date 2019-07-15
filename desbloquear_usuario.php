<?php
	include("conexion/conexion.php");
	include("sesiones/time_sesion.php");  


   	$sql2="UPDATE usuarios SET activo_chance='1' WHERE id='".$_GET["id_usuario"]."'";
    $rs2=mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
    
    echo "<script>alert('Usuario desbloqueado'); window.location='saldos_loteria.php';</script>";
?>