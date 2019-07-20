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
	<title>.:Bienvenido:.</title>
	
	<!--Fuentes-->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
	<link rel="stylesheet" href="css/estilos_menu.css">
	<link rel="stylesheet" type="text/css" href="css/virtual-key.css">
	
	<!--Fuentes-->
	<style>
		input[type=number] { -moz-appearance:textfield; }
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
  			-webkit-appearance: none; 
  			margin: 0; 
		}

		.disp{
			color: #04B700;
			font-size: 20px;
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
			if ($_SESSION["tipo"]=="normal") {
				include "template/menu_normal_l.php";
			}
			else {
				include "template/menu_agencias_l.php";
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
				<div class="col-sm-7 col-sm-offset-2">
					<?php  
						$sql="SELECT n.sorteo, n.dia, n.hora, s.id, s.fecha FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE s.id='".$_GET["sorteo"]."'";
						$rs=mysqli_query($mysqli, $sql);
						$row=mysqli_fetch_array($rs);
						$num=mysqli_num_rows($rs);

	 					$mod_date = strtotime($row["hora"]."- 1 minute");
                        $fecha_suma= date("H:i:s",$mod_date);

                        
						if (date("Y-m-d H:i:s") > $row["fecha"]." ".$fecha_suma ) {

							$sql_as="UPDATE sorteos SET inicio=1 WHERE id='".$_GET["sorteo"]."'";
							$rs_as=mysqli_query($mysqli, $sql_as);
							$row_as=mysqli_fetch_array($rs_as);
							echo "<script>alert('Sorteo no disponible para apostar');window.location='bienvenido.php';</script>";
						} 
		
                      
						
					?>
					<h3>Sorteo: <?php echo $row["sorteo"]." (".$row["dia"].")"; ?></h3>
					<h4>Fecha del Sorteo: <?php echo $row["fecha"]." ".$row["hora"]; ?></h4>
					<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Números disponibles</button>
					
				</div>
				<form action="apuesta_loteria.php" method="POST" name="jugadas">
				<div class="col-sm-6 col-sm-offset-1">
					
					
					<div class="numeros">Números seleccionados: <br><span id="numeros"></span></div>

					<table class="table_teclado" border="1">
						<tr class="center">
							<td class="">1</td>
							<td>2</td>
							<td>3</td>
						</tr>
						<tr>
							<td>4</td>
							<td>5</td>
							<td>6</td>
						</tr>
						<tr>
							<td>7</td>
							<td>8</td>
							<td>9</td>
						</tr>
						<tr>
							<td colspan="2">0</td>
							<td><img class="btn_delete" src="images/borrar.png"></td>
						</tr>
					</table><br>
					<center>
						<div class="form-group">
							<label for="frac">Fracciones:</label> 
							<input type="number" class="form-control" name="fracciones" id="frac" required value="">
						</div>

					<?php if ($_SESSION["tipo"]=="admin") { ?>
                         <div class="form-group">
                          <label for="nombre_cliente" style="color: black;">Nombre Cliente<small style="color:red;"> *</small></label>
                          <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                          <label for="tel_cliente" style="color: black;">Teléfono Cliente: </label>
                          <input type="tel" class="form-control" id="tel_cliente" name="tel_cliente" autocomplete="off">
                        </div>
                      <?php } ?>
				</div>
				<div class="col-sm-4 ganancias">
							Valor del boleto: <br> $<span class="monto">150</span><br>
							Ganancia: <br> $<span class="total">10000</span><br>
						
				</div>

				<div class="row">

					<div class="col-sm-6 col-sm-offset-4">

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
                    <br>
                     <?php 
                        if ($_SESSION["tipo"]=="normal") {
                          echo '<span>Saldo: '.$row_saldo["saldo"].'</span><br>';
                        }
                      ?>
					</div>	
				</div>
				<div class="row">
					<div class="col-sm-3 col-sm-offset-4">
						
							<?php 
	                        if ($_SESSION["tipo"]=="normal") {
	                          echo '<input type="hidden" name="saldo" id="saldo" value="'.$row_saldo["saldo"].'">';
	                        }
	                      ?>
	                     	<?php if ($_SESSION["pais"] ==1) { ?>

							<br><input type="tel" name="monto" id="monto" placeholder="Monto a apostar" class="form-control">

							<?php }else{ ?>
							<br><input type="hidden" name="monto" id="monto" placeholder="Monto a apostar" class="form-control" value="150">
							<?php } ?>
							<input type="hidden" readonly id="total" name="total">
							
						
					</div>
				</div>
				
				<div class="row">

					<div class="col-sm-3 col-sm-offset-5 col-xs-offset-5">

							<input type="hidden" readonly id="campo" name="numeros" class="teclado_text">
							
							<input type="hidden" id="sorteo" name="sorteo" value="<?php echo $row["id"]; ?>">
							

							
								<button class="btn btn-primary">Apostar</button>
							
						</form>
					</div>
				</div>
			</div>
			
		</div>
		<!--modal-->
	<div id="myModal" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                
	                <h4 class="modal-title"><center><b>Números disponibles</b></center></h4>
	            </div>
	            <div class="modal-body">
	                <?php 

	                	$sql_frac="SELECT numeros FROM loteria_frac WHERE fracciones='30' AND id_sorteo='".$_GET["sorteo"]."' ORDER BY numeros";
						$rs_frac=mysqli_query($mysqli, $sql_frac);
						
						$t_numeros=["00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91","92","93","94","95","96","97","98","99"];
						while ($row_frac=mysqli_fetch_array($rs_frac)) {
							$indice= array_search($row_frac["numeros"],$t_numeros);
							unset($t_numeros[$indice]);
							
						}
						
						foreach ($t_numeros as $num) {

							echo "<span class='disp'>".$num."</span> ";
						}
	                 ?>
	                
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-success" id="continuar" data-dismiss="modal" Title="">Cerrar</button>
	            </div>
	        </div>
	    </div>
	</div>
		<?php 
			include "template/modal_registro.php";
		?>
		
	
	
	<script src="js/hora.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/validacion_registro.js"></script>
	<!--<script type="text/javascript" src="js/virtual-key.js"></script>-->
	<script>

		/*$(".table_teclado").click(function(){
			//Almacenamos los valores
			nombre=$('#campo').val();
			
		   //Comprobamos la longitud de caracteres
			if (nombre.length > 4){
                alert("Debe seleccionar 4 números");
                e.preventDefault();
            }

		})*/

		var resultado;
		<?php if ($_SESSION["pais"]==1) { ?>

		$('.table_teclado tr td').click(function(){
		$("#monto").val("");
		$("#total").val("");
		$(".total").text("");
	        

		var number = $(this).text();
		
		if (number == '')
		{
			$('#campo').val($('#campo').val().substr(0, $('#campo').val().length - 1));
			$('#numeros').text($('#numeros').text().substr(0, $('#numeros').text().length - 1));
		}
		else
		{
			$('#campo').val($('#campo').val() + number);
			$('#numeros').text($('#campo').val());

		}

	});

			$("#monto").keyup(function(){
	       
		        //console.log(monto);
		        var monto = $("#monto").val();
		       
		        

		        if ($('#campo').val().length == 2) {

		        	resultado = monto * 50;
		        	
		        }

		        else if($('#campo').val().length == 3){
		        	resultado = monto * 400;
		        	

		        }
		        else {
		        	resultado = monto * 4500;
		        	
		        }
		        $("#total").val(resultado);
		        $(".total").text(resultado);

      		})

		<?php } else {?>

			$('.table_teclado tr td').click(function(){
				$("#total").val("");
				$(".total").text("");
	        

				var number = $(this).text();
				
				if (number == '')
				{
					$('#campo').val($('#campo').val().substr(0, $('#campo').val().length - 1));
					$('#numeros').text($('#numeros').text().substr(0, $('#numeros').text().length - 1));
					$("#frac").val("");
					$("#monto").val("");
					$(".monto").text("");
				}
				else
				{
					$('#campo').val($('#campo').val() + number);
					$('#numeros').text($('#campo').val());
					$("#frac").val("");
					$("#monto").val("150");
					$(".monto").text("150");
				

				}
				 if ($('#numeros').text().length > 2) {
				 		alert("solo se permiten 2 cifras");
				 		$('#campo').val("");
						$('#numeros').text("");
						$("#frac").val("");
			        	
			        }

			    else {
			        
			        resultado = 10000;	
			    }

			    $("#total").val(resultado);
			    $(".total").text(resultado);

			});

			$("#frac").keyup(function(){
	       		 $("#monto").val(150);
		        $(".monto").text(150);
		        //console.log(monto);
		        var frac = $("#frac").val();
		      
		      		resultado=10000;
		      	

		      	if (frac !="") {
		      	if (frac >30 || frac <1) {
		      		alert("las fracciones deben estar entre 1 y 30")
		      		$("#frac").val("");
		      		$("#monto").val("0");
					$(".monto").text("0");
					$("#total").val("0");
			    	$(".total").text("0");
		      	}else{

		      		resultado = resultado * frac;
		        
		        monto=$("#monto").val();
		        if (monto == 0) {
		      		monto=150;
		      	}
		        monto= monto * frac;
		        
		      

		        $("#monto").val(monto);
		        $(".monto").text(monto);

		        $("#total").val(resultado);
		        $(".total").text(resultado);

		      	}
				}

      		})

			

		<?php } ?>
		
		
		 var formul = document.jugadas,
        validar = function validar(e){

        	var nombre=$('#campo').val();
        	var monto=$('#monto').val();
        	<?php if ($_SESSION["pais"]==1) { ?>

	            if (monto < 500) {
	            	alert("Monto debe ser de $500 en adelante");
	                e.preventDefault();
	                $("#monto").focus();
	            }
	        <?php }else{ ?>

	        	  if ($('#numeros').text().length < 2 || $('#numeros').text().length > 2) {
	        	  	alert("Solo se permiten 2 cifras");
	        	  	e.preventDefault();
	        	  }

	        <?php } ?>
	       	<?php if ($_SESSION["pais"]==1) { ?>
           if (nombre.length > 4){
                alert("Debe seleccionar 4 números");
                e.preventDefault();
            }
            else if (nombre.length < 2) {
            	alert("Debe seleccionar 2 números en adelante");
            	e.preventDefault();
            }
            <?php  if ($_SESSION["tipo"]=="normal") { ?>

				if (parseInt($("#saldo").val()) < parseInt($("#monto").val())) {
					alert("El saldo es insuficiente para realizar la apuesta");
					e.preventDefault();
             	}
            <?php } }?>
         
        }
     formul.addEventListener("submit", validar)
			
			

      <?php 
        if (isset($_SESSION["tipo"])) {
          echo 'var t=120;
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