<?php
	include("conexion/conexion.php");
	include("sesiones/time_sesion.php");

	
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="theme-color" content="#008000">
	<!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#008000">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>.:Bienvenido:.</title>
	
	<!--Fuentes-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="css/estilos_menu.css">
	
	<!--Fuentes-->
	
</head>
 <!-- Fecha Sistema -->
    
	<div style="float:right;">
		<script src="js/fecha.js"></script>
	</div>
	  <!-- Fecha Sistema -->
	    
	      <!-- Hora Sistema (24H) -->

	

	<div id="reloj" style="font-size:14px;"></div>

	

  	<!-- Hora Sistema (24H) -->
<!--Contenido Sistema-->

<body>
	 <!-- mensaje arriba -->
	<?php 
		include "template/mensaje_top.html";
	?>
	
	<div class="content">
		
		<!-- header -->
		<?php 
			include "template/header2.html";
		?>
	
		<!-- menu -->
		<?php 
			if ($_SESSION["tipo"]=="normal") {
				include "template/menu_normal.php";
			}
			else {
				include "template/menu_agencias.php";
			}
			
		?>
		<!-- mostrar usuario o agencia -->
		<?php 
			include "template/barra_usuario.php";
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-3">
					<h2>Bienvenido, Comienza a Jugar<br></h2>
					
					<?php 
		                if ($_SESSION["tipo"]=="normal") {
		                $sql_sal="SELECT saldo FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
		                $rs_sal=mysqli_query($mysqli,$sql_sal) or die(mysqli_error());
		                $row_sal=mysqli_fetch_array($rs_sal);
		                echo "<h3><b>Saldo disponible: $,</b> ". $row_sal["saldo"]."</h3>";
                		}
            		?>
				</div>
			</div>
			<?php if ($_SESSION["pais"]!='2') {?>
			<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
					<h2 style="color: #FB7210;">NUEVO!! JUEGA TU CHANCE</h2>
					<?php 
						if ($_SESSION["pais"]==1) {
							
							$sql_sd="SELECT n.sorteo,s.id FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE s.fecha='".date("Y-m-d")."' AND n.id=1 ";
			                $rs_sd=mysqli_query($mysqli,$sql_sd) or die(mysqli_error());
			                $row_sd=mysqli_fetch_array($rs_sd);

			                echo'<a  href="loteria.php?sorteo='.$row_sd["id"].'" class="btn btn-primary">Caribeña Noche (Diario)</a>';

						}
						
					?>
					
						
					<?php 
						if ($_SESSION["pais"]==1) {
							function saber_dia($nombredia) {
								  $mysqli = new MySQLi("localhost","u146230243_mexia","Mexi123#$","u146230243_mexia");

							    if (!$mysqli) die ("Error al conectar con el servidor -> ".mysqli_error());
							    mysqli_query ($mysqli,"SET NAMES 'utf8'");
    

							$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');

							$fecha = $dias[date('N', strtotime($nombredia))];

								$sql_sorteo="SELECT n.sorteo,n.dia,n.hora, s.id, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE dia='".$fecha."' AND s.fecha='".date("Y-m-d")."' AND n.pais='".$_SESSION["pais"]."'";
				                $rs_sorteo=mysqli_query($mysqli,$sql_sorteo) or die(mysqli_error());
				                $row_sorteo=mysqli_fetch_array($rs_sorteo);

								if ($fecha == $row_sorteo["dia"] && $row_sorteo["dia"] !='') {			

									echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-danger">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
								}
							

							}
							
						// ejecutamos la función pasándole la fecha que queremos

							saber_dia(date("Y-m-d"));
						}else{
							if ($_SESSION["tipo"]=="admin") {
								
								if (date("H:i:s") < "19:30:00" && date("H:i:s") > "05:59:00") {

									$sql_ac="UPDATE usuarios SET activo_chance='1' WHERE cedula='".$_SESSION["usuario"]."'";

				           			$rs_ac=mysqli_query($mysqli,$sql_ac) or die(mysqli_error());


								}

							}
							
							$sql_ac="SELECT u.activo_chance FROM usuarios u JOIN agencias a ON u.agencia=a.id WHERE a.agencia_padre='26' AND u.cedula='".$_SESSION["usuario"]."'";
				            $rs_ac=mysqli_query($mysqli,$sql_ac) or die(mysqli_error());
				            $row_ac=mysqli_fetch_array($rs_ac);

				            if ($_SESSION["tipo"]=="admin") {
				            	
				            	if ($row_ac["activo_chance"]==1) {
				            		
				            		$sql_sorteo="SELECT n.sorteo,n.dia, n.id as nid, n.hora, s.id, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE inicio=0 AND n.pais=3";
				            $rs_sorteo=mysqli_query($mysqli,$sql_sorteo) or die(mysqli_error());
				             

				            while ($row_sorteo=mysqli_fetch_array($rs_sorteo)) {

				            	$sql="SELECT n.sorteo, n.dia, n.hora, s.id, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE s.id='".$row_sorteo["id"]."'";
								$rs=mysqli_query($mysqli, $sql);
								$row=mysqli_fetch_array($rs);
								$num=mysqli_num_rows($rs);

			 					$mod_date = strtotime($row["hora"]."- 30 minute");
		                        $fecha_suma= date("H:i:s",$mod_date);

                        
								if (date("Y-m-d H:i:s") > $row["fecha"]." ".$fecha_suma ) {

									$sql_as="UPDATE sorteos SET inicio=1 WHERE id='".$row_sorteo["id"]."'";
									$rs_as=mysqli_query($mysqli, $sql_as);
									
									
									
								}
		
								function saber_dia($nombredia) {
								
										$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');

										return $fecha = $dias[date('N', strtotime($nombredia))];
										
										
										
				            	
				            	}
				            		

				            		if ($row_sorteo["nid"]==8){
											
										if (saber_dia(date("Y-m-d")) == "Martes") {

											if (date("H:i:s")<"19:30:00") {
												
												echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-primary">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a> ';

											}
											
										}else {

											if(saber_dia(date("Y-m-d")) !="Viernes") {
												if ($_SESSION["tipo"]=="admin") {

													echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
												}else{
													if(saber_dia(date("Y-m-d")) =="Sabado"){
														if (date("H:i:s")>"05:59:00") {

															echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';

														}


													}else{
															echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
													}
												}

											}else{

												if ($_SESSION["tipo"]!="admin") {
													if (date("H:i:s")>"19:30:00") {

														echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
													}
												}
											}
										}
										
									}else{

										if (saber_dia(date("Y-m-d")) == "Viernes") {


											if (date("H:i:s")<"19:30:00") {
													
												echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';

											}

										}else  {
											if(saber_dia(date("Y-m-d")) !="Martes") {
												if ($_SESSION["tipo"]=="admin") {

													echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
												}else{
													if(saber_dia(date("Y-m-d")) =="Mircoles"){
														if (date("H:i:s")>"05:59:00") {

															echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';

														}


													}else{
															echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
													}
												}

											}else{

												if ($_SESSION["tipo"]!="admin") {
													if (date("H:i:s")>"19:30:00") {

														echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
													}
												}
											}
										}
											
									}
							}

				            	}
				            }else{
				            	$sql_sorteo="SELECT n.sorteo,n.dia, n.id as nid, n.hora, s.id, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE inicio=0 AND n.pais=3";
				            $rs_sorteo=mysqli_query($mysqli,$sql_sorteo) or die(mysqli_error());
				             

				            while ($row_sorteo=mysqli_fetch_array($rs_sorteo)) {

				            	$sql="SELECT n.sorteo, n.dia, n.hora, s.id, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE s.id='".$row_sorteo["id"]."'";
								$rs=mysqli_query($mysqli, $sql);
								$row=mysqli_fetch_array($rs);
								$num=mysqli_num_rows($rs);

			 					$mod_date = strtotime($row["hora"]."- 30 minute");
		                        $fecha_suma= date("H:i:s",$mod_date);

                        
								if (date("Y-m-d H:i:s") > $row["fecha"]." ".$fecha_suma ) {

									$sql_as="UPDATE sorteos SET inicio=1 WHERE id='".$row_sorteo["id"]."'";
									$rs_as=mysqli_query($mysqli, $sql_as);
									
									
									
								}
		
								function saber_dia($nombredia) {
								
										$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');

										return $fecha = $dias[date('N', strtotime($nombredia))];
										
										
										
				            	
				            	}
				            		

				            		if ($row_sorteo["nid"]==8){
											
										if (saber_dia(date("Y-m-d")) == "Martes") {

											if (date("H:i:s")<"19:30:00") {
												
												echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-primary">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a> ';

											}
											
										}else {

											if(saber_dia(date("Y-m-d")) !="Viernes") {
												if ($_SESSION["tipo"]=="admin") {

													echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
												}else{
													if(saber_dia(date("Y-m-d")) =="Sabado"){
														if (date("H:i:s")>"05:59:00") {

															echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';

														}


													}else{
															echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
													}
												}

											}else{

												if ($_SESSION["tipo"]!="admin") {
													if (date("H:i:s")>"19:30:00") {

														echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
													}
												}
											}
										}
										
									}else{

										if (saber_dia(date("Y-m-d")) == "Viernes") {


											if (date("H:i:s")<"19:30:00") {
													
												echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';

											}

										}else  {
											if(saber_dia(date("Y-m-d")) !="Martes") {
												if ($_SESSION["tipo"]=="admin") {

													echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
												}else{
													if(saber_dia(date("Y-m-d")) =="Mircoles"){
														if (date("H:i:s")>"05:59:00") {

															echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';

														}


													}else{
															echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
													}
												}

											}else{

												if ($_SESSION["tipo"]!="admin") {
													if (date("H:i:s")>"19:30:00") {

														echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-success">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
													}
												}
											}
										}
											
									}
							}
				            }

							
							
						}
						
						?>
						<?php if ($_SESSION["pais"]==1) { ?>
							<br><br>
							<p style="font-size: 18px;">Con 4 cifras gana $4.500 por cada peso apostado</p>
							<p style="font-size: 18px;">Con 3 cifras gana $400 por cada peso apostado</p>
							<p style="font-size: 18px;">Con 2 cifras gana $50 por cada peso apostado</p>
							<h4><a href="https://resultadodelaloteria.com/colombia/" target="_blank">Ver Resultados</a></h4>
						<?php }else{ ?>
							<br><br>
							<p style="font-size: 18px;">Boleto con 2 cifras por $150 ganas $10.000</p>
						<?php } ?>
						

					
					<!--<button class="btn btn-danger">Lotería de Cundinamarca (Lunes)</button>
					<button class="btn btn-danger">Lotería del Huila (Martes)</button>
					<button class="btn btn-danger">Lotería del Manizales (Miercoles)</button>
					<button class="btn btn-danger">Lotería de Bogotá (Jueves)</button>
					<button class="btn btn-danger">Lotería de Medellin (Viernes)</button>-->
					
				</div>
			</div>
				<?php } ?>
			
		</div>
		<?php 
			include "template/modal_registro.php";
		?>
		
	
		<!--modal-->
	<div id="myModal" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                
	                <h4 class="modal-title"><center><b>Anuncio!!</b></center></h4>
	            </div>
	            <div class="modal-body">
	                <p>Comenzaron las temporadas de Baloncesto: NBA, Hockey: NHL y Futbol Americano: NFL.<br> <center>Animate a apostar</center></p><br>
	                
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-success" id="continuar" data-dismiss="modal" Title="">Cerrar</button>
	            </div>
	        </div>
	    </div>
	</div>
	
	<script src="js/hora.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/validacion_registro.js"></script>
	<!--<script>
	 $(document).ready(function(){javascript:void(0)
		$("#myModal").modal("show");
	  });
	</script>-->

</body>
</html>