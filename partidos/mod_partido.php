<?php
	include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");  
	if ($_POST["dep"]==1) {

		$sql_cp="UPDATE partidos SET
									id_competicion='".$_POST["compe_selec"]."', equipo1='".$_POST["equipo1_selec"]."', equipo2='".$_POST["equipo2_selec"]."', fecha='".$_POST["fecha"]."', hora='".$_POST["hora"]."', fecha_v='".$_POST["fecha_v"]."', hora_v='".$_POST["hora_v"]."', gj1='".$_POST["gj1"]."', gj2='".$_POST["gj2"]."', empate='".$_POST["empate"]."',v_alta='".$_POST["v_alta"]."', alta='".$_POST["alta"]."', baja='".$_POST["baja"]."', v_runline1='".$_POST["v_runline1"]."', v_runline2='".$_POST["v_runline2"]."', runline1='".$_POST["runline1"]."', runline2='".$_POST["runline2"]."', gpt1='".$_POST["gpt1"]."', gpt2='".$_POST["gpt2"]."', empatept='".$_POST["empatept"]."', gg='".$_POST["gg"]."', ng='".$_POST["ng"]."', dc1x='".$_POST["dc1x"]."', dc2x='".$_POST["dc2x"]."', dc12='".$_POST["dc12"]."' WHERE id='".$_POST["id_partido"]."'";

		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));


	}

	if ($_POST["dep"]==2) {

		$sql_cp="UPDATE partidos SET
									id_competicion='".$_POST["compe_selec"]."', equipo1='".$_POST["equipo1_selec"]."', equipo2='".$_POST["equipo2_selec"]."', fecha='".$_POST["fecha"]."', hora='".$_POST["hora"]."', fecha_v='".$_POST["fecha_v"]."', hora_v='".$_POST["hora_v"]."', gj1='".$_POST["gj1"]."', gj2='".$_POST["gj2"]."',v_alta='".$_POST["v_alta"]."', alta='".$_POST["alta"]."', baja='".$_POST["baja"]."', v_runline1='".$_POST["v_runline1"]."', v_runline2='".$_POST["v_runline2"]."', runline1='".$_POST["runline1"]."', runline2='".$_POST["runline2"]."',g5to1='".$_POST["g5to1"]."', g5to2='".$_POST["g5to2"]."' WHERE id='".$_POST["id_partido"]."'";

		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==3) {


		$sql_cp="UPDATE partidos SET
									id_competicion='".$_POST["compe_selec"]."', equipo1='".$_POST["equipo1_selec"]."', equipo2='".$_POST["equipo2_selec"]."', fecha='".$_POST["fecha"]."', hora='".$_POST["hora"]."', fecha_v='".$_POST["fecha_v"]."', hora_v='".$_POST["hora_v"]."', gj1='".$_POST["gj1"]."', gj2='".$_POST["gj2"]."',v_alta='".$_POST["v_alta"]."', alta='".$_POST["alta"]."', baja='".$_POST["baja"]."', v_runline1='".$_POST["v_runline1"]."', v_runline2='".$_POST["v_runline2"]."', runline1='".$_POST["runline1"]."', runline2='".$_POST["runline2"]."',gmt1='".$_POST["gmt1"]."', gmt2='".$_POST["gmt2"]."' WHERE id='".$_POST["id_partido"]."'";

		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==4) {


		$sql_cp="UPDATE partidos SET
									id_competicion='".$_POST["compe_selec"]."', equipo1='".$_POST["equipo1_selec"]."', equipo2='".$_POST["equipo2_selec"]."', fecha='".$_POST["fecha"]."', hora='".$_POST["hora"]."', fecha_v='".$_POST["fecha_v"]."', hora_v='".$_POST["hora_v"]."', gj1='".$_POST["gj1"]."', gj2='".$_POST["gj2"]."',v_alta='".$_POST["v_alta"]."', alta='".$_POST["alta"]."', baja='".$_POST["baja"]."', v_runline1='".$_POST["v_runline1"]."', v_runline2='".$_POST["v_runline2"]."', runline1='".$_POST["runline1"]."', runline2='".$_POST["runline2"]."' WHERE id='".$_POST["id_partido"]."'";

		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==5) {


		$sql_cp="UPDATE partidos SET
									id_competicion='".$_POST["compe_selec"]."', equipo1='".$_POST["equipo1_selec"]."', equipo2='".$_POST["equipo2_selec"]."', fecha='".$_POST["fecha"]."', hora='".$_POST["hora"]."', fecha_v='".$_POST["fecha_v"]."', hora_v='".$_POST["hora_v"]."', gj1='".$_POST["gj1"]."', gj2='".$_POST["gj2"]."', v_runline1='".$_POST["v_runline1"]."', v_runline2='".$_POST["v_runline2"]."', runline1='".$_POST["runline1"]."', runline2='".$_POST["runline2"]."' WHERE id='".$_POST["id_partido"]."'";

		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==6) {


		$sql_cp="UPDATE partidos SET
									id_competicion='".$_POST["compe_selec"]."', equipo1='".$_POST["equipo1_selec"]."', equipo2='".$_POST["equipo2_selec"]."', fecha='".$_POST["fecha"]."', hora='".$_POST["hora"]."', fecha_v='".$_POST["fecha_v"]."', hora_v='".$_POST["hora_v"]."', gj1='".$_POST["gj1"]."', gj2='".$_POST["gj2"]."' WHERE id='".$_POST["id_partido"]."'";

		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}
	
	if ($_POST["dep"]==7) {


		$sql_cp="UPDATE partidos SET
									id_competicion='".$_POST["compe_selec"]."', equipo1='".$_POST["equipo1_selec"]."', equipo2='".$_POST["equipo2_selec"]."', fecha='".$_POST["fecha"]."', hora='".$_POST["hora"]."', fecha_v='".$_POST["fecha_v"]."', hora_v='".$_POST["hora_v"]."', gj1='".$_POST["gj1"]."', gj2='".$_POST["gj2"]."', empate='".$_POST["empate"]."',v_alta='".$_POST["v_alta"]."', alta='".$_POST["alta"]."', baja='".$_POST["baja"]."' WHERE id='".$_POST["id_partido"]."'";

		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}
	
	echo "<script>alert('Partido Modificado correctamente');window.location='list_partidos_mod.php';</script>";
?>