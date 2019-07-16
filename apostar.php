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
	<title>Agentes .:mexiapuestas.net</title>
	
	<!--Fuentes-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="css/estilos_menu.css">
	
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
      if(isset($_SESSION["tipo"])) { 
			   include "template/barra_usuario.php";
      }
      
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>
			<div class="row">
                    <form action="apuesta.php" id="apuesta" method="POST">
                        <?php
                        	
                            echo '<div class="col-lg-8 col-lg-offset-2">
                                 <div class="table-responsive">
                                    <table class="table table-striped">    
                                        <thead>
                                            <th>Jugadas</th>
                                            <th>Equipos</th>
                                            <th>Logro</th>
                                        </thead>';
                                        echo '<tbody>';

                                           if (isset($_POST["gj1"])){
                                              $gj1=$_POST["gj1"];
                                              $datos = array();
                                              $partidos;
                                        foreach ($gj1 as $pa => $valor) {
                                          list($p,$l) = explode("/",$valor);

                                            echo '<tr>';
                                                        echo '<td>';
                                                          echo "Ganar";
                                                        echo '</td>';

                                                      $sql="SELECT * FROM partidos WHERE id='$p'";
                                            $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                            $row=mysqli_fetch_array($rs);
                                            $sql2="SELECT *  FROM equipos  WHERE id='".$row["equipo1"]."'";
                                                    $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                    $row2=mysqli_fetch_array($rs2);
                                                      
                                                      echo '<td>';
                                                          echo $row2["equipo"];
                                                        echo '</td>';
                                                    
                                                      echo '<td>';
                                                          echo $l;
                                                        echo '</td>';
                                                    
                                                      echo '</tr>';


                                            for ($i=1; $i<=count ($l); $i++){
   
                                             
                                                  $datos[] =$l;
                                              
                                              
                                                        
                                            }  

                                            for ($i=1; $i<=count ($p); $i++){
                 
                                              
                                            $partidos[] = $p."/"."gj1"."/"."0"."/".$l;
                                                                  
                                                                      
                                            }  


                                                    
                                        }
                                        
                                      }


                                              if (isset($_POST["gj2"])){
                                              $gj2=$_POST["gj2"];
                                        foreach ($gj2 as $pa => $valor2) {
                                          list($p2,$l2) = explode("/",$valor2);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Ganar";
                                                      echo '</td>';

                                                    $sql3="SELECT * FROM partidos WHERE id='$p2'";
                                          $rs3=mysqli_query($mysqli, $sql3) or die (mysqli_error());

                                          $row3=mysqli_fetch_array($rs3);
                                          $sql4="SELECT *  FROM equipos  WHERE id='".$row3["equipo2"]."'";
                                                  $rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());
                                                  while ( $row4=mysqli_fetch_array($rs4)) {
                                                    
                                                    echo '<td>';
                                                        echo $row4["equipo"];
                                                      echo '</td>';
                                                  }
                                                    echo '<td>';
                                                        echo $l2;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l2); $i++){
                                                
                                                        $datos[] =$l2;
                                                     
                              
                              
                            }

                              for ($i=1; $i<=count ($p2); $i++){
 
                              
                                                        $partidos[] = $p2."/"."gj2"."/"."0"."/".$l2;
                                                      
                            }    
                                        }

                                              }

                                              if (isset($_POST["empate"])){
                                                $empate=$_POST["empate"];
                                        foreach ($empate as $pa => $valor3) {
                                          list($p3,$l3) = explode("/",$valor3);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Empate";
                                                      echo '</td>';

                                                    $sql4="SELECT * FROM partidos WHERE id='$p3'";
                                          $rs4=mysqli_query($mysqli, $sql4) or die (mysqli_error());

                                          $row4=mysqli_fetch_array($rs4);
                                          $sql5="SELECT *  FROM equipos  WHERE id='".$row4["equipo1"]."'";
                                                  $rs5=mysqli_query($mysqli, $sql5) or die (mysqli_error());
                                                  $row5=mysqli_fetch_array($rs5);
                                                  $sql6="SELECT *  FROM equipos  WHERE id='".$row4["equipo2"]."'";
                                                  $rs6=mysqli_query($mysqli, $sql6) or die (mysqli_error());
                                                  $row6=mysqli_fetch_array($rs6);


                                                    
                                                    echo '<td>';
                                                        echo $row5["equipo"]." - ". $row6["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l3;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l3); $i++){
                                                    
                                                        $datos[] =$l3;
                                                      
                                                     
 
                              
                            }

                            for ($i=1; $i<=count ($p3); $i++){
 
                              
                                                        $partidos[] = $p3."/"."empate"."/"."0"."/".$l3;
                                                      
                            }      
                                        }

                                              }

                                              if (isset($_POST["empatept"])){
                                                $empatept=$_POST["empatept"];
                                        foreach ($empatept as $pa => $valor30) {
                                          list($p30,$l30) = explode("/",$valor30);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Empate 1 T";
                                                      echo '</td>';

                                                    $sql40="SELECT * FROM partidos WHERE id='$p30'";
                                          $rs40=mysqli_query($mysqli, $sql40) or die (mysqli_error());

                                          $row40=mysqli_fetch_array($rs40);
                                          $sql50="SELECT *  FROM equipos  WHERE id='".$row40["equipo1"]."'";
                                                  $rs50=mysqli_query($mysqli, $sql50) or die (mysqli_error());
                                                  $row50=mysqli_fetch_array($rs50);
                                                  $sql60="SELECT *  FROM equipos  WHERE id='".$row40["equipo2"]."'";
                                                  $rs60=mysqli_query($mysqli, $sql60) or die (mysqli_error());
                                                  $row60=mysqli_fetch_array($rs60);


                                                    
                                                    echo '<td>';
                                                        echo $row50["equipo"]." - ". $row60["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l30;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l30); $i++){
                                                      
                                                      
                                                        $datos[] =$l30;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p30); $i++){
 
                              
                                                        $partidos[] = $p30."/"."empatept"."/"."0"."/".$l30;
                                                      
                            }      
                                        }

                                              }
                                               

                                               if (isset($_POST["alta"])){
                                                $alta=$_POST["alta"];
                                        foreach ($alta as $pa => $valor4) {
                                          list($p4,$l4,$v_a) = explode("/",$valor4);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Alta";
                                                      echo '</td>';

                                                    $sql7="SELECT * FROM partidos WHERE id='$p4'";
                                          $rs7=mysqli_query($mysqli, $sql7) or die (mysqli_error());

                                          $row7=mysqli_fetch_array($rs7);
                                          $sql8="SELECT *  FROM equipos  WHERE id='".$row7["equipo1"]."'";
                                                  $rs8=mysqli_query($mysqli, $sql8) or die (mysqli_error());
                                                  $row8=mysqli_fetch_array($rs8);
                                                  $sql9="SELECT *  FROM equipos  WHERE id='".$row7["equipo2"]."'";
                                                  $rs9=mysqli_query($mysqli, $sql9) or die (mysqli_error());
                                                  $row9=mysqli_fetch_array($rs9);


                                                    
                                                    echo '<td>';
                                                        echo $row8["equipo"]." - ". $row9["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  "(".$v_a.") ".$l4;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l4); $i++){
                                                     
                                                        $datos[] =$l4;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p4); $i++){
 
                              
                                                        $partidos[] = $p4."/"."alta"."/".$v_a."/".$l4;
                                                      
                            }       
                                        }

                                              }


                                                  if (isset($_POST["baja"])){
                                                $baja=$_POST["baja"];
                                        foreach ($baja as $pa => $valor5) {
                                          list($p5,$l5,$v_b) = explode("/",$valor5);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Baja";
                                                      echo '</td>';

                                                    $sql10="SELECT * FROM partidos WHERE id='$p5'";
                                          $rs10=mysqli_query($mysqli, $sql10) or die (mysqli_error());

                                          $row10=mysqli_fetch_array($rs10);
                                          $sql11="SELECT *  FROM equipos  WHERE id='".$row10["equipo1"]."'";
                                                  $rs11=mysqli_query($mysqli, $sql11) or die (mysqli_error());
                                                  $row11=mysqli_fetch_array($rs11);
                                                  $sql12="SELECT *  FROM equipos  WHERE id='".$row10["equipo2"]."'";
                                                  $rs12=mysqli_query($mysqli, $sql12) or die (mysqli_error());
                                                  $row12=mysqli_fetch_array($rs12);


                                                    
                                                    echo '<td>';
                                                        echo $row11["equipo"]." - ". $row12["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  "(".$v_b.") ".$l5;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l5); $i++){
                                                     
                                                      
                                                        $datos[] =$l5;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p5); $i++){
 
                              
                                                        $partidos[] = $p5."/"."baja"."/".$v_b."/".$l5;
                                                      
                            }       
                                        }

                                              }

                                              if (isset($_POST["runline1"])){
                                                $runline1=$_POST["runline1"];
                                        foreach ($runline1 as $pa => $valor6) {
                                          list($p6,$l6,$v_r1) = explode("/",$valor6);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Runline";
                                                      echo '</td>';

                                                    $sql13="SELECT * FROM partidos WHERE id='$p6'";
                                          $rs13=mysqli_query($mysqli, $sql13) or die (mysqli_error());

                                          $row13=mysqli_fetch_array($rs13);
                                          $sql14="SELECT *  FROM equipos  WHERE id='".$row13["equipo1"]."'";
                                                  $rs14=mysqli_query($mysqli, $sql14) or die (mysqli_error());
                                                  $row14=mysqli_fetch_array($rs14);
                                                  


                                                    
                                                    echo '<td>';
                                                        echo $row14["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  "(".$v_r1.") ".$l6;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l6); $i++){
                                                     
                                                      
                                                        $datos[] =$l6;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p6); $i++){
 
                              
                                                        $partidos[] = $p6."/"."runline1"."/"."0"."/".$l6;
                                                      
                            }         
                                        }

                                              }

                                              if (isset($_POST["runline2"])){
                                                $runline2=$_POST["runline2"];
                                        foreach ($runline2 as $pa => $valor7) {
                                          list($p7,$l7,$v_r2) = explode("/",$valor7);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Runline";
                                                      echo '</td>';

                                                    $sql16="SELECT * FROM partidos WHERE id='$p7'";
                                          $rs16=mysqli_query($mysqli, $sql16) or die (mysqli_error());

                                          $row16=mysqli_fetch_array($rs16);
                                          $sql17="SELECT *  FROM equipos  WHERE id='".$row16["equipo2"]."'";
                                                  $rs17=mysqli_query($mysqli, $sql17) or die (mysqli_error());
                                                  $row17=mysqli_fetch_array($rs17);


                                                    
                                                    echo '<td>';
                                                        echo $row17["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  "(".$v_r2.") ".$l7;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l7); $i++){
                                                     
                                                      
                                                        $datos[] =$l7;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p7); $i++){
 
                              
                                                        $partidos[] = $p7."/"."runline2"."/"."0"."/".$l7;
                                                      
                            }          
                                        }

                                              }


                                              if (isset($_POST["gpt1"])){
                                                $gpt1=$_POST["gpt1"];
                                        foreach ($gpt1 as $pa => $valor8) {
                                          list($p8,$l8) = explode("/",$valor8);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Ganar 1T";
                                                      echo '</td>';

                                                    $sql19="SELECT * FROM partidos WHERE id='$p8'";
                                          $rs19=mysqli_query($mysqli, $sql19) or die (mysqli_error());

                                          $row19=mysqli_fetch_array($rs19);
                                          $sql20="SELECT *  FROM equipos  WHERE id='".$row19["equipo1"]."'";
                                                  $rs20=mysqli_query($mysqli, $sql20) or die (mysqli_error());
                                                  $row20=mysqli_fetch_array($rs20);


                                                    
                                                    echo '<td>';
                                                        echo $row20["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l8;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l8); $i++){
                                                      
                                                     
                                                        $datos[] =$l8;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p8); $i++){
 
                              
                                                        $partidos[] = $p8."/"."gpt1"."/"."0"."/".$l8;
                                                      
                            }    
                                        }

                                              }

                                              


                                              if (isset($_POST["gpt2"])){
                                                $gpt2=$_POST["gpt2"];
                                        foreach ($gpt2 as $pa => $valor9) {
                                          list($p9,$l9) = explode("/",$valor9);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Ganar 1T";
                                                      echo '</td>';

                                                    $sql22="SELECT * FROM partidos WHERE id='$p9'";
                                          $rs22=mysqli_query($mysqli, $sql22) or die (mysqli_error());

                                          $row22=mysqli_fetch_array($rs22);
                                          $sql23="SELECT *  FROM equipos  WHERE id='".$row22["equipo2"]."'";
                                                  $rs23=mysqli_query($mysqli, $sql23) or die (mysqli_error());
                                                  $row23=mysqli_fetch_array($rs23);


                                                    
                                                    echo '<td>';
                                                        echo $row23["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  $l9;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l9); $i++){
                                                      
                                                      
                                                        $datos[] =$l9;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p9); $i++){
 
                              
                                                        $partidos[] = $p9."/"."gpt2"."/"."0"."/".$l9;
                                                      
                            }    
                                        }

                                              }

                                              if (isset($_POST["gst1"])){
                                                $gst1=$_POST["gst1"];
                                        foreach ($gst1 as $pa => $valor80) {
                                          list($p80,$l80) = explode("/",$valor80);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Ganar 2T";
                                                      echo '</td>';

                                                    $sql190="SELECT * FROM partidos WHERE id='$p80'";
                                          $rs190=mysqli_query($mysqli, $sql190) or die (mysqli_error());

                                          $row190=mysqli_fetch_array($rs190);
                                          $sql200="SELECT *  FROM equipos  WHERE id='".$row190["equipo1"]."'";
                                                  $rs200=mysqli_query($mysqli, $sql200) or die (mysqli_error());
                                                  $row200=mysqli_fetch_array($rs200);


                                                    
                                                    echo '<td>';
                                                        echo $row200["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l80;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l80); $i++){
                                                     
                                                      
                                                        $datos[] =$l80;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p80); $i++){
 
                              
                                                        $partidos[] = $p80."/"."gst1"."/"."0"."/".$l80;
                                                      
                            }    
                                        }

                                              }

                                              if (isset($_POST["gst2"])){
                                                $gst2=$_POST["gst2"];
                                        foreach ($gst2 as $pa => $valor90) {
                                          list($p90,$l90) = explode("/",$valor90);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Ganar 2T";
                                                      echo '</td>';

                                                    $sql220="SELECT * FROM partidos WHERE id='$p90'";
                                          $rs220=mysqli_query($mysqli, $sql220) or die (mysqli_error());

                                          $row220=mysqli_fetch_array($rs220);
                                          $sql230="SELECT *  FROM equipos  WHERE id='".$row220["equipo2"]."'";
                                                  $rs230=mysqli_query($mysqli, $sql230) or die (mysqli_error());
                                                  $row230=mysqli_fetch_array($rs230);


                                                    
                                                    echo '<td>';
                                                        echo $row230["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  $l90;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l90); $i++){
                                                      
                                                      
                                                        $datos[] =$l90;
                                                    
 
                              
                            }

                            for ($i=1; $i<=count ($p90); $i++){
 
                              
                                                        $partidos[] = $p90."/"."gst2"."/"."0"."/".$l90;
                                                      
                            }    
                                        }

                                              }


                                              if (isset($_POST["g5to1"])){
                                                $g5to1=$_POST["g5to1"];
                                        foreach ($g5to1 as $pa => $valor12) {
                                          list($p12,$l12) = explode("/",$valor12);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Ganar 5to In";
                                                      echo '</td>';

                                                    $sql28="SELECT * FROM partidos WHERE id='$p12'";
                                          $rs28=mysqli_query($mysqli, $sql28) or die (mysqli_error());

                                          $row28=mysqli_fetch_array($rs28);
                                          $sql29="SELECT *  FROM equipos  WHERE id='".$row28["equipo1"]."'";
                                                  $rs29=mysqli_query($mysqli, $sql29) or die (mysqli_error());
                                                  $row29=mysqli_fetch_array($rs29);


                                                    
                                                    echo '<td>';
                                                        echo $row29["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  $l12;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l12); $i++){
                                                     
                                                      
                                                        $datos[] =$l12;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p12); $i++){
 
                              
                                                        $partidos[] = $p12."/"."g5to1"."/"."0"."/".$l12;
                                                      
                            }   
                                        }

                                              }


                                              if (isset($_POST["g5to2"])){
                                                $g5to2=$_POST["g5to2"];
                                        foreach ($g5to2 as $pa => $valor13) {
                                          list($p13,$l13) = explode("/",$valor13);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "Ganar 5to In";
                                                      echo '</td>';

                                                    $sql30="SELECT * FROM partidos WHERE id='$p13'";
                                          $rs30=mysqli_query($mysqli, $sql30) or die (mysqli_error());

                                          $row30=mysqli_fetch_array($rs30);
                                          $sql31="SELECT *  FROM equipos  WHERE id='".$row30["equipo2"]."'";
                                                  $rs31=mysqli_query($mysqli, $sql31) or die (mysqli_error());
                                                  $row31=mysqli_fetch_array($rs31);


                                                    
                                                    echo '<td>';
                                                        echo $row31["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  $l13;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';

                                                    for ($i=1; $i<=count ($l13); $i++){
                                                      
                                                      
                                                        $datos[] =$l13;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p13); $i++){
 
                              
                                                        $partidos[] = $p13."/"."g5to2"."/"."0"."/".$l13;
                                                      
                            }   
                                        }

                                              }

                                              if (isset($_POST["gg"])){
                                                $gg=$_POST["gg"];
                                                 
                                                  
                                        foreach ($gg as $pa => $valor46) {
                                          list($p46,$l46) = explode("/",$valor46);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "GG";
                                                      echo '</td>';

                                                    $sql7="SELECT * FROM partidos WHERE id='$p46'";
                                          $rs7=mysqli_query($mysqli, $sql7) or die (mysqli_error());

                                          $row7=mysqli_fetch_array($rs7);
                                          $sql8="SELECT *  FROM equipos  WHERE id='".$row7["equipo1"]."'";
                                                  $rs8=mysqli_query($mysqli, $sql8) or die (mysqli_error());
                                                  $row8=mysqli_fetch_array($rs8);
                                                  $sql9="SELECT *  FROM equipos  WHERE id='".$row7["equipo2"]."'";
                                                  $rs9=mysqli_query($mysqli, $sql9) or die (mysqli_error());
                                                  $row9=mysqli_fetch_array($rs9);


                                                    
                                                    echo '<td>';
                                                        echo $row8["equipo"]." - ". $row9["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  $l46;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l46); $i++){
                                                     
                                                      
                                                        $datos[] =$l46;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p46); $i++){
 
                              
                                                        $partidos[] = $p46."/"."gg"."/"."0"."/".$l46;
                                                      
                            }       
                                        }

                                              }

                                              if (isset($_POST["ng"])){
                                                $ng=$_POST["ng"];
                                                 
                                                  
                                        foreach ($ng as $pa => $valor47) {
                                          list($p47,$l47) = explode("/",$valor47);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "NG";
                                                      echo '</td>';

                                                    $sql7="SELECT * FROM partidos WHERE id='$p47'";
                                          $rs7=mysqli_query($mysqli, $sql7) or die (mysqli_error());

                                          $row7=mysqli_fetch_array($rs7);
                                          $sql8="SELECT *  FROM equipos  WHERE id='".$row7["equipo1"]."'";
                                                  $rs8=mysqli_query($mysqli, $sql8) or die (mysqli_error());
                                                  $row8=mysqli_fetch_array($rs8);
                                                  $sql9="SELECT *  FROM equipos  WHERE id='".$row7["equipo2"]."'";
                                                  $rs9=mysqli_query($mysqli, $sql9) or die (mysqli_error());
                                                  $row9=mysqli_fetch_array($rs9);


                                                    
                                                    echo '<td>';
                                                        echo $row8["equipo"]." - ". $row9["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  $l47;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l47); $i++){
                                                     
                                                        $datos[] =$l47;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p47); $i++){
 
                              
                                                        $partidos[] = $p47."/"."ng"."/"."0"."/".$l47;
                                                      
                            }       
                                        }

                                              }

                                              if (isset($_POST["dc1x"])){
                                              $dc1x=$_POST["dc1x"];
                                              
                                              
                                        foreach ($dc1x as $pa => $valor49) {
                                          list($p49,$l49) = explode("/",$valor49);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "DC1X";
                                                      echo '</td>';

                                                    $sql="SELECT * FROM partidos WHERE id='$p49'";
                                          $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                          $row=mysqli_fetch_array($rs);
                                          $sql2="SELECT *  FROM equipos  WHERE id='".$row["equipo1"]."'";
                                                  $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                  $row2=mysqli_fetch_array($rs2);
                                                    
                                                    echo '<td>';
                                                        echo $row2["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l49;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l49); $i++){
 
                              
                                                        $datos[] =$l49;
                                                      
                                                    
                            }  

                            for ($i=1; $i<=count ($p49); $i++){
 
                              
                                                        $partidos[] = $p49."/"."dc1x"."/"."0"."/".$l49;
                                                  
                                                      
                            }  


                                                    
                                        }
                                        
                                        

                                       

                                        

                                              }

                                              if (isset($_POST["dc2x"])){
                                              $dc2x=$_POST["dc2x"];
                                              
                                              
                                        foreach ($dc2x as $pa => $valor50) {
                                          list($p50,$l50) = explode("/",$valor50);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "DC2X";
                                                      echo '</td>';

                                                    $sql="SELECT * FROM partidos WHERE id='$p50'";
                                          $rs=mysqli_query($mysqli, $sql) or die (mysqli_error());

                                          $row=mysqli_fetch_array($rs);
                                          $sql2="SELECT *  FROM equipos  WHERE id='".$row["equipo2"]."'";
                                                  $rs2=mysqli_query($mysqli, $sql2) or die (mysqli_error());
                                                  $row2=mysqli_fetch_array($rs2);
                                                    
                                                    echo '<td>';
                                                        echo $row2["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo $l50;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l50); $i++){
 
                              
                                                        
                                                        $datos[] =$l50;
                                                      
                                                    
                            }  

                            for ($i=1; $i<=count ($p50); $i++){
 
                              
                                                        $partidos[] = $p50."/"."dc2x"."/"."0"."/".$l50;
                                                  
                                                      
                            }  


                                                    
                                        }
                                        
                                        

                                       

                                        

                                              }

                                              if (isset($_POST["dc12"])){
                                                $dc12=$_POST["dc12"];
                                                 
                                                  
                                        foreach ($dc12 as $pa => $valor51) {
                                          list($p51,$l51) = explode("/",$valor51);

                                          echo '<tr>';
                                                      echo '<td>';
                                                        echo "DC12";
                                                      echo '</td>';

                                                    $sql7="SELECT * FROM partidos WHERE id='$p51'";
                                          $rs7=mysqli_query($mysqli, $sql7) or die (mysqli_error());

                                          $row7=mysqli_fetch_array($rs7);
                                          $sql8="SELECT *  FROM equipos  WHERE id='".$row7["equipo1"]."'";
                                                  $rs8=mysqli_query($mysqli, $sql8) or die (mysqli_error());
                                                  $row8=mysqli_fetch_array($rs8);
                                                  $sql9="SELECT *  FROM equipos  WHERE id='".$row7["equipo2"]."'";
                                                  $rs9=mysqli_query($mysqli, $sql9) or die (mysqli_error());
                                                  $row9=mysqli_fetch_array($rs9);


                                                    
                                                    echo '<td>';
                                                        echo $row8["equipo"]." - ". $row9["equipo"];
                                                      echo '</td>';
                                                  
                                                    echo '<td>';
                                                        echo  $l51;
                                                      echo '</td>';
                                                  
                                                    echo '</tr>';


                                                    for ($i=1; $i<=count ($l51); $i++){
                                                    
                                                      
                                                        $datos[] =$l51;
                                                      
 
                              
                            }

                            for ($i=1; $i<=count ($p51); $i++){
 
                              
                                                        $partidos[] = $p51."/"."dc12"."/"."0"."/".$l51;
                                                      
                            }       
                                        }

                                              } 
                                          
                                                
                                          
                                            echo  '</tbody>';
                                        echo '</table>';
                                    echo '</div>';
                                    echo '</div>';
                                
                                     
                                ?>
                          
                    </div>
                    <center>
                    <?php 
                      if (isset($_SESSION["tipo"])) {
                        echo '<h4>Usted tiene <span id="time"></span> segundos para realizar su apuesta.</h4><br>';
                      }
                      if ($_SESSION["tipo"]=="normal") {
                        $sql_saldo="SELECT saldo FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
                        $rs_saldo=mysqli_query($mysqli,$sql_saldo) or die(mysqli_error());
                        $row_saldo=mysqli_fetch_array($rs_saldo);

                      }
                      
                    ?>
                    

                    
                  <div class="col-lg-3 col-lg-offset-4">
                    <?php 
                        if ($_SESSION["tipo"]=="normal") {
                          echo '<span>Saldo: '.$row_saldo["saldo"].'</span><br>';
                        }
                      ?>
                    
                    <form action="apuesta.php" method="POST">
                    <?php 
                        if ($_SESSION["tipo"]=="normal") {
                          echo '<input type="hidden" name="saldo" id="saldo" value="'.$row_saldo["saldo"].'">';
                        }
                      ?>
                      <div class="form-group">
                        <label for="monto" style="color: black;">Monto de Apuesta: </label>
                        <input type="tel" class="form-control" name="monto" id="monto" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label for="total" style="color: black;">Su Ganancia: </label>
                        <input type="text" class="form-control total" disabled="">
                      </div>
                      <?php if ($_SESSION["tipo"]!="normal") { ?>
                         <div class="form-group">
                          <label for="nombre_cliente" style="color: black;">Nombre Cliente: </label>
                          <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente">
                        </div>
                        <div class="form-group">
                          <label for="tel_cliente" style="color: black;">Teléfono Cliente: </label>
                          <input type="tel" class="form-control" id="tel_cliente" name="tel_cliente" >
                        </div>
                      <?php } ?>

                      <input type="hidden" name="tipo" value="combinada">   
                      <input type="hidden" name="premio" class="total">
                      
                          
                                
                           <?php
                          
                             	$datos3=array_product($datos);
                             	echo'<input type="hidden" value="'.$datos3.'" id="poduc_l">';

                             
                             	foreach ($partidos as $key => $part) {
                             		

                             		echo '<input name=partido[] type="hidden" value="'.$part.'">';
                             	}

                              
              			?>
                  
              
          
          
                  
                   
                      
                      <?php
                        if (isset($_SESSION["tipo"])) {
                          echo '<button type="button" class="btn btn-success" id="apostar">Apostar</button>';
                        }
                      ?>
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
	<script>
		 $("#monto").keyup(function(){
        var monto = $("#monto").val();
        //console.log(monto);
        var producto=$("#poduc_l").val();
        var resultado = monto * producto;
        resultado=Math.round(resultado);
        $(".total").val(resultado);
        $(".total").val(resultado);
      })

      $("#apostar").click(function(){
        <?php 

            if ($_SESSION["pais"]==1) {
               if ($_SESSION["tipo"]=="normal") {
                  echo 'if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
                      alert("El saldo es insuficiente para realizar la apuesta");
                    }';
                    echo 'else {';
                      echo 'if ($("#monto").val()< 2000 || $("#monto").val() > 1000000) {
                        alert("El monto a apostar debe estar entre $2.000 y $1.000.000");
                      }';
                      echo 'else if($(".total").val() > 10000000){
                        $(".total").val(10000000);
           
                        if(confirm("La ganancia máxima es de 10 millones de pesos, ¿desea continuar?")){
                        $("#apuesta").submit();
                        }
                      }';
                       echo 'else  $("#apuesta").submit();';
                    echo '}';
          
                }
                else {
                   echo 'if ($("#monto").val()< 2000 || $("#monto").val() > 1000000) {
                      alert("El monto a apostar debe estar entre $2.000 y $1.000.000");
                      }';
                      echo 'else if($(".total").val() > 10000000){
                      $(".total").val(10000000);
           
                      if(confirm("La ganancia máxima es de 10 millones de pesos, ¿desea continuar?")){
                      $("#apuesta").submit();
                      }
                      }';
                      echo 'else  $("#apuesta").submit();';
                }
              
              
            }
             if ($_SESSION["pais"]==3) {
               if ($_SESSION["tipo"]=="normal") {
                  echo 'if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
                      alert("El saldo es insuficiente para realizar la apuesta");
                    }';
                    echo 'else {';
                      echo 'if ($("#monto").val()< 30 || $("#monto").val() > 60000) {
                      alert("El monto a apostar debe estar entre $50 a $60.000");
                      }';
                      echo 'else if($(".total").val() > 100000){
                      $(".total").val(100000);
           
                      if(confirm("La ganancia máxima es de 100 mil de pesos, ¿desea continuar?")){
                      $("#apuesta").submit();
                      }
                      }';
                       echo 'else  $("#apuesta").submit();';
                    echo '}';
          
                }
                else {
                    echo 'if ($("#monto").val()< 30 || $("#monto").val() > 60000) {
                      alert("El monto a apostar debe estar entre $30 a $60.000");
                      }';
                      echo 'else if($(".total").val() > 100000){
                      $(".total").val(100000);
           
                      if(confirm("La ganancia máxima es de 100 mil de pesos, ¿desea continuar?")){
                      $("#apuesta").submit();
                      }
                      }';
                      echo 'else  $("#apuesta").submit();';
                }
              
              
            }
            if ($_SESSION["pais"]==2) {
                if ($_SESSION["tipo"]=="normal") {
                   echo 'if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
                      alert("El saldo es insuficiente para realizar la apuesta");
                    }';
                    echo 'else {';
                       echo 'if ($("#monto").val()< 200) {
                      alert("El monto mínimo de apuesta es de Bs.S 200");
                      }';
                      echo 'else if($(".total").val() > 50000){
                      $(".total").val(50000);
           
                      if(confirm("La ganancia maxima es de Bs.S 50.000 ¿desea continuar?")){
                      $("#apuesta").submit();
                      }
                      }';
                      echo 'else  $("#apuesta").submit();';
                    echo '}';
                }
                else {
                  echo 'if ($("#monto").val()< 200) {
                      alert("El monto mínimo de apuesta es de Bs.S 200");
                      }';
                      echo 'else if($(".total").val() > 50000){
                      $(".total").val(50000);
           
                      if(confirm("La ganancia maxima es de Bs.S 50.000 ¿desea continuar?")){
                      $("#apuesta").submit();
                      }
                      }';
                      echo 'else  $("#apuesta").submit();';
                }
             
            }
            if ($_SESSION["pais"]==4) {
                if ($_SESSION["tipo"]=="normal") {
                   echo 'if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
                      alert("El saldo es insuficiente para realizar la apuesta");
                    }';
                    echo 'else {';
                       echo 'if ($("#monto").val()< 5) {
                     alert("El monto minimo a apostar es de 5 USD");
                      }';
                      echo 'else if($(".total").val() > 5000){
                      $(".total").val(5000);
           
                      if(confirm("La ganancia maxima es de 5000 USD ¿desea continuar?")){
                      $("#apuesta").submit();
                      }
                      }';
                      echo 'else  $("#apuesta").submit();';
                    echo '}';
                }
                else {
                   echo 'if ($("#monto").val()< 5) {
                      alert("El monto minimo a apostar es de 5 USD");
                      }';
                      echo 'else if($(".total").val() > 5000){
                      $(".total").val(5000);
           
                     if(confirm("La ganancia maxima es de 5000 USD ¿desea continuar?")){
                      $("#apuesta").submit();
                      }
                      }';
                      echo 'else  $("#apuesta").submit();';
                }
             
            }
          ?>
        

       
        
      })
      <?php 
        if (isset($_SESSION["tipo"])) {
          echo 'var t=90;
      setInterval(function(){
        t--;
        if (t<=0) {
            
           window.location="bienvenido.php";
        }
        $("#time").html(t);
      },1000);';
        }
      ?>
	</script>

</body>
</html>