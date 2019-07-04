<style>
    .ganador {
        color: #26DA14;
        font-weight: bold;
    }
    .perdedor {
       color: #FF0000;
       font-weight: bold;
    }
    .push {
        color: #FBF600;
        font-weight: bold;
    }
</style>
<?php
if (isset($_GET["cod_t"])) {
    $sql_ticket="SELECT codigo, id_sorteo, agencia,fecha, hora, numeros, monto, premio,ganar,push FROM loteria WHERE codigo='".$_GET["cod_t"]."'";
    $rs_ticket=(mysqli_query($mysqli, $sql_ticket)) or die(mysqli_error());
    $row_ticket=mysqli_fetch_array($rs_ticket);

    $sql_agen="SELECT agencia, agencia_padre FROM agencias WHERE id='".$row_ticket["agencia"]."'";
    $rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
    $row_agen=mysqli_fetch_array($rs_agen);

}

else {
    
  $sql_ticket="SELECT codigo, id_sorteo, agencia,fecha, hora, numeros, monto, premio,ganar,push FROM loteria WHERE codigo='".$codigo."'";
    $rs_ticket=(mysqli_query($mysqli, $sql_ticket)) or die(mysqli_error());
    $num_ticket=mysqli_num_rows($rs_ticket);
    $row_ticket=mysqli_fetch_array($rs_ticket);
    
    if ($num_ticket < 1) {
        echo "<script>alert('Ticket no existe');window.location='consultas.php';</script>";
    }

    $sql_agen="SELECT agencia, agencia_padre FROM agencias WHERE id='".$row_ticket["agencia"]."'";
    $rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
    $row_agen=mysqli_fetch_array($rs_agen);
}


    $sql_ns="SELECT n.sorteo, n.dia FROM nombre_sorteos n JOIN sorteos s ON n.id=s.nombre_sorteo WHERE s.id='".$row_ticket["id_sorteo"]."'";
    $rs_ns=mysqli_query($mysqli,$sql_ns) or die(mysqli_error());
    $row_ns=mysqli_fetch_array($rs_ns);

$compe_select=array();

 echo '<style>
        #ticket {
        width: 302px;
        text-align:justify;
        
}

    </style>';
    echo '<div class="col-lg-6 col-lg-offset-5">';
    echo '<div id="ticket">';
    if ($row_agen["agencia_padre"] == 26) {
        echo '<center>GANA DIARIO</center><br><br>';
    }
    echo "www.mexiapuestas.net<br>";
    echo "Agencia: ".$row_agen["agencia"]."<br>";
    if ($row_agen["agencia_padre"] == 26) {
         echo "Telefono: 5544842237<br>";
    }
    echo "Apuesta: LOTERIA NACIONAL DE MEXICO<br>";
    list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
    $fecha = $d."/".$m."/".$a;
    echo "Fecha: ".$fecha." ".$row_ticket["hora"]."<br>";
   
    echo "Sorteo: ".$row_ns["sorteo"]." (".$row_ns["dia"].")<br>";
    echo "Serial: ".$row_ticket["codigo"]."<br>";
    echo "Ticket Vigente por 5 días<br><br>";

            


            echo "<b>Números Seleccionados:</b> ".$row_ticket["numeros"].""."<br>";

              $sql_r="SELECT * FROM resultados_l WHERE id_sorteo='".$row_ticket["id_sorteo"]."'";
        
        $rs_r=mysqli_query($mysqli,$sql_r) or die(mysqli_error());
        $row_r=mysqli_fetch_array($rs_r);
        //echo $row_r["resultado"];
        $tres_r= substr( $row_r["resultado"], -3);
        //echo $tres_r;

        $dos_r= substr( $row_r["resultado"], -2);
        //echo $dos_r;

        $tres_t= substr( $row_ticket["numeros"], -3);

        $dos_t= substr( $row_ticket["numeros"], -2);

        if ($row_r["resultado"] == $row_ticket["numeros"]) {
            echo "<span class='ganador'>Ganador: ".$row_r["resultado"]."</span><br>";
        }


        if ($tres_r == $tres_t && $row_r["resultado"] != $row_ticket["numeros"] && strlen($row_ticket["numeros"])== 3) {
           echo "<span class='ganador'>Ganador: ".$tres_r."</span><br>";
        }

        if ($dos_r == $dos_t && $tres_r != $tres_t  && strlen($row_ticket["numeros"])== 2) {
           echo "<span class='ganador'>Ganador: ".$dos_r."</span><br>";
        }

        if (isset($row_r["resultado"]) && $tres_r != $tres_t && $row_r["resultado"] != $row_ticket["numeros"] && $dos_r != $dos_t) {
            echo "<span class='perdedor'>Perdedor: ".$row_r["resultado"]."</span><br>";
        }
                                    
                                    
            echo "-------------------------------------------------------------<br>";
                                                            
       
        

    echo "<b>Apostado:</b> ".$row_ticket["monto"]."<br>";
    echo "-------------------------------------------------------------<br>";
    echo "<b id='cuatro'>Ganancia:</b> ".$row_ticket["premio"]."<br><br>";
    echo "- Este ticket expira 5 días luego de su impresión<br>";
    echo "- Sin ticket no se cobra el premio.<br>";
    echo "- En caso de error de línea, hora programada, apuestas fuera de tiempo o comenzando el evento, estas serán CANCELADAS y el monto apostado será devuelto en consecuencia.<br>";
    echo "Conozco y acepto las reglas.<br>";
    echo "visita www.mexiapuestas.net<br>";


       

?>