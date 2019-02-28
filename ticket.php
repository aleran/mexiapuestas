<?php
    include("conexion/conexion.php");
	include("sesiones/time_sesion.php"); 

    $compe_select=array();
    include "reutilizable/modelo_ticket.php";
   

	
	
	echo "<button class='btn btn-primary hidden-print' id='imprimir' type='button'>Imprimir</button> ";
	echo "<a href='bienvenido.php' class='btn btn-success hidden-print'  type='button'>Volver</a><br>";
	echo "</div>";
	echo "</div><br>";
    $compe_select=serialize($compe_select);
    $compe_select=urlencode($compe_select);

    
	include "reutilizable/modelo_ticket2.php";

?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	          
       var ticket= $("#ticket2").html();
        <?php if ($_SESSION["tipo"]!="normal") { ?>
            if($(window).width() <= 768)  {
                 
                window.location="com.fidelier.printfromweb://$small$"+ticket+"$intro$$intro$$cut$$intro$"
            }
            else {
                window.print();
            }
        <?php }?>
        <?php if ($_SESSION["pais"]!=2) { ?>
       <?php if ($row_ticket["tipo"]=="combinada") { ?>
            window.location="compe_selec.php?compe_select=<?php echo $compe_select;?>";
        <?php } 
        else { ?>

            window.location="compe_selec2.php?compe_select=<?php echo $compe_select;?>";
        <?php }?>
        <?php }else{?>
            window.location="competiciones.php";
        <?php }?>
        

       
    
</script>