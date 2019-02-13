<?php  
	include("conexion/conexion.php");
    include("sesiones/time_sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <meta name="theme-color" content="#008000">
	<!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#008000">
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>.:Saldos:.</title>
	
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
				<?php
                          if ($_SESSION["tipo"]=="root") {

                            $sql="SELECT agencia FROM agencias WHERE id='".$_POST["agencia"]."'";
                                $rs=mysqli_query($mysqli,$sql);
                                $row=mysqli_fetch_array($rs);

                            $sql_sum="SELECT SUM(monto) AS t_monto FROM parlay WHERE agencia='".$_POST["agencia"]."' AND activo='1' AND cedula='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_sum=mysqli_query($mysqli,$sql_sum) or die(mysqli_error());
                            $row_sum=mysqli_fetch_array($rs_sum);


                            $sql_perdi="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM parlay WHERE agencia='".$_POST["agencia"]."' AND ganar='1' AND activo='1' AND cedula='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_perdi=mysqli_query($mysqli,$sql_perdi) or die(mysqli_error());
                             $row_perdi=mysqli_fetch_array($rs_perdi);

                            $total_perdido=$row_perdi["arr_perdido"];
                            
                            $total=  $row_sum["t_monto"] - $total_perdido;

                            $sql_recargas="SELECT SUM(monto) AS t_recargas FROM trans_usuario WHERE agencia='".$_POST["agencia"]."' AND tipo='recarga' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_recargas=mysqli_query($mysqli,$sql_recargas) or die(mysqli_error());
                            $row_recargas=mysqli_fetch_array($rs_recargas);

                            $sql_pagos="SELECT SUM(monto) AS t_pagos FROM trans_usuario WHERE agencia='".$_POST["agencia"]."' AND tipo='pago' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_pagos=mysqli_query($mysqli,$sql_pagos) or die(mysqli_error());
                            $row_pagos=mysqli_fetch_array($rs_pagos);
                        }
                        else {
                            $sql="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                                $rs=mysqli_query($mysqli,$sql);
                                $row=mysqli_fetch_array($rs);

                            $sql_sum="SELECT SUM(monto) AS t_monto FROM parlay WHERE agencia='".$_SESSION["agencia"]."' AND activo='1' AND cedula='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_sum=mysqli_query($mysqli,$sql_sum) or die(mysqli_error());
                            $row_sum=mysqli_fetch_array($rs_sum);


                            $sql_perdi="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM parlay WHERE agencia='".$_SESSION["agencia"]."' AND ganar='1' AND activo='1' AND cedula='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_perdi=mysqli_query($mysqli,$sql_perdi) or die(mysqli_error());
                             $row_perdi=mysqli_fetch_array($rs_perdi);

                            $total_perdido=$row_perdi["arr_perdido"];
                            
                            $total=  $row_sum["t_monto"] - $total_perdido;

                            $sql_recargas="SELECT SUM(monto) AS t_recargas FROM trans_usuario WHERE agencia='".$_SESSION["agencia"]."' AND tipo='recarga' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_recargas=mysqli_query($mysqli,$sql_recargas) or die(mysqli_error());
                            $row_recargas=mysqli_fetch_array($rs_recargas);

                            $sql_pagos="SELECT SUM(monto) AS t_pagos FROM trans_usuario WHERE agencia='".$_SESSION["agencia"]."' AND tipo='pago' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_pagos=mysqli_query($mysqli,$sql_pagos) or die(mysqli_error());
                            $row_pagos=mysqli_fetch_array($rs_pagos);
                        }

                    ?>
                 </div>   
                <div class="row">
                    
                      <div class="col-sm-6 col-xs-offset-3">
                    <?php
                        if ($_SESSION["tipo"]=="root") {
                            echo '<h3><center>Resumen económico para la Agencia:&nbsp;'; echo $row ["agencia"]; echo '</center></h3>';
                        }

                        else {
                            echo '<h3>Resumen Económico</h3>';
                        }
                    ?>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <?php 
                                    list($a,$m,$d)=explode("-", $_POST["desde"]);
                                    $f1=$d."/".$m."/".$a;
                                    list($a2,$m2,$d2)=explode("-", $_POST["hasta"]);
                                    $f2=$d2."/".$m2."/".$a2;
                                ?>
                                <th colspan="2">Balance desde: <?php echo $f1; ?> hasta: <?php echo $f2; ?></th>
                            </thead>
                            <tbody>
                               
                                <tr><td><b>Apostado:</b></td> <td>$ <?php echo $row_sum["t_monto"]; ?> </td></tr>
                                <tr><td><b>Perdido:</b></td> <td>$ <?php echo $total_perdido; ?></td></tr>
                                <tr><td><b>Total:</b></td> <td>$ <?php echo $total; ?></td></tr>
                                <tr><td><em>Valores expresados en su moneda local</em></td> <td><br></tr>
                            </tbody>
                        </table>   
                    </div>
                    
                    </div>
            </div>

                <!--consulta de usuarios registrados-->
            <?php
                        if ($_SESSION["tipo"]=="root") {

                            $sql1="SELECT agencia FROM agencias WHERE id='".$_POST["agencia"]."'";
                                $rs1=mysqli_query($mysqli,$sql1);
                                $row1=mysqli_fetch_array($rs1);

                            $sql_sum1="SELECT SUM(monto) AS t_monto FROM parlay WHERE agencia='".$_POST["agencia"]."' AND activo='1' AND cedula!='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_sum1=mysqli_query($mysqli,$sql_sum1) or die(mysqli_error());
                            $row_sum1=mysqli_fetch_array($rs_sum1);


                            $sql_perdi1="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM parlay WHERE agencia='".$_POST["agencia"]."' AND ganar='1' AND activo='1' AND cedula!='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_perdi1=mysqli_query($mysqli,$sql_perdi1) or die(mysqli_error());
                             $row_perdi1=mysqli_fetch_array($rs_perdi1);

                            $total_perdido1=$row_perdi1["arr_perdido"];
                            
                            $total1=  $row_sum1["t_monto"] - $total_perdido1;
                        }
                        else {
                            $sql1="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
                                $rs1=mysqli_query($mysqli,$sql1);
                                $row1=mysqli_fetch_array($rs1);

                            $sql_sum1="SELECT SUM(monto) AS t_monto FROM parlay WHERE agencia='".$_SESSION["agencia"]."' AND activo='1' AND cedula!='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_sum1=mysqli_query($mysqli,$sql_sum1) or die(mysqli_error());
                            $row_sum1=mysqli_fetch_array($rs_sum1);


                            $sql_perdi1="SELECT SUM(monto) AS m_perdido, SUM(premio) AS arr_perdido FROM parlay WHERE agencia='".$_SESSION["agencia"]."' AND ganar='1' AND activo='1' AND cedula!='' AND (fecha BETWEEN '".$_POST["desde"]."' AND '".$_POST["hasta"]."')";
                            $rs_perdi1=mysqli_query($mysqli,$sql_perdi1) or die(mysqli_error());
                             $row_perdi1=mysqli_fetch_array($rs_perdi1);

                            $total_perdido1=$row_perdi1["arr_perdido"];
                            
                            $total1=  $row_sum1["t_monto"] - $total_perdido1;
                        }

                    ?>
                <div class="row">
                    
                    <div class="col-sm-6 col-xs-offset-3">
                    <?php
                  
                            echo '<h3>Cuentas de Jugadas Online</h3>';
                        
                    ?>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <?php 
                                    list($a,$m,$d)=explode("-", $_POST["desde"]);
                                    $f1=$d."/".$m."/".$a;
                                    list($a2,$m2,$d2)=explode("-", $_POST["hasta"]);
                                    $f2=$d2."/".$m2."/".$a2;
                                ?>
                                <th colspan="2">Balances desde: <?php echo $f1; ?> hasta: <?php echo $f2; ?></th>
                            </thead>
                            <tbody>
                               
                                <tr><td><b>Apostado:</b></td> <td>$ <?php echo $row_sum1["t_monto"]; ?></td></tr>
                                <tr><td><b>Perdido:</b></td> <td>$ <?php echo $total_perdido1; ?></td></tr>
                                <tr><td><b>Total:</b></td> <td>$ <?php echo $total1; ?></td></tr>
                                <tr><td><em>Valores expresados en su manera local</em></td> <td><br></tr>
                            </tbody>
                        </table>   
                    </div>
                    
                    </div>
            </div>

            <div class="row">
                    
                    <div class="col-sm-6 col-xs-offset-3">
                    <?php
                  
                            echo '<h3>Recargas y Pagos a usuarios</h3>';
                        
                    ?>
                    
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <?php 
                                    list($a,$m,$d)=explode("-", $_POST["desde"]);
                                    $f1=$d."/".$m."/".$a;
                                    list($a2,$m2,$d2)=explode("-", $_POST["hasta"]);
                                    $f2=$d2."/".$m2."/".$a2;
                                ?>
                                <th colspan="2">Balance desde: <?php echo $f1; ?> hasta: <?php echo $f2; ?></th>
                            </thead>
                            <tbody>
                               
                                <tr><td><b>Recargas:</b></td> <td>$ <?php echo $row_recargas["t_recargas"]; ?></td></tr>
                                <tr><td><b>Pagos:</b></td> <td>$ <?php echo $row_pagos["t_pagos"]; ?></td></tr>
                                
                                <tr><td><em>Valores expresados en su moneda local</em></td> <td><br></tr>
                            </tbody>
                        </table>   
                    </div>
                    
                    </div>
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

</body>
</html>


