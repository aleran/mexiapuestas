<!--
Autores: Guillermo Amaya & Alejandro Rángel
mexiapuestas - Apuestas Deportivas en Línea - Sólo para mayores de 18 años.
www.mexiapuestas.net
Colombia, 2017
-->
<!doctype html>
<html>
	<head>
	    <meta name="theme-color" content="#008000">
	<!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#008000">
		<title>.:Registro de Usuarios:.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Validation Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- fonts -->
		<link href="//fonts.googleapis.com/css?family=Muli:300,400" rel="stylesheet">
		<!-- /fonts -->
		<!-- css -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type='text/css' media="all" />
		<link href="css//registro/style.css" rel="stylesheet" type='text/css' media="all" />
		<!-- /css -->
	</head>
	<body>
		<h1 class="w3ls">REGÍSTRATE</h1>
			<div class="content-agileits">
				<form action="registro.php" name="registro" method="POST" data-toggle="validator" role="form">
					 <div class="form-group w3layouts w3 w3l">
                        <label for="pais" class="col-sm-4 control-label">País:</label>
                        <select  name="pais" id="pais" class="form-control" required>
                            <option value="">Seleccionar</option>
                            <?php
                                include("conexion/conexion.php"); 
                                $sql_pais="SELECT * FROM paises";
                                $rs_pais=mysqli_query($mysqli,$sql_pais) or die(mysqli_error());
                                while ($row_pais=mysqli_fetch_array($rs_pais)) {
                                    echo  '<option value='.$row_pais["id"].'>'.$row_pais["pais"].'</option>';
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group w3layouts w3 w3l">
                        <label for="agencia" class="col-sm-4 control-label">Agencia:</label>
                        <select  name="agencia" id="agencia" class="form-control" required>
                                        
                        </select>
                    </div>
		            <div class="form-group w3layouts w3 w3l">
						<label for="cedula" class="control-label">Documento de Identidad</label>
						<input type="text" class="form-control" name="cedula" id="cedula" placeholder="Ejm: 1020987533"  required>
						<div class="help-block with-errors"></div>
					</div>
		            
					<div class="form-group w3layouts w3 w3l">
						<label for="nombre" class="control-label">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ejm: José" data-error="Ingrese su nombre" required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group agileits w3layouts w3">
						<label for="apellido" class="control-label">Apellido</label>
						<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ejm: Pérez" data-error="Ingrese su apellido" required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group w3l agileinfo wthree w3-agileits">
						<label for="correo" class="control-label">Correo Electrónico</label>
						<input type="email" class="form-control" name="correo" id="correo" placeholder="Ejm: joseperez2017@gmail.com" data-error="El correo no es válido" required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group w3l agileinfo wthree w3-agileits">
						<label for="correo2" class="control-label">Confirmar Correo</label>
						<input type="email" class="form-control" name="correo2" id="correo2" placeholder="Ejm: joseperez2017@gmail.com" data-error="El correo no es válido" required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group agileinfo wthree w3-agileits agile">
						<label for="telefono" class="control-label">Teléfono</label>
						<input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Ejm: 301 7781555" data-error="Ingrese número de teléfono" required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group agileinfo wthree w3-agileits agile">
                        <label for="direccion" class="col-sm-4 control-label">Dirección:</label>
                            <textarea class="form-control" name="direccion" id="direccion"  rows="3" placeholder="Ejm: Bogota, Cll 185 #45" data-error="Ingrese direccion" required></textarea>
                            <div class="help-block with-errors"></div>
                    </div>
					<div class="form-group agile agileits-w3layouts w3-agile">
						<label for="clave" class="control-label">Contraseña</label>
						<div class="form-inline row">
							<div class="form-group col-sm-6 agileits-w3layouts">
								<input type="password" data-minlength="6" class="form-control" name="clave" id="clave" placeholder="Ingrese contraseña" required>
								<div class="help-block">Mínimo 6 Carácteres</div>
							</div>
							<div class="form-group col-sm-6 agileits-w3layouts">
								<input type="password" data-minlength="6" class="form-control" name="clave2" id="clave2" placeholder="Confirme contraseña" required>
								<div class="help-block"></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-lg">REGISTRARSE</button>
					</div>
				</form>
		    </div>
		<p class="copyright-w3ls">© 2018 Derechos Reservados mexiapuestas.net</b></p>
		<!-- js files -->
		<script src="js//registro/jquery-1.10.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js//registro/validator.min.js"></script>
		<script src="js/validacion_registro.js"></script>
		<script>
			$('#pais').on('change',function(){
	            var valor = $(this).val();
	             //alert(valor);
	            var dataString = 'pais='+valor;
	            
	            $.ajax({

	                url: "ajax/traer_agencias.php",
	                type: "POST",
	                data: dataString,
	                dataType: "html",
	                success: function (resp) {
	               
	                    $("#agencia").html(resp);                        
	                    console.log(resp);
	                },
	                error: function (jqXHR,estado,error){
	                    alert("error");
	                    console.log(estado);
	                    console.log(error);
	                },
	                complete: function (jqXHR,estado){
	                    console.log(estado);
	                }

	                        
	            })
                
        	});
		</script>
		<!-- /js files -->
	</body>
</html>