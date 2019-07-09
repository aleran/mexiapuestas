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
	<title>.:Agente:.</title>
	
	<!--Fuentes-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="css/estilos_menu.css">
	<link rel="stylesheet" href="lib/jquery-ui-1.12.1/jquery-ui.min.css">
	
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
			if ($_SESSION["pais"] ==1) {
			 	include "template/header2.html";
			}else {
				include "template/header3.html";
			}
			
		?>
		
		<!-- menu -->
		<?php 
			if ($_SESSION["tipo"]=="normal") {
				include "template/menu_normal_l.php";
			}
			else {
				include "template/menu_agencias_l.php";
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
               
                    <div class="col-sm-6 col-xs-offset-2">
                		<center><h3>Seleccione sorteo</h3></center><br>
	                	 <form class="form-horizontal" method="POST" action="num_vendidos.php">
                    
                            <div class="form-group">
	                            <label for="sorteo" class="col-sm-4 control-label">Sorteo:</label>
	                            <div class="col-sm-6">
	                            	<select  name="sorteo" id="sorteo" class="form-control" required>
										<option value="">Seleccione</option>
	                            	<?php

	                            		if ($_SESSION["tipo"]=="root") {
	                            		 	
	                            			$sql_agencias="SELECT s.id, s.fecha, n.sorteo FROM sorteos s JOIN nombre_sorteos n ON n.id=s.nombre_sorteo ORDER BY s.id DESC LIMIT 10";

	                            		 }else{
	                            		 	$sql_agencias="SELECT s.id, s.fecha, n.sorteo FROM sorteos s JOIN nombre_sorteos n ON n.id=s.nombre_sorteo WHERE n.pais='".$_SESSION["pais"]."' ORDER BY s.id DESC LIMIT 6";
	                            		 } 
	                                	
	                                	$rs_agencias=mysqli_query($mysqli,$sql_agencias) or die(mysqli_error());
	                                	while ($row_agencias=mysqli_fetch_array($rs_agencias)) {
	                                    	echo  '<option value='.$row_agencias["id"].'>'.$row_agencias["sorteo"].' '.''.$row_agencias["fecha"].'</option>';
	                                    }
	                                ?>
	                                </select>
	                            </div>
                                     
                            </div>
                                    
							<br><center><button class="btn btn-primary">Siguiente</button></center><br><br>
                            

                        </form>
                	
	                
                </div>
            </div>
			
		</div>
		<?php 
			include "template/modal_registro.php";
		?>
	</div>
	
	<script src="js/hora.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/validacion_registro.js"></script>

</body>
</html>