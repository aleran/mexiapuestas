<?php
	include("conexion/conexion.php");

	if (isset($_POST["cedula"])) {
		$sql_ci="SELECT cedula FROM usuarios WHERE cedula='".$_POST["cedula"]."'";
		$rs_ci= mysqli_query($mysqli,$sql_ci) or die(mysqli_error($mysqli));
		$num_ci=mysqli_num_rows($rs_ci);
		if ($num_ci == 1) {
			echo "<script>alert('Cedula ya registrada anteriormente');window.location='registro_usuario.php';</script>";
		}
		$sql_correo="SELECT correo FROM usuarios WHERE correo='".$_POST["correo"]."'";
		$rs_correo= mysqli_query($mysqli,$sql_correo) or die(mysqli_error($mysqli));
		$num_correo=mysqli_num_rows($rs_correo);
		if ($num_correo == 1) {
			echo "<script>alert('Correo ya registrado anteriormente');window.location='registro_usuario.php';</script>";
		}
		$sql="INSERT INTO usuarios VALUES (null, '$_POST[pais]', '$_POST[agencia]','$_POST[cedula]', '$_POST[nombre]', '$_POST[apellido]', '$_POST[correo]', '".md5($_POST["clave"])."', '$_POST[direccion]', '$_POST[telefono]', '0', 'normal')";
		$rs= mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
		echo "<script>alert('Registrado correctamente');window.location='index.php';</script>";
		//include("correo_registro.php");

	}

?>