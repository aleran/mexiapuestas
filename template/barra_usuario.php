<?php 
	  if($_SESSION["tipo"]=="normal"){
	      $sql_normal="SELECT nombre,apellido FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
	      $rs_normal=mysqli_query($mysqli,$sql_normal) or die(mysqli_error());
	      $row_normal=mysqli_fetch_array($rs_normal);
	          echo "<div id='bar'><span id='user'>Usuario: ". $row_normal["nombre"].", ".$row_normal["apellido"]."";
	          echo '<a href="https://www.mexiapuestas.com/sesiones/cerrar_sesion.php"> (Cerrar Sesión)</a></h4></span></div>'; 
	  }
	  else {
	       $sql_ag="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
	       $rs_ag=mysqli_query($mysqli,$sql_ag);
	       $row_ag=mysqli_fetch_array($rs_ag);
	       echo "<div id='bar'><span id='user'>Agencia: ". $row_ag["agencia"];
	       echo '<a href="https://www.mexiapuestas.com/sesiones/cerrar_sesion.php"> (Cerrar Sesión)</a></h4></span></div>'; 
	  }
?> 
                      
