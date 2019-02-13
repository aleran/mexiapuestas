<?php
	ini_set("display_errors", 1);
	include("../conexion/conexion.php");
	
	$sql="SELECT id,agencia FROM agencias WHERE pais='".$_POST["pais"]."' AND id != 1 ORDER BY FIELD(id,'5') DESC";
	$rs=mysqli_query($mysqli,$sql) or die(mysql_error());
	
	echo"<option value=''> Seleccionar</option>";
	while ( $row=mysqli_fetch_array($rs)) {
		echo"<option value=".$row["id"].">".$row["agencia"]."</option>";
	}
?>