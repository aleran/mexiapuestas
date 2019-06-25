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

    $sql="SELECT numeros FROM loteria WHERE id_sorteo='".$_POST["sorteo"]."'";
    $rs=mysqli_query($mysqli,$sql) or die(mysqli_error());
    $num=mysqli_num_rows($rs);

    if ($num > 29 ) {

      echo "<script>alert('Números: ".$_POST["numeros"]." no disponibles ya se completaron 30 fracciones');window.location='bienvenido_loteria.php'</script>";
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


          $saldo_final = $saldo - $_POST["monto"];

          $sql_as="UPDATE usuarios SET saldo='".$saldo_final."' WHERE cedula='".$_SESSION["usuario"]."'";
          $rs_as=mysqli_query($mysqli,$sql_as) or die(mysqli_error($mysqli));
              
        }
           
      }
      else {

        $sql_loteria="INSERT INTO loteria(id_sorteo,codigo,agencia,fecha,hora,numeros,monto,premio,ganar,activo) VALUES('".$_POST["sorteo"]."','".$ticket."','".$_SESSION['agencia']."','".fecha()."','".hora()."','".$_POST["numeros"]."','".$_POST["monto"]."','".$_POST["total"]."','3','1')";

      }


     
      $rs=mysqli_query($mysqli,$sql_loteria) or die(mysqli_error($mysqli));


      echo "<script>window.location='ticket_loteria.php?cod_t=".$ticket."'</script>";

    }

                          
           
                      
?>