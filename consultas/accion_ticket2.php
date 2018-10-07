<?php
	include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");
	if (isset($_GET["anular"])) {
		$sql1="SELECT cedula, monto FROM parlay WHERE codigo='".$_GET["anular"]."'";
		$rs1=mysqli_query($mysqli,$sql1) or die(mysqli_error());
		$row1=mysqli_fetch_array($rs1);

		if ($row1["cedula"]!="") {
			$sql2="SELECT saldo FROM usuarios WHERE cedula='".$row1["cedula"]."'";
			$rs2=mysqli_query($mysqli,$sql2) or die(mysqli_error());
			$row2=mysqli_fetch_array($rs2);

			$saldo_dev= $row1["monto"] + $row2["saldo"];

			$sql3="UPDATE usuarios SET saldo='".$saldo_dev."' WHERE cedula='".$row1["cedula"]."'";
			$rs3=mysqli_query($mysqli,$sql3) or die(mysqli_error($mysqli));

		}

		$sql_anular="UPDATE parlay SET activo='0' WHERE codigo='".$_GET["anular"]."'";
		$rs_anular=mysqli_query($mysqli,$sql_anular) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket anulado');window.location='consultas.php'</script>";
	}

	if (isset($_GET["ganar"])) {

		$sql_premio="SELECT premio, cedula, ganar FROM parlay WHERE codigo='".$_GET["ganar"]."'";
		$rs_premio=mysqli_query($mysqli,$sql_premio) or die(mysqli_error($mysqli));
		$row_premio=mysqli_fetch_array($rs_premio);

		if ($row_premio["ganar"]!=1) {

			if ($row_premio["cedula"]=="") {
				$sql_ganar="UPDATE parlay SET ganar='1' WHERE codigo='".$_GET["ganar"]."'";
				$rs_ganar=mysqli_query($mysqli,$sql_ganar) or die(mysqli_error($mysqli));
				echo "<script>alert('ticket marcado como Ganador');window.location='activos.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";

			}

			else {
				
				$sql_ganar="UPDATE parlay SET ganar='1' WHERE codigo='".$_GET["ganar"]."'";
				$rs_ganar=mysqli_query($mysqli,$sql_ganar) or die(mysqli_error($mysqli));

				$sql_usuario="SELECT saldo FROM usuarios WHERE cedula='".$row_premio["cedula"]."'";
				$rs_usuario=mysqli_query($mysqli,$sql_usuario) or die(mysqli_error($mysqli));
				$row_usuario=mysqli_fetch_array($rs_usuario);

				$saldo_f= $row_premio["premio"] + $row_usuario["saldo"];
				$sql_saldo="UPDATE usuarios SET saldo='".$saldo_f."' WHERE cedula='".$row_premio["cedula"]."'";
				$rs_saldo=mysqli_query($mysqli,$sql_saldo) or die(mysqli_error($mysqli));
				echo "<script>alert('ticket marcado como Ganador');window.location='activos.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";
			}
		
		
		}

		else {

			echo "<script>alert('ticket marcado como Ganador');window.location='activos.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";
		}


	}

	if (isset($_GET["perder"])) {

		$sql_perder="UPDATE parlay SET ganar='0' WHERE codigo='".$_GET["perder"]."'";
		$rs_perder=mysqli_query($mysqli,$sql_perder) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket marcado como Perdedor');window.location='consultas.php'</script>";
	}
	if (isset($_GET["pagar"])) {

		$sql_perder="UPDATE parlay SET pagado='1' WHERE codigo='".$_GET["pagar"]."'";
		$rs_perder=mysqli_query($mysqli,$sql_perder) or die(mysqli_error($mysqli));
		echo "<script>alert('Ticket Pagado');window.location='consultas.php'</script>";
	}
?>