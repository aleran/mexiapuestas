<?php
	include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");  
	if ($_POST["dep"]==1) {

		$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2,empate,v_alta,alta,baja,v_runline1,v_runline2,runline1,runline2,gpt1,gpt2,empatept,gg,ng,dc1x,dc2x,dc12)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."','".$_POST["empate"]."','".$_POST["v_alta"]."','".$_POST["alta"]."','".$_POST["baja"]."','".$_POST["v_runline1"]."','".$_POST["v_runline2"]."','".$_POST["runline1"]."','".$_POST["runline2"]."','".$_POST["gpt1"]."','".$_POST["gpt2"]."','".$_POST["empatept"]."','".$_POST["gg"]."','".$_POST["ng"]."','".$_POST["dc1x"]."','".$_POST["dc2x"]."','".$_POST["dc12"]."')";
		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==2) {

		/*$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2,v_alta,alta,baja,v_runline1,v_runline2,runline1,runline2,g5to1,g5to2,v_srl1,v_srl2,srl1,srl2,si,no,ap1,ap2,v_bst,bst1,bst2,v_alta_5to,alta_5to,baja_5to)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."','".$_POST["v_alta"]."','".$_POST["alta"]."','".$_POST["baja"]."','".$_POST["v_runline1"]."','".$_POST["v_runline2"]."','".$_POST["runline1"]."','".$_POST["runline2"]."','".$_POST["g5to1"]."','".$_POST["g5to2"]."','".$_POST["v_srl1"]."','".$_POST["v_srl2"]."','".$_POST["srl1"]."','".$_POST["srl2"]."','".$_POST["si"]."','".$_POST["no"]."','".$_POST["ap1"]."','".$_POST["ap2"]."','".$_POST["v_bst"]."','".$_POST["bst1"]."','".$_POST["bst2"]."','".$_POST["v_alta_5to"]."','".$_POST["alta_5to"]."','".$_POST["baja_5to"]."')";*/

		$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2,v_alta,alta,baja,v_runline1,v_runline2,runline1,runline2,g5to1,g5to2)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."','".$_POST["v_alta"]."','".$_POST["alta"]."','".$_POST["baja"]."','".$_POST["v_runline1"]."','".$_POST["v_runline2"]."','".$_POST["runline1"]."','".$_POST["runline2"]."','".$_POST["g5to1"]."','".$_POST["g5to2"]."')";
		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==3) {

		/*$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2,v_alta,alta,baja,v_runline1,v_runline2,runline1,runline2,gmt1,gmt2,v_alta_mt,alta_mt,baja_mt,v_runline_mt1,v_runline_mt2,runline_mt1,runline_mt2)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."','".$_POST["v_alta"]."','".$_POST["alta"]."','".$_POST["baja"]."','".$_POST["v_runline1"]."','".$_POST["v_runline2"]."','".$_POST["runline1"]."','".$_POST["runline2"]."','".$_POST["gmt1"]."','".$_POST["gmt2"]."','".$_POST["v_alta_mt"]."','".$_POST["alta_mt"]."','".$_POST["baja_mt"]."','".$_POST["v_runline_mt1"]."','".$_POST["v_runline_mt2"]."','".$_POST["runline_mt1"]."','".$_POST["runline_mt2"]."')";*/

		$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2,v_alta,alta,baja,v_runline1,v_runline2,runline1,runline2,gmt1,gmt2)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."','".$_POST["v_alta"]."','".$_POST["alta"]."','".$_POST["baja"]."','".$_POST["v_runline1"]."','".$_POST["v_runline2"]."','".$_POST["runline1"]."','".$_POST["runline2"]."','".$_POST["gmt1"]."','".$_POST["gmt2"]."')";

		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==4) {

		$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2,v_alta,alta,baja,v_runline1,v_runline2,runline1,runline2)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."','".$_POST["v_alta"]."','".$_POST["alta"]."','".$_POST["baja"]."','".$_POST["v_runline1"]."','".$_POST["v_runline2"]."','".$_POST["runline1"]."','".$_POST["runline2"]."')";
		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==5) {

		$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2,v_runline1,v_runline2,runline1,runline2)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."','".$_POST["v_runline1"]."','".$_POST["v_runline2"]."','".$_POST["runline1"]."','".$_POST["runline2"]."')";
		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}

	if ($_POST["dep"]==6) {

		$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."')";
		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}
	
	if ($_POST["dep"]==7) {

		$sql_cp="INSERT INTO partidos
								(id,id_competicion,equipo1,equipo2,fecha,hora,fecha_v,hora_v,gj1,gj2,v_alta,alta,baja)
								VALUES(null,'".$_POST["compe_selec"]."','".$_POST["equipo1_selec"]."','".$_POST["equipo2_selec"]."','".$_POST["fecha"]."','".$_POST["hora"]."','".$_POST["fecha_v"]."','".$_POST["hora_v"]."','".$_POST["gj1"]."','".$_POST["gj2"]."','".$_POST["v_alta"]."','".$_POST["alta"]."','".$_POST["baja"]."')";
		$rs_cp=mysqli_query($mysqli,$sql_cp)or die(mysqli_error($mysqli));
	}
	
	echo "<script>alert('Partido creado correctamente');window.location='crear_partidos.php?deporte=".$_POST["dep"]."';</script>";
?>