<?php
    include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");  
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
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
	<style>
        #ganador{
            position: absolute;
            margin-top: -510;
            margin-left: 35;
            z-index: 100;
            color:#2FB209;
            font-size: 40px;
            -webkit-transform: rotate(-40deg);
            transform: rotate(-40deg);
        }
        #perdedor{
            position: absolute;
            margin-top: -510;
            margin-left: 35;
            z-index: 100;
            color:#E61423;
            font-size: 40px;
            -webkit-transform: rotate(-40deg);
            transform: rotate(-40deg);
        }
    </style>
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
            if ($_SESSION["tipo"]=="normal") {
                include "../template/menu_normal_l.php";
            }
            else {
                include "../template/menu_agencias_l.php";
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
                   <div class="col-sm-6 col-xs-offset-1">
                    <?php

                        if ($_SESSION["tipo"]=="root" || $_SESSION["tipo"]=="chance") {

                            if (isset($_GET["codigo"])) {
                                $codigo=$_GET["codigo"];
                            }
                            else if (isset($_POST["codigo"])) {
                                $codigo=$_POST["codigo"];
                            }
                        }
                        else {

                            if (isset($_GET["codigo"])) {
                                $codigo=$_GET["codigo"];
                            }
                            else if (isset($_POST["codigo"])) {
                                $codigo=$_SESSION["agencia"]."-".$_POST["codigo"];
                            }
                        }

                        include "../reutilizable/modelo_ticket_loteria.php";

                        include "../reutilizable/modelo_ticket_loteria2.php";

                        echo "</div><br>";
                        echo "<button class='btn btn-primary hidden-print' id='imprimir' type='button'>Imprimir</button>";

                                            ?>
                           
                    
                    <?php

                        if ($_SESSION["tipo"]=="root" || $_SESSION["tipo"]=="chance") {
                             if ($row_ticket["ganar"]=='3') {
                                echo '<a href="#" id="anular" class="btn btn-danger hidden-print">Anular Ticket</a> 
                                    <br><br>';
                            }

                        } 
                        if ($row_ticket["ganar"]==1) {
                            echo "<span id='ganador'>GANADOR<span>";
                        }
                        else if ($row_ticket["ganar"]=='3') {

                            if ($_SESSION["tipo"]=="root") {
                             echo '<a href="#" id="ganar" class="btn btn-success hidden-print">Ticket Ganador</a> ';
                             echo '<a href="#" id="perder" class="btn btn-warning hidden-print">Ticket Perdedor</a><br>';
                            }
                        }
                        else {
                            echo "<span id='perdedor'>PERDEDOR<span>";
                        }

                    ?>
                     <br>
                </div>
                <div class="col"></div>

             
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
	<script>
		$("#anular").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro desea anular el ticket?")) {
                window.location="accion_ticket2.php?anular=<?php echo $row_ticket["codigo"];?>"
            }

        });
        $("#ganar").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro que este ticket es Ganador?")) {
                window.location="accion_ticket2.php?ganar=<?php echo $row_ticket["codigo"];?>"
            }

        });
        $("#perder").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro que este ticket es Perdedor?")) {
                window.location="accion_ticket2.php?perder=<?php echo $row_ticket["codigo"];?>"
            }

        })
        $("#pagar").click(function(e){
            e.preventDefault();
            if (confirm("¿Seguro que desea pagar este ticket?")) {
                window.location="accion_ticket.php?pagar=<?php echo $row_ticket["codigo"];?>"
            }

        })


        var ticket= $("#ticket2").html();
        <?php if ($_SESSION["tipo"]!="normal") { ?>
            if($(window).width() <= 768)  {
                $("#imprimir").click(function(){
                    window.location="com.fidelier.printfromweb://$small$"+ticket+"$intro$$intro$$cut$$intro$"
                });
            }
            else {
                $("#imprimir").click(function(){
                    window.print();
                });
            }
        <?php }?>
	</script>

</body>
</html>