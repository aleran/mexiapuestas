<?php
    include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="theme-color" content="#008000">
	<!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#008000">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Agentes .:mexiapuestas.net</title>
	
	<!--Fuentes-->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="../css/estilos_menu.css">
	
	<!--Fuentes-->
	<style>
	    hr {
		   height: 1px;
		   border: 0;
		   color: #E40505;
		   background-color: #078E00;
		}
	</style>
</head>
 <!-- Fecha Sistema -->
    
	<div style="float:right;">
		<script src="../js/fecha.js"></script>
	</div>
	  <!-- Fecha Sistema -->
	    
	      <!-- Hora Sistema (24H) -->

	

	<div id="reloj" style="font-size:14px;"></div>

	

  	<!-- Hora Sistema (24H) -->
<!--Contenido Sistema-->

<body>
	 <!-- mensaje arriba -->
	<?php 
		include "../template/mensaje_top.html";
	?>
	 
	<div class="content">
		<!-- header -->
		<?php 
			include "../template/header2.html";
		?>
		
		<!-- menu -->
		<?php 
			include "../template/menu_agencias.php";
		?>
		<!-- mostrar usuario o agencia -->
		<?php 
			include "../template/barra_usuario.php";
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>

			<?php 
        			$sql_part="SELECT * FROM partidos WHERE id='".$_GET["partido"]."'";
        			$rs_part=mysqli_query($mysqli, $sql_part) or die(mysqli_error());
        			$row_part=mysqli_fetch_array($rs_part);

					$sql_compe="SELECT competicion, id_deporte FROM competiciones WHERE id_competicion=$row_part[id_competicion]";
					$rs_compe=mysqli_query($mysqli, $sql_compe) or die (mysqli_error());
					$row_compe=mysqli_fetch_array($rs_compe);

					$sql_eq1="SELECT id, equipo FROM equipos WHERE id=$row_part[equipo1]";
					$rs_eq1=mysqli_query($mysqli, $sql_eq1) or die (mysqli_error());
					$row_eq1=mysqli_fetch_array($rs_eq1);

					$sql_eq2="SELECT id, equipo FROM equipos WHERE id=$row_part[equipo2]";
					$rs_eq2=mysqli_query($mysqli, $sql_eq2) or die (mysqli_error());
					$row_eq2=mysqli_fetch_array($rs_eq2);

					echo "Partido: ".$row_eq1["equipo"]. " vs " .$row_eq2["equipo"]. " (".$row_compe["competicion"].")"." Fecha y Hora: ".$row_part["fecha"]." ".$row_part["hora"];
        		?>

			<div class="row">

				<form class="form-horizontal" method="POST" action="evaluado.php">
                    
					<input type="hidden" name="id_partido" value="<?php echo $row_part["id"] ?>">
					<input type="hidden" name="dep" value="<?php echo $row_compe["id_deporte"] ?>">
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_gj1" class="col-sm-6 control-label">ML: <?php echo $row_eq1["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_gj1" id="r_gj1" class="form-control">
                                        
                                        <option value="PERDEDOR">PERDEDOR</option>
                                        <option value="GANADOR">GANADOR</option>
                                        <option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_gj2" class="col-sm-6 control-label">ML: <?php echo $row_eq2["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_gj2" id="r_gj2" class="form-control">
                                        
                                        <option value="PERDEDOR">PERDEDOR</option>
                                        <option value="GANADOR">GANADOR</option>
                                        <option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($row_compe["id_deporte"]==1) {?>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="form-group">
                                <label for="r_empate" class="col-sm-6 control-label">EMPATE:</label>
                                <div class="col-sm-6">
                                    <select  name="r_empate" id="r_empate" class="form-control">
                                        
                                        <option value="PERDEDOR">PERDEDOR</option>
                                        <option value="GANADOR">GANADOR</option>
                                        <option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php } ?>
                    <?php if ($row_compe["id_deporte"] == 1 || $row_compe["id_deporte"]== 2 || $row_compe["id_deporte"]== 3 || $row_compe["id_deporte"]== 4 || $row_compe["id_deporte"]== 7) { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_alta" class="col-sm-6 control-label">ALTA: <?php echo $row_part["v_alta"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_alta" id="r_alta" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_baja" class="col-sm-6 control-label">BAJA: <?php echo $row_part["v_alta"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_baja" id="r_baja" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <hr>
                    <?php } ?>
                    <?php if ($row_compe["id_deporte"]==1) {?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_gpt1" class="col-sm-6 control-label">G 1T: <?php echo $row_eq1["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_gpt1" id="r_gpt1" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_gpt2" class="col-sm-6 control-label">G 1T: <?php echo $row_eq2["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_gpt2" id="r_gpt2" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="row">
                        <div class="col-sm-6 col-sm-offset-3"> 
                            <div class="form-group">
                                <label for="r_empatept" class="col-sm-6 control-label">Empate 1T:</label>
                                <div class="col-sm-6">
                                    <select  name="r_empatept" id="r_empatept" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_gg" class="col-sm-6 control-label">GG:</label>
                                <div class="col-sm-6">
                                    <select  name="r_gg" id="r_gg" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_ng" class="col-sm-6 control-label">NG:</label>
                                <div class="col-sm-6">
                                    <select  name="r_ng" id="r_ng" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_dc1x" class="col-sm-6 control-label">DC1X: <?php echo $row_eq1["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_dc1x" id="r_dc1x" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_dc2x" class="col-sm-6 control-label">DC2X: <?php echo $row_eq2["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_dc2x" id="r_dc2x" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="form-group">
                                <label for="r_dc12" class="col-sm-6 control-label">DC12:</label>
                                <div class="col-sm-6">
                                    <select  name="r_dc12" id="r_dc12" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php }?>
                    <?php if ($row_compe["id_deporte"] == 1 || $row_compe["id_deporte"]== 2 || $row_compe["id_deporte"]== 3 || $row_compe["id_deporte"]== 4 || $row_compe["id_deporte"]== 5) { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_runline1" class="col-sm-6 control-label">RUNLINE (<?php echo $row_part["v_runline1"]; ?>): <?php echo $row_eq1["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_runline1" id="r_runline1" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_runline2" class="col-sm-6 control-label">RUNLINE (<?php echo $row_part["v_runline2"]; ?>): <?php echo $row_eq2["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_runline2" id="r_runline2" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php } ?>
                     <?php if ($row_compe["id_deporte"]== 2) { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_g5to1" class="col-sm-6 control-label">G 5to: <?php echo $row_eq1["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_g5to1" id="r_g5to1" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="r_g5to2" class="col-sm-6 control-label">G 5to: <?php echo $row_eq2["equipo"]; ?></label>
                                <div class="col-sm-6">
                                    <select  name="r_g5to2" id="r_g5to2" class="form-control">
                                    	
                                    	<option value="PERDEDOR">PERDEDOR</option>
                                    	<option value="GANADOR">GANADOR</option>
                                    	<option value="PUSH">PUSH</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>               
                            <center><button class="btn btn-success">Evaluar</button></center><br>
                        
                </form>

			</div>
			
		</div>
		<?php 
			include "../template/modal_registro.php";
		?>
	</div>
	
	<script src="../js/hora.js"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/validacion_registro.js"></script>

</body>
</html>


