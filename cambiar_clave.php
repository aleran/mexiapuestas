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
	<title>.:Agentes:.</title>
	
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
		if ($_SESSION["tipo"]=="normal") {
			include "template/menu_normal.php";
		}
		else {
			include "template/menu_agencias.php";
		}
	?>

	<div class="content">
		<!-- mostrar usuario o agencia -->
		<?php 
			include "template/barra_usuario.php";
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>
			<div class="row">
               
                    <div class="col-sm-6 col-xs-offset-2">
                		<center><h3>Cambiar Clave:</h3><br></center>
	                	 <form class="form-horizontal" method="POST" action="cambio_clave.php" name="cambio">

                            <div class="form-group">
                                <label for="clave_a" class="col-sm-4 control-label">Clave Actual:</label>
                                <div class="col-sm-6">
                                    <input type="password"  name="clave_a" id="clave_a" class="form-control" autocomplete="off" required="">
                                    	
                                </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="clave" class="col-sm-4 control-label">Clave Nueva:</label>
                                <div class="col-sm-6">
                                    <input type="password"  name="clave" id="clave" class="form-control" autocomplete="off" required="">
                                    	
                                </div>
                                 
                            </div>

                            <div class="form-group">
                                <label for="clave2" class="col-sm-4 control-label">Confirmar Clave Nueva:</label>
                                <div class="col-sm-6">
                                    <input type="password"  name="clave2" id="clave2" class="form-control" autocomplete="off" required="">
                                    	
                                </div><br><br>
                                <div class="col-sm-6 col-sm-offset-5">
                                 	<button class="btn btn-success">Cambiar Clave</button>
                                </div>
                            </div>
                            

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


