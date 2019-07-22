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
	<title>.:Saldos:.</title>
	
	<!--Fuentes-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="css/estilos_menu.css">
	<link rel="stylesheet" href="lib/jquery-ui-1.12.1/jquery-ui.min.css">
	
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
                include "template/menu_normal.php";
            }
            else {
                include "template/menu_agencias.php";
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
               		<center><h4>Por agencia</h4></center>
                    <div class="col-sm-6 col-xs-offset-2">
                	
	                	 <form class="form-horizontal" method="POST" action="saldo_agencia.php">
                            <?php
                                if ($_SESSION["tipo"]=="root" || $_SESSION['usuario']=="112244555") {
                                    echo '<div class="form-group">
                                    <label for="agencia" class="col-sm-4 control-label">Agencia:</label>
                                    <div class="col-sm-6">
                                        <select  name="agencia" id="agencia" class="form-control">';
                                        if ($_SESSION['tipo']=="root") {
                                        	
                                        	$sql_agencias="SELECT * FROM agencias";

                                        	

                                        }else {

                                        	$sql_agencias="SELECT * FROM agencias WHERE agencia_padre='".$_SESSION["agencia"]."'";

                                        }
                                            $rs_agencias=mysqli_query($mysqli,$sql_agencias) or die(mysqli_error());
                                            while ($row_agencias=mysqli_fetch_array($rs_agencias)) {
                                                echo  '<option value='.$row_agencias["id"].'>'.$row_agencias["agencia"].'</option>';
                                            }

                                 }  echo '</select>
                                    </div>
                                     
                                </div>';
                                              
                                  
                            ?>
                            <div class="form-group">
                                <label for="desde" class="col-sm-4 control-label">Desde:</label>
                                <div class="col-sm-6">
                                    <input type="text"  name="desde" id="desde" class="form-control" autocomplete="off" required>
                                    	
                                </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="hasta" class="col-sm-4 control-label">Hasta:</label>
                                <div class="col-sm-6">
                                    <input type="text"  name="hasta" id="hasta" class="form-control" autocomplete="off" required>
                                    	
                                </div>
                                 <button class="btn btn-primary">Consultar</button>
                            </div>
                            

                        </form>
                	
	                
                </div>
            </div>
            <?php if ($_SESSION["tipo"]=="root") { ?>
            <div class="row">
            	<div class="col-sm-6 col-xs-offset-2">
            	
            	<form class="form-horizontal" method="POST" action="saldo_general.php">
            		<?php
            		echo '<center><h4>Iztapalapa</h4></center>';

            		 echo '<div class="form-group">
                           	<label for="agencia" class="col-sm-4 control-label">Agencia:</label>
                                <div class="col-sm-6">
                                    <select  name="agencia" id="agencia" class="form-control">';
                    $sql_agencias="SELECT * FROM agencias WHERE id='26'";
                    $rs_agencias=mysqli_query($mysqli,$sql_agencias) or die(mysqli_error());
                    while ($row_agencias=mysqli_fetch_array($rs_agencias)) {
                        echo  '<option value='.$row_agencias["id"].'>'.$row_agencias["agencia"].'</option>';
                    }
                     echo '</select>
                        </div>
                                     
                    </div>';
                         
            	?>
            	
            	<div class="form-group">
                                <label for="desde1" class="col-sm-4 control-label">Desde:</label>
                                <div class="col-sm-6">
                                    <input type="text"  name="desde" id="desde1" class="form-control" autocomplete="off">
                                    	
                                </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="hasta1" class="col-sm-4 control-label">Hasta:</label>
                                <div class="col-sm-6">
                                    <input type="text"  name="hasta" id="hasta1" class="form-control" autocomplete="off" required>
                                    	
                                </div>
                                 <button class="btn btn-primary" required>Consultar</button>
                            </div>
            </div>
			
		</div>
		  
		</form>
		<?php } ?>
		<br>
		<?php if ($_SESSION["tipo"]=="root" || $_SESSION['usuario']=="112244555") { ?>
		<div class="row">
            	<div class="col-sm-6 col-xs-offset-2">
            	
            	<form class="form-horizontal" method="POST" action="saldo_general.php">
            		<?php
            		echo '<center><h4>Mexiapuestas General</h4></center>';

            		 echo '<div class="form-group">
                           	<label for="agencia" class="col-sm-4 control-label">Agencia Padre:</label>
                                <div class="col-sm-6">
                                    <select  name="agencia" id="agencia" class="form-control">';
                    $sql_agencias="SELECT * FROM agencias WHERE id='10'";
                    $rs_agencias=mysqli_query($mysqli,$sql_agencias) or die(mysqli_error());
                    while ($row_agencias=mysqli_fetch_array($rs_agencias)) {
                        echo  '<option value='.$row_agencias["id"].'>'.$row_agencias["agencia"].'</option>';
                    }
                     echo '</select>
                        </div>
                                     
                    </div>';
                                
            	?>
            	
            	<div class="form-group">
                                <label for="desde1" class="col-sm-4 control-label">Desde:</label>
                                <div class="col-sm-6">
                                    <input type="text"  name="desde" id="desde1" class="form-control" autocomplete="off">
                                    	
                                </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="hasta1" class="col-sm-4 control-label">Hasta:</label>
                                <div class="col-sm-6">
                                    <input type="text"  name="hasta" id="hasta1" class="form-control" autocomplete="off" required>
                                    	
                                </div>
                                 <button class="btn btn-primary" required>Consultar</button>
                            </div>
            </div>
			
		</div>
		  
		</form>
		<?php } ?>
		<?php 
			include "template/modal_registro.php";
		?>
	</div>
	
	<script src="js/hora.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/validacion_registro.js"></script>
	<script src="lib/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script>
    	$.datepicker.regional['es'] = {
		 closeText: 'Cerrar',
		 prevText: '< Ant',
		 nextText: 'Sig >',
		 currentText: 'Hoy',
		 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		 weekHeader: 'Sm',
		 firstDay: 1,
		 isRTL: false,
		 showMonthAfterYear: false,
		 yearSuffix: ''
		 };
		 $.datepicker.setDefaults($.datepicker.regional['es']);

        $(".menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $("#desde").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
			

	
		});
		$("#hasta").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
			

	
		});

		$("#desde1").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
			

	
		});
		$("#hasta1").datepicker({
			changeMonth: true, // Mostrar el mes
			changeYear: true, // Poder cambiar el año
			showOtherMonths: true, //Mostrar cuadrilcula
			showButtonPanel: true, // Mostrar botones
			dateFormat: 'yy-mm-dd',
			

	
		});
	</script>

</body>
</html>


