<?php
  include("conexion/conexion.php");
   include("sesiones/time_sesion.php"); 
   include("lib/fecha_hora.php");
   error_reporting(-1);
 
// No mostrar los errores de PHP
error_reporting(0);
 
// Motrar todos los errores de PHP
error_reporting(E_ALL);
 
// Motrar todos los errores de PHP
ini_set('error_reporting', E_ALL);

   if ($_SESSION["pais"]==1 || $_POST["pais"]==1) {
        date_default_timezone_set('America/Bogota');
        
    }
    else {
      date_default_timezone_set('America/Mexico_City');
      
    } 

    $sql="SELECT fracciones FROM loteria_frac WHERE id_sorteo='".$_POST["sorteo"]."' AND numeros='".$_POST["numeros"]."'";
    $rs=mysqli_query($mysqli,$sql) or die(mysqli_error());
    $num=mysqli_num_rows($rs);
    $row_f=mysqli_fetch_array($rs);

    
    $frac_total=$_POST["fracciones"]+$row_f["fracciones"];
    $frac_disp= 30 - $row_f["fracciones"];

    if ($frac_total > 30 ) {

      echo "<script>alert('Números: ".$_POST["numeros"]." con  ".$frac_disp." Fracciones Disponibles. Por favor vuelva a realizar la apuesta');window.location='bienvenido_loteria.php'</script>";
    }
    else {

      if (isset($_SESSION["tipo"])) {
        do {
          $caracteres = "1234567890"; //posibles caracteres a usar
          $numerodeletras=8; //numero de letras para generar el texto
          $ticket =$_SESSION['agencia']."-". ""; //variable para almacenar la cadena generada
          for($i=0;$i<$numerodeletras;$i++)
          {
            $ticket .=substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
            entre el rango 0 a Numero de letras que tiene la cadena */
          }
          $sql="SELECT codigo FROM loteria";
          $rs=mysqli_query($mysqli,$sql) or die(mysqli_error());
          while (($row=mysqli_fetch_array($rs)) && ($ticket !="")) {
            if (($row["codigo"]==$ticket)) $ticket="";
                    
          }
   
        } while ($ticket=="");
                         

      }

      
      if ($_SESSION["tipo"]=="normal") {

        $sql_s="SELECT saldo FROM usuarios WHERE cedula='".$_SESSION["usuario"]."'";
        $rs_s=mysqli_query($mysqli,$sql_s) or die(mysqli_error());
        $row_s=mysqli_fetch_array($rs_s);
        $saldo = $row_s["saldo"];

        if ($_POST["monto"] > $saldo) {
          header('Location: competiciones.php');
        }

        else if ($_POST["monto"] <= $saldo){

           $sql_loteria="INSERT INTO loteria(id_sorteo,codigo,agencia,cedula,fecha,hora,numeros,monto,premio,ganar,activo) VALUES('".$_POST["sorteo"]."','".$ticket."','".$_SESSION['agencia']."', '".$_SESSION['usuario']."', '".fecha()."','".hora()."','".$_POST["numeros"]."','".$_POST["monto"]."','".$_POST["total"]."','3','1')";

           $rs=mysqli_query($mysqli,$sql_loteria) or die(mysqli_error($mysqli));


          $saldo_final = $saldo - $_POST["monto"];

          $sql_as="UPDATE usuarios SET saldo='".$saldo_final."' WHERE cedula='".$_SESSION["usuario"]."'";
          $rs_as=mysqli_query($mysqli,$sql_as) or die(mysqli_error($mysqli));

          if ($num > 0) {

          $total_frac=$row["fracciones"] + $_POST["fracciones"];

          $sql_frac="UPDATE loteria_frac SET fracciones='".$total_frac."' WHERE id_sorteo='".$_POST["sorteo"]."' AND numeros='".$_POST["numeros"]."'";
          $rs_frac=mysqli_query($mysqli,$sql_frac) or die(mysqli_error($mysqli));
          
        }else{

          $sql_frac="INSERT INTO loteria_frac(id_sorteo,numeros,fracciones) VALUES('".$_POST["sorteo"]."','".$_POST["numeros"]."','".$_POST["fracciones"]."')";

          $rs_frac=mysqli_query($mysqli,$sql_frac) or die(mysqli_error($mysqli));

        }
              
        }
           
      }
      else {


        $sql_loteria="INSERT INTO loteria(id_sorteo,codigo,agencia,fecha,hora,numeros,monto,premio,ganar,activo) VALUES('".$_POST["sorteo"]."','".$ticket."','".$_SESSION['agencia']."','".fecha()."','".hora()."','".$_POST["numeros"]."','".$_POST["monto"]."','".$_POST["total"]."','3','1')";

        $rs=mysqli_query($mysqli,$sql_loteria) or die(mysqli_error($mysqli));

        if ($num > 0) {

          $total_frac=$row_f["fracciones"] + $_POST["fracciones"];

          $sql_frac="UPDATE loteria_frac SET fracciones='".$total_frac."' WHERE id_sorteo='".$_POST["sorteo"]."' AND numeros='".$_POST["numeros"]."'";
          $rs_frac=mysqli_query($mysqli,$sql_frac) or die(mysqli_error($mysqli));
          
        }else{

          $sql_frac="INSERT INTO loteria_frac(id_sorteo,numeros,fracciones) VALUES('".$_POST["sorteo"]."','".$_POST["numeros"]."','".$_POST["fracciones"]."')";

          $rs_frac=mysqli_query($mysqli,$sql_frac) or die(mysqli_error($mysqli));

        }

      }




      echo "<script>window.location='ticket_loteria.php?cod_t=".$ticket."'</script>";

    }

                          
           
                      
?>