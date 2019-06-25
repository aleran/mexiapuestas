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
	<title>.:Chance:.</title>
	
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
			<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
					<h2 style="color: #FB7210;">NUEVO!! JUEGA TU CHANCE</h2>
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

							$sql_sorteo="SELECT n.sorteo,n.dia,n.hora, s.id, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE inicio=0 AND n.pais=3";
				            $rs_sorteo=mysqli_query($mysqli,$sql_sorteo) or die(mysqli_error());
				             

				            while ($row_sorteo=mysqli_fetch_array($rs_sorteo)) {

				            	$sql="SELECT n.sorteo, n.dia, n.hora, s.id, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE s.id='".$row_sorteo["id"]."'";
								$rs=mysqli_query($mysqli, $sql);
								$row=mysqli_fetch_array($rs);
								$num=mysqli_num_rows($rs);

			 					$mod_date = strtotime($row["hora"]."- 1 hour");
		                        $fecha_suma= date("H:i:s",$mod_date);

                        
								if (date("Y-m-d H:i:s") > $row["fecha"]." ".$fecha_suma ) {

									$sql_as="UPDATE sorteos SET inicio=1 WHERE id='".$row_sorteo["id"]."'";
									$rs_as=mysqli_query($mysqli, $sql_as);
									
									
									
								}
		

				            	echo '<a href="loteria.php?sorteo='.$row_sorteo["id"].'" class="btn btn-danger">'.$row_sorteo["sorteo"].' ('.$row_sorteo["dia"].')</a>';
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
			
		</div>
		<?php 
			include "template/modal_registro.php";
		?>
		
	
	
	<script src="js/hora.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/validacion_registro.js"></script>

</body>
</html>


