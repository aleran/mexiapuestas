<?php
	include("conexion/conexion.php");
	
		if (isset($_POST["correo"])){
			
				$sql_user="SELECT correo FROM usuarios WHERE correo='".$_POST["correo"]."' AND tipo='normal'";
				$rs_user=mysqli_query($mysqli,$sql_user)or die(mysql_error());
				$num_user=mysqli_num_rows($rs_user);

				if ($num_user !== 1) echo "<script>alert('Correo No Registrado en el sistema');window.location='index.php';</script>";

				$row_user=mysqli_fetch_array($rs_user);

				$sql_datos="SELECT cedula FROM usuarios WHERE cedula='".$_POST["cedula"]."' AND correo='".$row_user["correo"]."'";
				$rs_datos=mysqli_query($mysqli,$sql_datos)or die(mysql_error());
				$num_datos=mysqli_num_rows($rs_datos);

				if ($num_datos !== 1) echo "<script>alert('Cédula No Registrada en el sistema');window.location='index.php';</script>";

				$row_datos= mysqli_fetch_array($rs_datos);

				if ($row_datos["cedula"] == $_POST["cedula"] AND $row_user["correo"] == $_POST["correo"]) {
					require 'lib/PHPMailer/PHPMailerAutoload.php';
					include("correos/correo_recuperar.php");
			
				}
				else echo "<script>alert('Datos no coinciden Vuelva a intentarlo');window.location='index.php';</script>";	
		
		}
?>
