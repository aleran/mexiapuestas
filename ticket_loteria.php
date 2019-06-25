<?php
    include("conexion/conexion.php");
	include("sesiones/time_sesion.php"); 

    $compe_select=array();
    include "reutilizable/modelo_ticket_loteria.php";
   

	
	
	echo "<button class='btn btn-primary hidden-print' id='imprimir' type='button'>Imprimir</button> ";
	echo "<a href='bienvenido.php' class='btn btn-success hidden-print'  type='button'>Volver</a><br>";
	echo "</div>";
	echo "</div><br>";
    $compe_select=serialize($compe_select);
    $compe_select=urlencode($compe_select);

    
	include "reutilizable/modelo_ticket_loteria2.php";

?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	var ticket= $("#ticket2").html();
    var es_firefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
    
     if(es_firefox){
           
           <?php if ($_SESSION["tipo"]!="normal") { ?>
            if($(window).width() <= 970)  {
                 
                window.location="com.fidelier.printfromweb://$small$"+ticket+"$intro$$intro$$cut$$intro$"
            }
            else {
                window.print();
            }
        <?php }?>
           
       }else{
           
           <?php if ($_SESSION["tipo"]!="normal") { ?>
            if(window.screen.width <= 970)  {
                 
                window.location="https://com.fidelier.printfromweb://$small$"+ticket+"$intro$$intro$$cut$$intro$";
                
            }
            else {
                window.print();
            }
        <?php }?>
           
       }

    window.location="bienvenido_loteria.php";
        
    
</script>