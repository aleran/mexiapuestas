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

				 <h3><center><b>Partidos para Evaluar:</b></center></h3><br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Liga</th>
                                <th>Partido</th>
                                <th>Fecha - Hora</th>
                            </thead>
                            <tbody>
                                
                    
                    <?php               
                        
                            $sql_partidos="SELECT id, id_competicion, equipo1, equipo2, fecha, hora FROM partidos WHERE inicio='1' AND eval='0' ORDER BY fecha, hora ASC";
            
                        
                        $rs_partidos=mysqli_query($mysqli, $sql_partidos) or die(mysqli_error());
                        while ($row_partidos=mysqli_fetch_array($rs_partidos)) {

                            $sql_compe="SELECT competicion FROM competiciones WHERE id_competicion=$row_partidos[id_competicion]";
                            $rs_compe=mysqli_query($mysqli, $sql_compe) or die (mysqli_error());
                            $row_compe=mysqli_fetch_array($rs_compe);

                            $sql_eq1="SELECT id, equipo FROM equipos WHERE id=$row_partidos[equipo1]";
                            $rs_eq1=mysqli_query($mysqli, $sql_eq1) or die (mysqli_error());
                            $row_eq1=mysqli_fetch_array($rs_eq1);

                            $sql_eq2="SELECT id, equipo FROM equipos WHERE id=$row_partidos[equipo2]";
                            $rs_eq2=mysqli_query($mysqli, $sql_eq2) or die (mysqli_error());
                            $row_eq2=mysqli_fetch_array($rs_eq2);

                                list($a3,$m3,$d3) = explode("-", $row_partidos["fecha"]);
                                $fecha=$d3."/".$m3."/".$a3;
                                echo"<tr>";
                                     echo"<td>";
                                        echo $row_compe["competicion"];
                                    echo"</td>";
                                    echo"<td>";
                                        echo "<a href='eval_partidos.php?partido=".$row_partidos["id"]."'>".$row_eq1["equipo"]." VS ".$row_eq2["equipo"]." </a>";
                                    echo"</td>";
                                    echo"<td>";
                                        echo $fecha ." - ". $row_partidos["hora"];
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


