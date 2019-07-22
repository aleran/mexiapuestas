<?php
	include("conexion/conexion.php");
	include("sesiones/time_sesion.php");  

	if (isset($_GET["bloquear"])) {
		$sql2="UPDATE usuarios u JOIN agencias a ON u.agencia=a.id SET u.bloqueo_chance='1' WHERE a.agencia_padre=26";

		$rs2=mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));

		echo "<script>alert('Usuarios bloqueados'); window.location='bienvenido_loteria.php';</script>";

	}else{
		$sql2="UPDATE usuarios u JOIN agencias a ON u.agencia=a.id SET u.bloqueo_chance='0' WHERE a.agencia_padre=26";

		$rs2=mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));

		echo "<script>alert('Usuarios Desbloqueados'); window.location='bienvenido_loteria.php';</script>";
	}
   	
    

        
    
?>