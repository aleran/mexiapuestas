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
	<title>Agentes .:mexiapuestas.com</title>
	
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
			if ($_SESSION["pais"] ==1) {
			 	include "template/header2.html";
			}else {
				include "template/header3.html";
			}
			
		?>
		
		<!-- menu -->
		<?php 
			include "template/menu_agencias_l.php";
		?>
		<!-- mostrar usuario o agencia -->
		<?php 
			include "template/barra_usuario.php";
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>
			<div class="row">

				 <h3><center><b>Sorteos para Evaluar:</b></center></h3><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Sorteo</th>
                                <th>Fecha</th>
                            </thead>
                            <tbody>
                                
                    
                    <?php               
                        
                            $sql_sorteos="SELECT n.sorteo, n.dia, n.hora, s.fecha, s.id FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE s.inicio='1' AND s.eval='0'";
            
                        
                        $rs_sorteos=mysqli_query($mysqli, $sql_sorteos) or die(mysqli_error());
                        while ($row_sorteos=mysqli_fetch_array($rs_sorteos)) {


                                list($a3,$m3,$d3) = explode("-", $row_sorteos["fecha"]);
                                $fecha=$d3."/".$m3."/".$a3;
                                echo"<tr>";
                                       echo"<td>";
                                        echo "<a href='eval_sorteo.php?sorteo=".$row_sorteos["id"]."'>".$row_sorteos["sorteo"]."</a>";
                                    echo"</td>";
                                    echo"<td>";
                                        echo "<a href='eval_sorteo.php?sorteo=".$row_sorteos["id"]."'>".$fecha."</a>";
                                    echo"</td>";
                                echo"</tr>";

                        }

                    ?>
                            
                                
                            </tbody>
                        </table>
                    </div>
                
            
                <br>

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


