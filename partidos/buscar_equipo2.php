<?php
include("../conexion/conexion.php");
include("../sesiones/time_sesion.php");
list($equipo, $deporte) = explode("/", $_POST["equipo"]);
$sql = mysqli_query($mysqli,"SELECT * FROM equipos WHERE id_deporte='".$deporte."' AND equipo like '%" . $equipo . "%'");
while($row=mysqli_fetch_array($sql)){
	$equipo2_selec=$row['equipo'];
	echo "<div class='suggest-element3'><a data-equipo='".$row["equipo"]."' id='".$row["id"]."'>$equipo2_selec</a></div>";
}
?>