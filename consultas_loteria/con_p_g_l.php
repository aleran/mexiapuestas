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
		#ganador{
			position: absolute;
			margin-top: -510;
			margin-left: 35;
			z-index: 100;
			color:#2FB209;
			font-size: 40px;
			-webkit-transform: rotate(-40deg);
    		transform: rotate(-40deg);
		}
		#perdedor{
			position: absolute;
			margin-top: -510;
			margin-left: 35;
			z-index: 100;
			color:#E61423;
			font-size: 40px;
			-webkit-transform: rotate(-40deg);
    		transform: rotate(-40deg);
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
			if ($_SESSION["tipo"]=="normal") {
				include "../template/menu_normal_l.php";
			}
			else {
				include "../template/menu_agencias_l.php";
			}
			
		?>
		<!-- mostrar usuario o agencia -->
		<?php 
			include "../template/barra_usuario.php";
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>
			<div class="row">
                   <div class="col-sm-6 col-xs-offset-1">
                    <?php

                        if ($_SESSION["tipo"]=="root") {

                            if (isset($_GET["codigo"])) {
                                $codigo=$_GET["codigo"];
                            }
                            else if (isset($_POST["codigo"])) {
                                $codigo=$_POST["codigo"];
                            }
                        }
                        else {

                            if (isset($_GET["codigo"])) {
                                $codigo=$_GET["codigo"];
                            }
                            else if (isset($_POST["codigo"])) {
                                $codigo=$_SESSION["agencia"]."-".$_POST["codigo"];
                            }
                        }

                        include "../reutilizable/modelo_ticket_loteria.php";

                        echo "</div><br>";
                        if ($row_ticket["ganar"]==1) {
                            echo "<span id='ganador'>GANADOR<span>";
                        }
                        else if ($row_ticket["ganar"]==0) {
                            echo "<span id='perdedor'>PERDEDOR</strong><span>";
                        }

                    ?>
                     <br>
                </div>
                <div class="col"></div>

             
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