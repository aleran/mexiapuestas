<?php
	include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");  
    if ($_POST["dep"]==1) {

    	$sql="INSERT INTO resultados(id_partido,r_gj1,r_gj2,r_empate,r_alta,r_baja,r_gpt1,r_gpt2,r_empatept,r_gg,r_ng,r_dc1x,r_dc2x,r_dc12,r_runline1,r_runline2) VALUES('".$_POST["id_partido"]."','".$_POST["r_gj1"]."','".$_POST["r_gj2"]."','".$_POST["r_empate"]."','".$_POST["r_alta"]."','".$_POST["r_baja"]."','".$_POST["r_gpt1"]."','".$_POST["r_gpt2"]."','".$_POST["r_empatept"]."','".$_POST["r_gg"]."','".$_POST["r_ng"]."','".$_POST["r_dc1x"]."','".$_POST["r_dc2x"]."','".$_POST["r_dc12"]."','".$_POST["r_runline1"]."','".$_POST["r_runline2"]."')";
	}

	if ($_POST["dep"]==2) {

		$sql="INSERT INTO resultados(id_partido,r_gj1,r_gj2,r_alta,r_baja,r_g5to1,r_g5to2,r_runline1,r_runline2) VALUES('".$_POST["id_partido"]."','".$_POST["r_gj1"]."','".$_POST["r_gj2"]."','".$_POST["r_alta"]."','".$_POST["r_baja"]."','".$_POST["r_g5to1"]."','".$_POST["r_g5to2"]."','".$_POST["r_runline1"]."','".$_POST["r_runline2"]."')";
	}

	if ($_POST["dep"]==3) {
		$sql="INSERT INTO resultados(id_partido,r_gj1,r_gj2,r_alta,r_baja,r_runline1,r_runline2) VALUES('".$_POST["id_partido"]."','".$_POST["r_gj1"]."','".$_POST["r_gj2"]."','".$_POST["r_alta"]."','".$_POST["r_baja"]."','".$_POST["r_runline1"]."','".$_POST["r_runline2"]."')";
	}

	if ($_POST["dep"]==4) {
		$sql="INSERT INTO resultados(id_partido,r_gj1,r_gj2,r_alta,r_baja,r_runline1,r_runline2) VALUES('".$_POST["id_partido"]."','".$_POST["r_gj1"]."','".$_POST["r_gj2"]."','".$_POST["r_alta"]."','".$_POST["r_baja"]."','".$_POST["r_runline1"]."','".$_POST["r_runline2"]."')";
	}

	if ($_POST["dep"]==5) {
		$sql="INSERT INTO resultados(id_partido,r_gj1,r_gj2,r_runline1,r_runline2) VALUES('".$_POST["id_partido"]."','".$_POST["r_gj1"]."','".$_POST["r_gj2"]."','".$_POST["r_runline1"]."','".$_POST["r_runline2"]."')";
	}

	if ($_POST["dep"]==6) {

		$sql="INSERT INTO resultados(id_partido,r_gj1,r_gj2) VALUES('".$_POST["id_partido"]."','".$_POST["r_gj1"]."','".$_POST["r_gj2"]."')";

	}
	
	if ($_POST["dep"]==7) {

		$sql="INSERT INTO resultados(id_partido,r_gj1,r_gj2,r_alta,r_baja) VALUES('".$_POST["id_partido"]."','".$_POST["r_gj1"]."','".$_POST["r_gj2"]."','".$_POST["r_alta"]."','".$_POST["r_baja"]."')";

	}

    $rs=mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    $sql2="UPDATE partidos SET eval='1' WHERE id='".$_POST["id_partido"]."'";
    $rs2=mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
    
    echo "<script>alert('Partido evaluado'); window.location='list_partidos.php';</script>";
?>