<?php 
    include("../conexion/conexion.php");
	include("../sesiones/time_sesion.php");  
    $sql="UPDATE loteria set push='".$_POST["push"]."', premio_final='".$_POST["premio"]."' WHERE codigo='".$_POST["codigo"]."'";
    $rs=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    echo "<script>window.location='con_activo.php?codigo=".$_POST["codigo"]."&desde=".$_POST["desde"]."&hasta=".$_POST["hasta"]."'</script>";
   
?>