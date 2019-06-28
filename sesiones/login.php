<?php
	include("../conexion/conexion.php");
	$pass=$_POST['clave'];
	$pass=md5($pass);
	
	$sql=$mysqli->query("SELECT * FROM usuarios WHERE correo='".$_POST["correo"]."'") or die (mysql_error());
	$num=mysqli_num_rows($sql);
	if ($num !== 1) echo "<script>alert('Correo no registrado');window.location='../iniciar_sesion.html';</script>";

	$row = mysqli_fetch_assoc($sql);
	
		
	if($pass==$row['clave']){
			session_start();
	    	// inicio la sesión
	    	$_SESSION["autentificado"]= "SI";
	    	//defino la sesión que demuestra que el usuario está autorizado
	    	$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

			$_SESSION['agencia']=$row['agencia'];
			$_SESSION['usuario']=$row['cedula'];
			$_SESSION['tipo']=$row['tipo'];
			$_SESSION['pais']=$row['pais'];

			if ($_SESSION['tipo'] !="chance") {
				header("location:../bienvenido.php");
			}else{
				header("location:../bienvenido_loteria.php");
			}
			
		}
	else echo "<script>alert('Clave Invalida');window.location='../iniciar_sesion.html';</script>";
	mysqli_close($mysqli);
?>