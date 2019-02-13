<?php
    include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");  
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta name="theme-color" content="#008000">
	<!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#008000">
	
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
		include "../template/mensaje_top.html";
	?>
	 
	<!-- header -->
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


	
	<div class="content">
		<!-- mostrar usuario o agencia -->
		<?php 
			include "../template/barra_usuario.php";
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>
			<div class="row">
                <h3><center><b>Por favor, presione sobre el módulo de tickets a consultar:</b></center></h3><br><br>
                    <div class="col-lg-2">
                        <a href="tickets_fecha.php" class="btn btn-primary" title="Muestra de tickets en juego">ACTIVOS</a>
                        
                    </div>
                     <div class="col-lg-2">
                        <a href="por_pagar.php" class="btn btn-warning" title="Muestra de tickets pendientes por pagar">POR PAGAR</a>
                        
                    </div>
                     <div class="col-lg-2">
                        <a href="tickets_fecha_p.php" class="btn btn-danger" title="Histórico de tickets perdedores">PERDEDORES</a>
                    </div>
                    <div class="col-lg-2">
                        <a href="tickets_fecha_g.php" class="btn btn-success" title="Histórico de tickets ganadores">GANADORES</a>
                    </div>
                    <div class="col-lg-2">
                        <a href="tickets_fecha_gr.php" class="btn btn-info" title="Ganadores por Recargas">GN. POR RECARGAS</a>
                    </div>
                    <div class="col-lg-2">
                        <a href="" class="btn btn-default" data-toggle="modal" data-target="#modalT">BUSCAR</a>
                    </div>

                    
            </div>

            <!-- Modal Buscar Ticket -->

            <div class="modal fade" id="modalT" tabindex="-1" role="dialog" aria-labelledby="modalUsuariosLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalUsuariosLabel">Buscar Ticket por codigo</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" method="POST" action="con_codigo.php">
                                <?php 
                                    if ($_SESSION["tipo"]=="root") {
                                        echo "Introduzca el codigo completo";
                                    }
                                    else {
                                        echo "introduzca los numeros despues del guíon";
                                    }
                                ?>
                                
                                <div class="form-group">
                                    <label for="codigo" class="col-sm-4 control-label">Codigo:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="codigo" id="codigo" placeholder="" required>
                                    </div>
                                </div>
                                
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-success">Buscar</button>
                        </div>
                        </form>
                    </div>
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

</body>
</html>