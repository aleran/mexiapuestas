<?php
	include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");
	if (isset($_GET["anular"])) {
		$sql1="SELECT cedula, monto FROM loteria WHERE codigo='".$_GET["anular"]."'";
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

		$sql_nums="SELECT id_sorteo, numeros, premio FROM loteria WHERE codigo='".$_GET["anular"]."'";
		$rs_nums=mysqli_query($mysqli,$sql_nums) or die(mysqli_error());
		$row_nums=mysqli_fetch_array($rs_nums);
		$frac_an=$row_nums["premio"] / 10000;

		$sql_f="SELECT fracciones FROM loteria_frac WHERE numeros='".$row_nums["numeros"]."' AND id_sorteo='".$row_nums["id_sorteo"]."'";
		$rs_f=mysqli_query($mysqli,$sql_f) or die(mysqli_error());
		$row_f=mysqli_fetch_array($rs_f);
		$frac_total=$row_f["fracciones"] - $frac_an;


		$sql_anular="UPDATE loteria_frac SET fracciones='".$frac_total."' WHERE id_sorteo='".$row_nums["id_sorteo"]."' AND numeros='".$row_nums["numeros"]."'";
		$rs_anular=mysqli_query($mysqli,$sql_anular) or die(mysqli_error($mysqli));

		$sql_anular="UPDATE loteria SET activo='0' WHERE codigo='".$_GET["anular"]."'";
		$rs_anular=mysqli_query($mysqli,$sql_anular) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket anulado');window.location='activos_l.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";
	}

	if (isset($_GET["activar"])) {
		$sql1="SELECT cedula, monto FROM loteria WHERE codigo='".$_GET["activar"]."'";
		$rs1=mysqli_query($mysqli,$sql1) or die(mysqli_error());
		$row1=mysqli_fetch_array($rs1);

		if ($row1["cedula"]!="") {
			$sql2="SELECT saldo FROM usuarios WHERE cedula='".$row1["cedula"]."'";
			$rs2=mysqli_query($mysqli,$sql2) or die(mysqli_error());
			$row2=mysqli_fetch_array($rs2);

			$saldo_dev= $row2["saldo"] - $row1["monto"];

			$sql3="UPDATE usuarios SET saldo='".$saldo_dev."' WHERE cedula='".$row1["cedula"]."'";
			$rs3=mysqli_query($mysqli,$sql3) or die(mysqli_error($mysqli));

		}

		$sql_anular="UPDATE loteria SET activo='1' WHERE codigo='".$_GET["activar"]."'";
		$rs_anular=mysqli_query($mysqli,$sql_anular) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket Activado');window.location='anulados_l.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";
	}

	if (isset($_GET["ganar"])) {

		$sql_premio="SELECT premio, cedula, ganar FROM loteria WHERE codigo='".$_GET["ganar"]."'";
		$rs_premio=mysqli_query($mysqli,$sql_premio) or die(mysqli_error($mysqli));
		$row_premio=mysqli_fetch_array($rs_premio);

		if ($row_premio["ganar"]!=1) {

			if ($row_premio["cedula"]=="") {

				$sql_ganar="UPDATE loteria SET ganar='1' WHERE codigo='".$_GET["ganar"]."'";
				$rs_ganar=mysqli_query($mysqli,$sql_ganar) or die(mysqli_error($mysqli));
				echo "<script>alert('ticket marcado como Ganador');window.location='activos_l.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";

			}

			else {
				
				$sql_ganar="UPDATE loteria SET ganar='1' WHERE codigo='".$_GET["ganar"]."'";
				$rs_ganar=mysqli_query($mysqli,$sql_ganar) or die(mysqli_error($mysqli));

				$sql_usuario="SELECT saldo FROM usuarios WHERE cedula='".$row_premio["cedula"]."'";
				$rs_usuario=mysqli_query($mysqli,$sql_usuario) or die(mysqli_error($mysqli));
				$row_usuario=mysqli_fetch_array($rs_usuario);

				$saldo_f= $row_premio["premio"] + $row_usuario["saldo"];
				$sql_saldo="UPDATE usuarios SET saldo='".$saldo_f."' WHERE cedula='".$row_premio["cedula"]."'";
				$rs_saldo=mysqli_query($mysqli,$sql_saldo) or die(mysqli_error($mysqli));
				echo "<script>alert('ticket marcado como Ganador');window.location='activos_l.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";
			}
		
		
		}

		else {

			echo "<script>alert('ticket marcado como Ganador');window.location='activos_l.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";
		}


	}

	if (isset($_GET["perder"])) {

		$sql_perder="UPDATE loteria SET ganar='0' WHERE codigo='".$_GET["perder"]."'";
		$rs_perder=mysqli_query($mysqli,$sql_perder) or die(mysqli_error($mysqli));
		echo "<script>alert('ticket marcado como Perdedor');window.location='activos_l.php?desde=".$_GET["desde"]."&hasta=".$_GET["hasta"]."'</script>";
	}
?>
