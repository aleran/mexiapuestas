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
	 
	<div class="content">
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
		<!-- mostrar usuario o agencia -->
		<?php 
			include "../template/barra_usuario.php";
		?>
		<!-- modulo -->
		<div class="container-fluid">
			<br>
			<div class="row">
                    <div class="col-lg-6">
                        <?php 
                            if ($_SESSION["tipo"]=="root") {
                                $sql_r="SELECT * FROM usuarios WHERE cedula='".$_POST["usuario"]."' AND tipo='normal'";
                                $rs_r=mysqli_query($mysqli,$sql_r) or die (mysqli_error());
                                $num_r=mysqli_num_rows($rs_r);
                                if ($num_r < 1) {
                                    echo "<script>alert('usuario no existe');window.location='buscar_usuario.php'</script>";
                                }
                                $row=mysqli_fetch_array($rs_r);
                            }
                            else {
                                $sql_r="SELECT * FROM usuarios WHERE cedula='".$_POST["usuario"]."' AND tipo='normal' AND agencia='".$_SESSION["agencia"]."'";
                                $rs_r=mysqli_query($mysqli,$sql_r) or die (mysqli_error());
                                $num_r=mysqli_num_rows($rs_r);
                                if ($num_r < 1) {
                                    echo "<script>alert('usuario no existe');window.location='buscar_usuario.php'</script>";
                                }
                                $row=mysqli_fetch_array($rs_r);
                            }
                            

                            
                        ?>
                         <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Usuario</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Cédula:</b></td>
                                        <td><?php echo $row["cedula"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Nombres:</b></td>
                                        <td><?php echo $row["nombre"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Apellidos:</b></td>
                                        <td><?php echo $row["apellido"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>E-mail:</b></td>
                                        <td><?php echo $row["correo"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Saldo Disponible:</b></td>
                                        <td> $, <?php echo $row["saldo"]; ?></td>
                                        <input type="hidden" id="saldo" value="<?php echo $row["saldo"]; ?>">
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRecargas">Recargar</button>
                        <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modalPagar">Pagar</button>

                    </div>

                    <div class="col-lg-6">
                     <?php if ($_SESSION["tipo"]=="root"){ ?>
                        <h4>Historial de Transacciones</h4>
                        <?php 
                             $sql_trans="SELECT * FROM trans_usuario WHERE cedula='".$_POST["usuario"]."' ORDER BY id DESC";
                                $rs_trans=mysqli_query($mysqli,$sql_trans) or die (mysqli_error());
                            
                        ?>
                       
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <th>Trans</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Agente</th>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row_trans=mysqli_fetch_array($rs_trans)) {
                                            $sql_agente="SELECT nombre, apellido FROM usuarios WHERE cedula='".$row_trans["agente"]."'";
                                                $rs_agente=mysqli_query($mysqli,$sql_agente) or die (mysqli_error()); 
                                                $row_agente=mysqli_fetch_array($rs_agente);
                                                $agente=$row_agente["nombre"]." ". $row_agente["apellido"];
                                                list($a,$m,$d) = explode("-", $row_trans["fecha"]);
                                                $fecha_trans=$d."/".$m."/".$a;
                                            echo "<tr>";
                                                echo "<td>";
                                                    echo $row_trans["tipo"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $row_trans["monto"];
                                                echo "</td>";
                                                 echo "<td>";
                                                    echo $fecha_trans;
                                                echo "</td>";
                                                 echo "<td>";
                                                    echo $row_trans["hora"];
                                                echo "</td>";
                                                echo "<td>";
                                                    echo $agente;
                                                echo "</td>";
                                            echo "<tr>";

                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    </div>
                    
            </div>

            <!-- Modal Recargas -->

           <div class="modal fade" id="modalRecargas" tabindex="-1" role="dialog" aria-labelledby="modalRecargasLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalRecargasLabel">Recargar Saldo</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" method="POST" action="recargar.php">
                                
                                <div class="form-group">
                                    <label for="recarga" class="col-sm-4 control-label">Monto a recargar:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="recarga" id="recarga" placeholder="" required>
                                    </div>
                                        <input type="hidden" class="form-control" value="<?php echo $row["cedula"];?>" name="cedula" id="cedula">
                                </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-success">Recargar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

             <!-- Modal Pagar -->

             <div class="modal fade" id="modalPagar" tabindex="-1" role="dialog" aria-labelledby="modalPagarLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalPagarLabel">Pagar</h4>
                        </div>
                        <div class="modal-body">
                        
                            <form class="form-horizontal" method="POST" action="recargar.php">
                                
                                <div class="form-group">
                                    <label for="pagar" class="col-sm-4 control-label">Monto a pagar:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" name="pagar" id="pagar" placeholder="" required>
                                    </div>
                                        <input type="hidden" class="form-control" value="<?php echo $row["cedula"];?>" name="cedula" id="cedula">
                                </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button class="btn btn-success">Pagar</button>
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