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
	<link rel="stylesheet" href="../lib/jquery-ui-1.12.1/jquery-ui.min.css">
	<style>
		.suggest-element{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions {
			text-align:left;
			margin: 0 auto;
			position:absolute;
			min-width:150px;
			height:100px;
			border:ridge 2px;
			border-radius: 3px;
			overflow: auto;
			background: white;
			display: none;
			z-index: 2;
		}
		.suggest-element2{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions2 {
			text-align:left;
			margin: 0 auto;
			position:absolute;
			min-width:150px;
			height:100px;
			border:ridge 2px;
			border-radius: 3px;
			overflow: auto;
			background: white;
			display: none;
			z-index: 2;
		}
		.suggest-element3{
			margin-left:5px;
			margin-top:5px;
			width:350px;
			cursor:pointer;
		}
		#suggestions3 {
			text-align:left;
			margin: 0 auto;
			position:absolute;
			min-width:150px;
			height:100px;
			border:ridge 2px;
			border-radius: 3px;
			overflow: auto;
			background: white;
			display: none;
			z-index: 2;
		}
		::selection{background: white;}
		::-moz-selection {background: white;}

		.aparecer {
			display: block;
		}
		.letra_i{
			font-size: 30px;
		}

	</style>
	
	<!--Fuentes-->
	
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
		<div class="container">
			<br>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-3">
				<?php
					if (isset($_POST["deporte"])) {
						$sql_dep="SELECT deporte FROM deportes WHERE id='".$_POST["deporte"]."'";
						$deporte=$_POST["deporte"];
					}
					else {
						$sql_dep="SELECT deporte FROM deportes WHERE id='".$_GET["deporte"]."'";
						$deporte=$_GET["deporte"];
					}


					$rs_dep=mysqli_query($mysqli, $sql_dep) or die(mysqli_error());
					$row_dep=mysqli_fetch_array($rs_dep);
				?>
					<h2>Creador de Partidos: <?php echo $row_dep["deporte"]; ?></h2><br>


				</div>

			</div>
			<div class="form-group">
					    	
			<div class="row">
				<form class="form-horizontal" action="cp.php" method="POST">
				<input type="hidden" name="dep" id="dep" value="<?php echo $deporte;?>">
				

				<div class="col-sm-6 col-sm-offset-3">
					<div class="form-group">
						
						<div class="col-sm-8">
						    <input type="text" required autocomplete="off" onkeyup="bus_h()" class="form-control" name="comp" id="comp" placeholder="Liga o Competición" title="Liga o Competición" style="font-size: 25px;">
						    <input type="hidden" name="compe_selec" id="compe_selec"><div id="suggestions"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" name="fecha" id="fecha" placeholder="Fecha Colombia" title="Fecha Colombia" autocomplete="off" style="font-size: 25px;">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" name="hora" id="hora" placeholder="Hora Colombia HH:MM:SS" title="Hora Colombia HH:MM:SS" style="font-size: 25px;">
					    	</div>
					  	</div>
				</div><br><br>
				<div class="col-sm-6">
						<div class="form-group">
							<div class="col-sm-8">
					      		<input type="text" required class="form-control" name="fecha_v" id="fecha_v" placeholder="Fecha México" title="Fecha México" autocomplete="off" style="font-size: 25px;">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" name="hora_v" id="hora_v" placeholder="Hora México HH:MM:SS" title="Hora México HH:MM:SS" style="font-size: 25px;"><br>
					    	</div>
					  	</div>
				</div>
			</div>
			<div class="row">
					<div class="col-sm-6">
						
					  	<div class="form-group">
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" autocomplete="off" onkeyup="bus_h3()" name="equipo2" id="equipo2" placeholder="Equipo local" title="Equipo local">
					      		<input type="hidden" name="equipo2_selec" id="equipo2_selec"><div id="suggestions3"></div>
					    	</div>
					  	</div>
					</div>
					<div class="col-sm-6">
					  	<div class="form-group">
					    	<div class="col-sm-8">
					      		<input type="text" required class="form-control" autocomplete="off" onkeyup="bus_h2()" name="equipo1" id="equipo1" placeholder="Equipo visitante" title="Equipo visitante">
					      		<input type="hidden" name="equipo1_selec" id="equipo1_selec"><div id="suggestions2"></div>
					    	</div>
					  	</div>
					  	
				  	</div>
			</div><br><br>
			<div class="row">
				<?php if ($deporte == 1) { ?>
				<div class="col-sm-4">
				<?php } else {?>
				<div class="col-sm-6">
				<?php } ?>
					<div class="form-group">
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="gj2" id="gj2" placeholder="ML local" title="ML local" style="font-size: 25px;">
					    </div>
				  	</div>
				</div>
			<?php if ($deporte == 1) { ?>
			
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="empate" id="empate" placeholder="Empate" title="Empate" style="font-size: 25px;">
						</div>
					</div>
				</div>
			
			<?php } ?>
				<?php if ($deporte == 1) { ?>
				<div class="col-sm-4">
				<?php } else {?>
				<div class="col-sm-6">
				<?php } ?>
					<div class="form-group">
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="gj1" id="gj1" placeholder="ML visitante" title="ML visitante" style="font-size: 25px;">
					    </div>
					</div>
				</div>

			</div><br>
			
			
			<?php if ($deporte == 1 || $deporte== 2 || $deporte== 3 || $deporte== 4 || $deporte== 7) { ?>
			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="alta" id="alta" placeholder="Alta" title="Alta" style="font-size: 25px;">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_alta" id="v_alta" placeholder="Valor Alta" title="Valor Alta" style="font-size: 25px;">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="baja" id="baja" placeholder="Baja" title="Baja" style="font-size: 25px;">
						</div>
					</div>
				</div>
			</div><br>

				<?php if ($deporte == 1) { ?>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
						    	
						    <div class="col-sm-8">
						      	<input type="number" required class="form-control" name="gg" id="gg" placeholder="GG" title="GG" style="font-size: 25px;">
						    </div>
					  	</div>
					</div>
					<div class="col-sm-6">

						<div class="form-group">
						    	
						    <div class="col-sm-8">
						      	<input type="number" required class="form-control" name="ng" id="ng" placeholder="NG" title="NG" style="font-size: 25px;">
						    </div>
						</div>
					</div>

				</div><br>
				<?php } ?>
			<?php } ?>
			
			<?php if ($deporte == 1 || $deporte== 2 || $deporte== 3 || $deporte== 4 || $deporte== 5) { ?>
			<div class="row">
				<div class="col-sm-3">
				
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_runline2" id="v_runline2" placeholder="Valor RL local" title="Valor RL local" style="font-size: 25px;">
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="form-group">
						 <div class="col-sm-8">
						    <input type="number" required class="form-control" name="runline2" id="runline2" placeholder="Runline local" title="Runline local" style="font-size: 25px;">
						</div>   	
						
					 </div>
					
					
				</div>
				<div class="col-sm-3">
						<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_runline1" id="v_runline1" placeholder="Valor RL visitante" title="Valor RL visitante" style="font-size: 25px;">
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="runline1" id="runline1" placeholder="Runline visitante" title="Runline visitante" style="font-size: 25px;">
						</div>    	
						
					</div>
				</div>
			</div><br>
			<?php } ?>
			<?php if ($deporte == 1) { ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="gpt2"" id="gpt2" placeholder="1T local" title="1T local" style="font-size: 25px;">
					    </div>	
					    
				  	</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="gpt1" id="gpt1" placeholder="1T visitante" title="1T visitante" style="font-size: 25px;">
					    </div>	
					    
					</div>
				</div>

			</div><br>

			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="form-group">						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="empatept" id="empatept" placeholder="Emp 1T" title="Emp 1T" style="font-size: 25px;">
						</div>
					</div>
				</div>
			</div><br>
				
			<!--<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="gst1" id="gst1" placeholder="2T 1">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="gst2" id="gst2" placeholder="2T 2">
					    </div>
					</div>
				</div>

			</div><br>-->
			
			

			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
					    <div class="col-sm-8">
						    <input type="number" required class="form-control" name="dc2x" id="dc2x" placeholder="DC2X" title="DC2X" style="font-size: 25px;">
						</div>
					       	
						
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
					    <div class="col-sm-8">
						    <input type="number" required class="form-control" name="dc12" id="dc12" placeholder="DC12" title="DC12" style="font-size: 25px;">
						</div>	 
						   	
						
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="dc1x" id="dc1x" placeholder="DC1X" title="DC1X" style="font-size: 25px;">
						    
						    
						</div> 
					</div>
				</div>
			</div><br>
			<?php } ?>
			<!--Beisbol-->
			<?php if ($deporte == 2) { ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="g5to2" id="g5to2" placeholder="1eraM local" title="1eraM local" style="font-size: 25px;">
					    </div>	
					    
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="g5to1" id="g5to1" placeholder="1eraM visitante" title="1eraM visitante" style="font-size: 25px;">
					    </div>	
					    
					</div>
				</div>

			</div><br>

			<!--<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
					    <div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_srl2" id="v_srl2" placeholder="Valor SRL2">
						</div> 	
						
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="form-group">
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="srl2" id="srl2" placeholder="SRL 2">
						</div>    	
						
					 </div>
					
					
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_srl1" id="vsrl1" placeholder="Valor SRL1">
						</div>    	
						
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="srl1" id="srl1" placeholder="SRL 1">
						</div>    	
						
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="si" id="si" placeholder="Si" title="Si">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="no" id="no" placeholder="No" title="No">
					    </div>
					</div>
				</div>

			</div><br>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="ap2" id="ap2" placeholder="AP 2">
					    </div>	
					    
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="ap1" id="ap1" placeholder="AP 1">
					    </div>	
					    
					</div>
				</div>

			</div><br>

			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="bst2" id="bst2" placeholder="BST B">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_bst" id="v_bst" placeholder="Valor BST">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="bst1" id="bst1" placeholder="BST A">
						</div>    	
						
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="alta_5to" id="alta_5to" placeholder="1eraM A">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_alta_5to" id="v_alta_5to" placeholder="Valor 1eraM A">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="baja_5to" id="baja_5to" placeholder="1eraM B">
						</div>
					</div>
				</div>
			</div><br>-->
			<?php } ?>

			<!--BALONCESTO-->
			<?php if ($deporte == 3) { ?>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					    	
					    <div class="col-sm-8">
					      	<input type="number" required class="form-control" name="gmt2" id="gmt2" placeholder="MT local" title="MT local" style="font-size: 25px;">
					    </div>
				  	</div>
				</div>
				<div class="col-sm-6">

					<div class="form-group">
					    	
					    <div class="col-sm-8">
					        <input type="number" required class="form-control" name="gmt1" id="gmt1" placeholder="MT 1" title="MT visitante" style="font-size: 25px;">
					    </div>
					</div>
				</div>

			</div><br>
			
			<!--<div class="row">
				<div class="col-sm-4">
					
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="alta_mt" id="alta_mt" placeholder="A MT">
						</div>
					</div>
				</div>
				<div class="col-sm-4">

					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_alta_mt" id="v_alta_mt" placeholder="Valor A MT">
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="baja_mt" id="baja_mt" placeholder="B MT">
						</div>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="text" required class="form-control" name="v_runline_mt2" id="v_runline_mt2" placeholder="Valor RL MT2">
						</div>
					</div>
					
				</div>
				<div class="col-sm-3">
				
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="runline_mt2" id="runline_mt2" placeholder="RL MT2">
						</div>
					 </div>
					
					
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						   <input type="text" required class="form-control" name="v_runline_mt1" id="v_runline_mt1" placeholder="Valor RL MT1">
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
						    	
						<div class="col-sm-8">
						    <input type="number" required class="form-control" name="runline_mt1" id="runline_mt1" placeholder="RL MT1">
						    
						</div>
					</div>
				</div>
			</div><br>-->
			<?php } ?>



			
				
			
				  	
				  	
				  	
			
			
<br>
			
			<br>
			<div class="row">
				<div class="form-group">
				    <div class="col-sm-offset-4 col-sm-8">
				      	<button type="submit" class="btn btn-success">Crear Partido</button>
				    </div>
				</div>
			</div>	  		  	

				  
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
	<script src="../lib/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script>
		function bus_h(){
			var comp= document.getElementById('comp').value;
			var dep= document.getElementById('dep').value;
				var dataString = 'comp='+comp+"/"+dep;
				$.ajax({
					type: "POST",
					url: "buscar_compe.php",
					data: dataString,
					success: function(resp) {

						$("#comp").blur(function(){
							$('#suggestions').fadeOut();
						})
						if (resp !="") {
							$('#suggestions').fadeIn().html(resp);
						}

						if (resp =="") {
							$('#suggestions').fadeOut().html(resp);
						}

						$('.suggest-element a').on('click', function(){
							var id = $(this).attr('id');
							var competicion= $(this).attr('data-compe');
							$('#comp').val(competicion);
							$('#compe_selec').val(id);
							$('#suggestions').fadeOut();

							return false;
						});
					}
				});
		}


		

		//buscar equipo1

		function bus_h2(){
			var equipo= document.getElementById('equipo1').value;
			var dep= document.getElementById('dep').value;
				var dataString = 'equipo='+equipo+"/"+dep;
				$.ajax({
					type: "POST",
					url: "buscar_equipo1.php",
					data: dataString,
					success: function(resp) {
						$("#equipo1").blur(function(){
							$('#suggestions2').fadeOut();
						})
						if (resp !="") {
							$('#suggestions2').fadeIn().html(resp);
						}

						if (resp =="") {
							$('#suggestions2').fadeOut().html(resp);
						}
						$('.suggest-element2 a').on('click', function(){
							var id = $(this).attr('id');
							var equipo= $(this).attr('data-equipo');
							$('#equipo1').val(equipo);
							$('#equipo1_selec').val(id);
							$('#suggestions2').fadeOut(1000);

							return false;
						});
					}
				});
		}


		


		function bus_h3(){
			var equipo= document.getElementById('equipo2').value;
			var dep= document.getElementById('dep').value;
				var dataString = 'equipo='+equipo+"/"+dep;
				$.ajax({
					type: "POST",
					url: "buscar_equipo2.php",
					data: dataString,
					success: function(resp) {
						$("#equipo2").blur(function(){
							$('#suggestions3').fadeOut();
						})
						if (resp !="") {
							$('#suggestions3').fadeIn().html(resp);
						}

						if (resp =="") {
							$('#suggestions3').fadeOut().html(resp);
						}
						$('.suggest-element3 a').on('click', function(){
							var id = $(this).attr('id');
							var equipo= $(this).attr('data-equipo');
							$('#equipo2').val(equipo);
							$('#equipo2_selec').val(id);
							$('#suggestions3').fadeOut(1000);

							return false;
						});
					}
				});
		}


		

		$.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '< Ant',
			nextText: 'Sig >',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['es']);

        $("#fecha").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
		});

		$("#fecha_v").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
		});

	</script>

</body>
</html>