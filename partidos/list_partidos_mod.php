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
	<link rel="stylesheet" href="../lib/jquery-ui-1.12.1/jquery-ui.min.css">
	<link href="../js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
	
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
		<div class="container">
			<br><br><h4>Modificar partidos</h4><br>
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                	<thead>
                        <tr>
                            <th>Deporte</th>
                            <th>Liga</th>
                            <th>Partido</th>
                            <th>Fecha CO</th>
                            <th>Hora CO</th>
                            <th>Fecha ME</th>
                             <th>Fecha ME</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        
                        <?php 

                        	$sql_par="SELECT c.competicion, p.equipo1, p.equipo2, p.fecha, p.hora, p.fecha_v, p.hora_v, d.deporte,d.id as id_deporte, p.id FROM partidos p JOIN competiciones c ON c.id_competicion=p.id_competicion JOIN deportes d ON d.id=c.id_deporte WHERE p.inicio = 0 AND fecha >= '".date("Y-m-d")."'";
		                  	$rs_par=mysqli_query($mysqli,$sql_par) or die(mysqli_error($mysqli));

		                  	while ($row_par=mysqli_fetch_array($rs_par)) {
		                  		
		                  		$sql_local="SELECT equipo FROM equipos WHERE id='".$row_par["equipo2"]."'";

		                  		$rs_local=mysqli_query($mysqli,$sql_local) or die(mysqli_error($mysqli));

		                  		$row_local=mysqli_fetch_array($rs_local);

		                  		$sql_visitante="SELECT equipo FROM equipos WHERE id='".$row_par["equipo1"]."'";

		                  		$rs_visitante=mysqli_query($mysqli,$sql_visitante) or die(mysqli_error($mysqli));

		                  		$row_visitante=mysqli_fetch_array($rs_visitante);

		                  		echo'<tr class="odd gradeX">';
		                  		echo '<td>'.$row_par["deporte"].'</td>';
		                  		echo '<td>'.$row_par["competicion"].'</td>';
		                  		echo '<td><a href="modificar_partido.php?id_partido='.$row_par["id"].'&deporte='.$row_par["id_deporte"].'">'.$row_local["equipo"] .' VS '. $row_visitante["equipo"].'</a></td>';
		                  		echo '<td>'.$row_par["fecha"].'</td>';
		                  		echo '<td>'.$row_par["hora"].'</td>';
		                  		echo '<td>'.$row_par["fecha_v"].'</td>';
		                  		echo '<td>'.$row_par["hora_v"].'</td>';
		                  		echo '</tr>';

		                  	}
                             
                                            
                                         ?>
                                        
                                        </tr>
                                       
                                    </tbody>
                                </table>
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
	<script src="../lib/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script src="../js/dataTables/jquery.dataTables.js"></script>
    	<script src="../js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable({
                	"language": {
			            "lengthMenu": "Display _MENU_ registros por página",
			            "zeroRecords": "Nada encontrado, lo siento",
			            "info": "Mostrando página _PAGE_ de _PAGES_",
			            "infoEmpty": "No hay registros disponibles",
			            "infoFiltered": "(filtrado de _MAX_ registros en total )",
			            "search": "Buscar&nbsp;:",
			             paginate: {
				            first:"Primero",
				            previous:"Anterior",
				            next:"Siguiente",
				            last:"Último"
				        }
        			}
                });
            });

            $(".eliminar").click(function(e){

	            e.preventDefault();
	            var cod= $(this).attr('data-codigo');
	            if (confirm("¿Seguro que desea eliminar este colegio")) {
	                window.location="php/eliminar_colegio.php?codigo="+cod
	            }

        	})
    </script>

</body>
</html>