<?php 
	include("../sesiones/time_sesion.php");
	if ($_SESSION['tipo']=="normal" || $_SESSION['tipo']=="taquilla") {
          header("Location: bienvenido.php");
      }  
    include("../conexion/conexion.php");
    echo " <style>#ticket {
                        width: 302px;
                        text-align:justify;
                    }</style>";
    if (isset($_POST["recarga"])) {
    	$sql_s="SELECT saldo FROM usuarios WHERE cedula='".$_POST["cedula"]."'";
	    $rs_s=mysqli_query($mysqli,$sql_s) or die(mysqli_error());
	    $row_s=mysqli_fetch_array($rs_s);
	    $saldo_final = $row_s["saldo"] + $_POST["recarga"];

	    $sql_recarga="UPDATE usuarios SET saldo='".$saldo_final."' WHERE cedula='".$_POST["cedula"]."'";
	    $rs_recarga=mysqli_query($mysqli,$sql_recarga) or die(mysqli_error($mysqli));

	    $sql_trans="INSERT INTO trans_usuario VALUES(null, '".$_SESSION["agencia"]."', '".$_POST["cedula"]."', '".date("Y-m-d")."', '".date("H:i:s")."', 'recarga','".$_POST["recarga"]."','".$_SESSION["usuario"]."')";
	    $rs_trans=mysqli_query($mysqli,$sql_trans) or die(mysqli_error($mysqli));

	    $sql_agen="SELECT agencia FROM agencias WHERE id='".$_SESSION["agencia"]."'";
	    $rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
	    $row_agen=mysqli_fetch_array($rs_agen);
	    echo '<div id="ticket">';
          echo "www.eurobet.com.co<br>";
          echo "Agencia: ".$row_agen["agencia"]."<br>";
          list($a,$m,$d)= explode("-",date("Y-m-d"));
          $fecha = $d."/".$m."/".$a;
          echo "Fecha: ".$fecha." ".date("H:i:s")."<br>";
          echo "Recarga<br><br>";

          $sql_user="SELECT nombre, apellido FROM usuarios WHERE cedula='".$_POST["cedula"]."'";
          $rs_user=mysqli_query($mysqli, $sql_user) or die (mysql_error());
          $row_user=mysqli_fetch_array($rs_user);
          echo "Cedula del Usuario: ".$_POST["cedula"]."<br>";
          echo "Nombre y Apellido: ".$row_user["nombre"]. " ".$row_user["apellido"]."<br>";
          echo "Monto Recargado: ".$_POST["recarga"]."<br><br>";

                            
          echo "Conozco y acepto las reglas de EUROBET.<br>";
          echo "</div><br>";
      echo "<script>window.print();</script>";
	    echo "<script>alert('recarga realizada');window.location='buscar_usuario.php';</script>";
    }

     if (isset($_POST["pagar"])) {

    	$sql_s="SELECT saldo FROM usuarios WHERE cedula='".$_POST["cedula"]."'";
	    $rs_s=mysqli_query($mysqli,$sql_s) or die(mysqli_error());
	    $row_s=mysqli_fetch_array($rs_s);

	    if ($row_s["saldo"] >= $_POST["pagar"]) {
     		$saldo_final = $row_s["saldo"] - $_POST["pagar"];

	    	$sql_pagar="UPDATE usuarios SET saldo='".$saldo_final."' WHERE cedula='".$_POST["cedula"]."'";
	    	$rs_pagar=mysqli_query($mysqli,$sql_pagar) or die(mysqli_error($mysqli));

	    	$sql_trans="INSERT INTO trans_usuario VALUES(null, '".$_SESSION["agencia"]."', '".$_POST["cedula"]."', '".date("Y-m-d")."', '".date("H:i:s")."', 'pago','".$_POST["pagar"]."','".$_SESSION["usuario"]."')";
	    	$rs_trans=mysqli_query($mysqli,$sql_trans) or die(mysqli_error($mysqli));
	    	echo "<script>alert('Pago realizado');window.location='buscar_usuario.php';</script>";
     	}
     	else {
     		echo "<script>alert('saldo insuficiente para pagar esa cantidad');window.location='buscar_usuario.php';</script>";
     	}
	    
    }
    


?>