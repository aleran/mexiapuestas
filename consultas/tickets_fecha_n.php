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
	<title>Tickets .:mexiapuestas.net</title>
	
	<!--Fuentes-->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="../css/estilos_menu.css">
	<link rel="stylesheet" href="../lib/jquery-ui-1.12.1/jquery-ui.min.css">
	
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
	 
	<!-- header -->
	
	<div class="content">
		<?php 
			include "../template/header2.html";
		?>
		
		<!-- menu -->
		<?php 
			if ($_SESSION["tipo"]=="normal") {
                include "../template/menu_normal.php";
            }
            else {
                include "../template/menu_agencias.php";
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
               
                    <div class="col-sm-6 col-xs-offset-2">
                		<center><h3>Seleccione las fechas para mostrar tickets:</h3><br></center>
	                	 <form class="form-horizontal" method="POST" action="apuestas_u_normal.php">

                            <div class="form-group">
                                <label for="desde" class="col-sm-4 control-label"><font color="black">Desde:</font></label>
                                <div class="col-sm-6">
                                    <input type="text"  name="desde" id="desde" class="form-control" autocomplete="off">
                                    	
                                </div>
                                 
                            </div>
                            <div class="form-group">
                                <label for="hasta" class="col-sm-4 control-label"><font color="black">Hasta:</font></label>
                                <div class="col-sm-6">
                                    <input type="text"  name="hasta" id="hasta" class="form-control" autocomplete="off">
                                    	
                                </div>
                                 <button class="btn btn-success">Ver Tickets</button>
                            </div>
                            

                        </form>
                	
	                
                </div>
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
    </script>

</body>
</html>