
<!--
Autores: Guillermo Amaya & Alejandro Rángel
mexiapuestas - Apuestas Deportivas en Línea - Sólo para mayores de 18 años.
www.mexiapuestas.net
Colombia, 2017
-->
<!DOCTYPE html>
<html>
	<head>
	    <meta name="theme-color" content="#008000">
	<!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#008000">
		<title>.:Contáctanos:.</title>
		<!--fuentes-->
			<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
			<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>	
		   <link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
		<!--//fuentes-->		
			<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
			<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	        <link href="fonts/style.css" rel="stylesheet" type="text/css" media="all" />
	        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	       
		<!-- Dispositivos Móviles -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="keywords" content="Sistema Web de Apuestas Deportivas tipo Parley en Colombia" />
			<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //Dispositivos Móviles -->
		<!-- javascript -->
			<script src="js/jquery.min.js"></script>
		<!-- javascript -->
	</head>
    
    <!-- Fecha Sistema -->
    
    <div style="float:right;">
		<script type="text/javascript">
		//<![CDATA[
		function makeArray() {
		for (i = 0; i<makeArray.arguments.length; i++)
		this[i + 1] = makeArray.arguments[i];}
		var months = new makeArray('Enero','Febrero','Marzo','Abril','Mayo',
		'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
		var date = new Date();
		var day = date.getDate();
		var month = date.getMonth() + 1;
		var yy = date.getYear();
		var year = (yy < 1000) ? yy + 1900 : yy;
		document.write("Hoy es: " + day + " de " + months[month] + " de " + year);
		//]]>
		</script>
	</div>
  <!-- Fecha Sistema -->
    
      <!-- Hora Sistema (24H) -->


<div id="reloj" style="font-size:14px;"></div>

  <!-- Hora Sistema (24H) -->

      <!-- Contenido Sistema -->
    
	<body>

	 
	<!-- header -->
	<?php 
		include "template/header.php";
	?>
	<!-- //header -->
	<!-- banner -->
	<?php 
		include "template/social.html";
	?>
	<!-- banner -->
	<!-- //header -->
	<div class="container">
			 <ol class="breadcrumb">
			  <li><a href="index.html">Inicio</a></li>
			  <li class="active">Contacto</li>
			 </ol>
	</div>
	<!-- //header -->
	<div class="contact">
		 <div class="container">
			 <div class="contact-grids">
				 <h2><center>CONTACTO</center></h2>
				
				 <div class="contact-icons">
					<!--<div class="contact-grid">
						<div class="contact-fig">
							<span> </span>
						</div>
						<p>CEL SOPORTE (Colombia): (+57) 322 7425787</p>
						<p>CEL SOPORTE (Colombia): (+57) 311 5274827</p>
	                    <p></p>
					</div>
					<div class="contact-grid">
						<div class="contact-fig1">
							<span> </span>
						</div>
						<p>Bogotá D.C, Colombia</p>
	                    <p>Bogotá D.C, Colombia</p>
					</div>-->
					<div class="contact-grid">
						<div class="contact-fig2">
							<span> </span>
						</div>
						<p>info@mexiapuestas.net</p>
	                    <p>clientes@mexiapuestas.net</p>
					</div>
					<div class="clearfix"> </div>
				 </div>
				 <form action="enviar_contacto.php" method="POST">
					<input type="text" name="nombre" placeholder="Nombre y Apellido" required=" ">
					<input type="text" name="email" placeholder="Correo Electrónico" required=" ">
					<input type="text" name="telefono" placeholder="Teléfono" required=" ">
					<textarea name="mensaje" placeholder="Redacte su mensaje" required=" "></textarea>
					<input name="enviar" type="submit" value="ENVIAR">
				 </form>
			 </div>
		 </div>
	</div>
	<!-- contact -->

	<!--footer-->
	<?php 
		include "template/footer.html";
	?>
	<!-- //footer -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/hora.js"></script>
		<script>
			//script para menu
			$("span.menu").click(function(){
				$(".top-menu ul").slideToggle("slow" , function(){
					});
			});

		</script>	 
	</body>
</html>