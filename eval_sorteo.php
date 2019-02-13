<?php
    include("conexion/conexion.php");
	include("sesiones/time_sesion.php");  
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Agentes .:mexiapuestas.net</title>
	
	<!--Fuentes-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="css/estilos_menu.css">
	
	<!--Fuentes-->
	<style>
	    hr {
		   height: 1px;
		   border: 0;
		   color: #E40505;
		   background-color: #078E00;
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

			<?php 
        			$sql_sorteo="SELECT * FROM sorteos WHERE id='".$_GET["sorteo"]."'";
        			$rs_sorteo=mysqli_query($mysqli, $sql_sorteo) or die(mysqli_error());
        			$row_sorteo=mysqli_fetch_array($rs_sorteo);

        			list($a3,$m3,$d3) = explode("-", $row_sorteo["fecha"]);
        			$fecha=$d3."/".$m3."/".$a3;

					echo "<h3>Sorteo del: ".$fecha."</h3>"
        		?>

			<div class="row">

				<form name="sorteo" class="form-horizontal" method="POST" action="evaluado_l.php">
                    
					<input type="hidden" name="id_sorteo" value="<?php echo $row_sorteo["id"] ?>">
                    <br><br>
                  
                    <div class="col-sm-6 col-sm-offset-3">
                       <div class="form-group">
                            <label for="r_sorteo" class="control-label">Resultado del sorteo:</label>
                               <input name="r_sorteo" id="r_sorteo" type="number" class="form-control">
                        </div>
                    </div> 
                    <br><center><button class="btn btn-success">Evaluar</button></center><br>
                        
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
	<script src="js/main.js"></script>
	<script src="js/validacion_registro.js"></script>
	<script>

		var formul = document.sorteo,
        validar = function validar(e){

        	var nombre=$('#r_sorteo').val();

           if (nombre.length > 4){
                alert("Debe introducir 4 números");
                e.preventDefault();
            }
            else if (nombre.length < 4) {
            	alert("Debe introducir 4 números");
            	e.preventDefault();
            }
         
        }
     formul.addEventListener("submit", validar)
	</script>

</body>
</html>


