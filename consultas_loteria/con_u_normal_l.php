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

                        include "../reutilizable/modelo_ticket_loteria2.php";

                         echo "</div><br>";
                            if ($_SESSION["tipo"]=="root") {
                                if ($row_ticket["push"]=="") {
                                    echo "<form action='push.php' method='POST' class='hidden-print'>";
                                    echo "*PUSH*: ";
                                    echo "<textarea name='push' id=''></textarea><br>";
                                
                                    echo "Ganancia con *PUSH*: ";
                                    echo "<input type='number' name='premio' >";
                                    echo "<input type='hidden' name='codigo' value='".$row_ticket["codigo"]."'>";
                                    echo "<input type='hidden' name='desde' value='".$_GET["desde"]."'><br>";
                                    echo "<input type='hidden'name='hasta'  value='".$_GET["hasta"]."'><br>";
                                    echo "<button>PUSH</button></form><br>";

                                }
                                else {

                                    echo "*PUSH*: ".$row_ticket["push"]."<br><br>";
                                }
                                
                            }
                            else {
                                if ($row_ticket["push"]!="") {
                                    echo "*PUSH*: ".$row_ticket["push"]."<br><br>";
                                }
                            }
                            

                    ?>
                     
                </div>
                
				<div class="col-sm-10 col-xs-offset-2">
	            	<?php 
	            	echo "<button class='btn btn-primary hidden-print' id='imprimir' type='button'>Imprimir</button><br><br>";


		                if ($row_ticket["ganar"]=='1') {
		                    echo "<h3>Ganador</h3>";

		                }
		               	else if ($row_ticket["ganar"]=='3') {

		                   	if ($_SESSION["tipo"]=="root") {
		                    	echo '<a href="#" id="ganar" class="btn btn-success hidden-print">Ticket Ganador</a> ';
		                    	echo '<a href="#" id="perder" class="btn btn-warning hidden-print">Ticket Perdedor</a><br>';
		                   	}
		               	}
		               	else {
		                   	echo "<h3>Perdedeor</h3>";
		               	} 
		            ?><br>
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