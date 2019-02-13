<?php
	include("conexion/conexion.php");
	include("sesiones/time_sesion.php");  

	if (isset($_POST["clave"])) {
		$sql_clave_a="SELECT clave FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
		$rs_clave_a= mysqli_query($mysqli,$sql_clave_a) or die(mysqli_error($mysqli));
		$row_clave_a=mysqli_fetch_array($rs_clave_a);
		if (md5($_POST["clave_a"]) != $row_clave_a["clave"]) {
			echo "<script>alert('La contraseña actual es incorrecta');window.location='cambiar_clave.php';</script>";
		}
		else {

			$sql_cambio="UPDATE usuarios SET clave='".md5($_POST["clave"])."' WHERE cedula='".$_SESSION["usuario"]."'";
			$rs_cambio= mysqli_query($mysqli,$sql_cambio) or die(mysqli_error($mysqli));
			echo "<script>alert('La contraseña se cambio correctamente');window.location='bienvenido.php';</script>";
		}
		
		

	}

?>