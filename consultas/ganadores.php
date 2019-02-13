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
		if ($_SESSION["tipo"]=="normal") {
            include "../template/menu_normal.php";
        }
        else {
            include "../template/menu_agencias.php";
        } 
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
                    <?php

                         if (isset($_POST["desde"])) {
                             $desde=$_POST["desde"];
                             $hasta=$_POST["hasta"];
                         } 
                         else {
                             $desde=$_GET["desde"];
                             $hasta=$_GET["hasta"];
                         } 

                        list($a,$m,$d) = explode("-", $desde);
                        $de=$d."/".$m."/".$a;
                         list($a2,$m2,$d2) = explode("-", $hasta);
                        $a=$d2."/".$m2."/".$a2;

                    ?>
                    <h3> Tickets Ganadores  Del: <?php echo $de; ?> Al: <?php echo $a; ?></h3>
                	<div class="table-responsive">
                		<table class="table table-striped">
	                		<thead>
	                            <th>Codigo</th>
	                            <th>Apuesta</th>
	                            <th>Fecha - Hora</th>
	                            <th>Apostado</th>
	                            <th>Ganancia</th>
	                        </thead>
	                        <tbody>
	                        	
                	
	                <?php
                       
	                	if ($_SESSION["tipo"]=="root") {
	                		if ($_SESSION['usuario']=="123456") {

	                		$sql_act="SELECT p.* FROM parlay p JOIN agencias a ON p.agencia=a.id WHERE activo='1' AND ganar='1' AND a.pais !=2 AND (fecha BETWEEN '".$desde."' AND '".$hasta."')";
	                		}else{

	                			$sql_act="SELECT * FROM parlay  WHERE activo='1' AND ganar='1' AND (fecha BETWEEN '".$desde."' AND '".$hasta."')";
	                		}
	                	}
	                	else {
	                		$sql_act="SELECT * FROM parlay WHERE activo='1' AND ganar='1' AND agencia='".$_SESSION["agencia"]."'AND (fecha BETWEEN '".$desde."' AND '".$hasta."')";
	                	}
	                    
	                    $rs_act=mysqli_query($mysqli, $sql_act) or die(mysqli_error());
	                    while ($row_act=mysqli_fetch_array($rs_act)) {
	                    		list($a3,$m3,$d3) = explode("-", $row_act["fecha"]);
                                $fecha=$d3."/".$m3."/".$a3;
	                    		echo"<tr>";
	                    			echo"<td>";
	                    				echo "<a href='con_p_g.php?codigo=".$row_act["codigo"]."&desde=".$desde."&hasta=".$hasta."'>".$row_act["codigo"]."</a>";
	                    			echo"</td>";
	                    			echo"<td>";
	                    				echo $row_act["tipo"];
	                    			echo"</td>";
	                    			echo"<td>";
	                    				echo $fecha ." - ". $row_act["hora"];
	                    			echo"</td>";
	                    			echo"<td>";
	                    				echo $row_act["monto"];
	                    			echo"</td>";
	                    			echo"<td>";
	                    				echo $row_act["premio"];
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