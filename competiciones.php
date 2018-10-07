<?php
	session_start();  
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="theme-color" content="#008000">
	<!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#008000">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>.:Competiciones:.</title>
	
	<!--Fuentes-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="css/estilos_menu.css">
	
	<!--Fuentes-->
	<style>
    .top{
        color:#07A407;
    }
    </style>
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
			include("conexion/conexion.php");
			
			if(isset($_SESSION["tipo"])) {

                if ($_SESSION["tipo"]=="normal"){
                   include "template/menu_normal.php";
                 }
                else {
                  include "template/menu_agencias.php";
                } 
        
            }
            else{
                include "template/menu_solo.php";
            }
			
		?>
		<!-- mostrar usuario o agencia -->
		<?php
			if (isset($_SESSION["tipo"])) {
				include "template/barra_usuario.php";
			}
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>
			<?php 
                  if (isset($_SESSION["pais"])) {
                        if ($_SESSION["pais"] != 3) {

                            echo '<center>Tipo de Apuesta: <a href="competiciones.php" class="btn btn-primary">Combinada</a>';
                        
                        
                            
                            echo '<a href="competiciones2.php" class="btn btn-info">Directa</a></center>';
                        }
                            
                        
                    }

                    else {
                        echo '<center>Tipo de Apuesta: <a href="competiciones.php?pais='.$_GET["pais"].'" class="btn btn-primary">Parlay</a>';

                        if($_GET["pais"] != 3) {
                            echo '<a href="competiciones2.php?pais='.$_GET["pais"].'" class="btn btn-info">Directa</a></center>';
                        }
                    }

            ?>

             <?php
                    $sql_np2="SELECT count(id) as partidos FROM partidos WHERE fecha='".date("Y-m-d")."' AND inicio=0";
                    $rs_np2=mysqli_query($mysqli,$sql_np2) or die(mysqli_error());
                    $num_np2=mysqli_fetch_array($rs_np2);
                    
            ?>
             <center>
                    <h4 style="color:#FF8500;">Combinada</h4>
                    <form action="partidos_hoy.php" method="POST">
                        <input type="hidden" name="pais" value="<?php echo $_GET["pais"]; ?>">
                        <button class='btn btn-success'>PARTIDOS DE HOY (<?php echo $num_np2["partidos"] ?>)</button>
                    </form>
            </center>
                
            <div class="row">
                <?php
                    if (isset($_SESSION["pais"])) {
                        echo '<form id="form" action="compe_selec.php" method="POST">';
                    }
                    else {
                        echo '<form id="form" action="compe_selec.php?pais='.$_GET["pais"].'" method="POST">';
                    }
                    $sql="SELECT id, deporte FROM deportes WHERE activo='1'";
                    $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());
                          
                    while($row=mysqli_fetch_array($rs)) {
                        echo '<div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-striped">    
                                <thead>
                                    <th>'.$row['deporte'].'</th>
                                </thead>';
                                echo '<tbody>';

                    	$id_dep=$row["id"];
                    	$sql2="SELECT * FROM competiciones WHERE id_deporte=$id_dep AND activa=1 ORDER BY top DESC, id_competicion";
                    	$rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                    	    
                    	while($row2=mysqli_fetch_array($rs2)) {
                    		$sql_np="SELECT id FROM partidos WHERE id_competicion='".$row2["id_competicion"]."' AND fecha >='".date("Y-m-d")."' AND inicio=0";
                            $rs_np=mysqli_query($mysqli,$sql_np) or die(mysqli_error());
                            $num_np=mysqli_num_rows($rs_np);
                        	echo '<tr><td>';
                        	echo '<input type="checkbox" name="competicion[]" value="'.$row2["id_competicion"].'"> ';
                            if ($row2["top"]==1) {
                                 echo "<span class='top'><b>".$row2["competicion"]." (".$num_np.")</b><span>";
                            }
                            else{
                                echo $row2["competicion"]." <b>(".$num_np.")</b>";
                            }
                        	
                        	echo '</td></tr>';
                    	}
                    	echo  '</tbody>';
                		echo '</table>';
            			echo '</div>';
            			echo '</div>';
        			}
                                     
        		?>
                           
            </div>
            <div class="row">
            	<center><button class="btn btn-warning">Continuar</button></center><br>
            </form>
            </div>
            
			
		</div>
		<?php 
			include "template/modal_registro.php";
		?>
	</div>
	
	<script src="js/hora.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<?php if(isset($_SESSION["tipo"])) { ?>
        <script src="js/main.js"></script>
    <?php } ?>
	<script src="js/validacion_registro.js"></script>

</body>
</html>


