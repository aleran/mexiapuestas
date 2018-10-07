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
	<title>Agentes .:mexiapuestas.com</title>
	
	<!--Fuentes-->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="../css/estilos_menu.css">
	
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
		<div class="container-fluid">
			<br>
			<div class="row">

				<div class="col-sm-8 col-sm-offset-3">
					<h3>Seleccione el deporte para crear partido</h3><br>
					<form class="form-horizontal" action="crear_partidos.php" method="POST">
						<div class="form-group">
						    <label for="deporte" class="col-sm-2 control-label">Deporte</label>
						    <div class="col-sm-4">
						    	<select name="deporte" id="deporte" class="form-control">
							    	<?php
							    		$sql_deportes="SELECT * FROM deportes";
							    		$rs_deportes=mysqli_query($mysqli, $sql_deportes) or die(mysqli_error());
							    		while ($row_deportes=mysqli_fetch_array($rs_deportes)) {

							    			echo '<option value="'.$row_deportes["id"].'">'.$row_deportes["deporte"].'</option>';
							    		}
							    	?>
						    	</select>
						    </div>
						 </div>
						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						    	<button type="submit" class="btn btn-primary">Seleccionar</button>
						    </div>
						</div>
					</form>
				</div>

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


