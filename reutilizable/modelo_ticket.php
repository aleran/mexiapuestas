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
    $sql_ticket="SELECT codigo, agencia, tipo, fecha, hora, monto, premio, tipo FROM parlay WHERE codigo='".$_GET["cod_t"]."'";
    $rs_ticket=(mysqli_query($mysqli, $sql_ticket)) or die(mysqli_error());
    $row_ticket=mysqli_fetch_array($rs_ticket);

    $sql_agen="SELECT agencia, agencia_padre FROM agencias WHERE id='".$row_ticket["agencia"]."'";
    $rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
    $row_agen=mysqli_fetch_array($rs_agen);

}

else {

    $sql_ticket="SELECT codigo, agencia, tipo, fecha, hora, monto, premio, ganar, pagado, push FROM parlay WHERE codigo='".$codigo."'";
    $rs_ticket=(mysqli_query($mysqli, $sql_ticket)) or die(mysqli_error());
    $num_ticket=mysqli_num_rows($rs_ticket);
    if ($num_ticket < 1) {
        echo "<script>alert('Ticket no existe');window.location='consultas.php';</script>";
                        }
        $row_ticket=mysqli_fetch_array($rs_ticket);
        $sql_agen="SELECT agencia, agencia_padre FROM agencias WHERE id='".$row_ticket["agencia"]."'";
        $rs_agen=mysqli_query($mysqli,$sql_agen) or die(mysqli_error());
        $row_agen=mysqli_fetch_array($rs_agen);
}

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
    echo "Apuesta: ".$row_ticket["tipo"]."<br>";
    list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
    $fecha = $d."/".$m."/".$a;
    echo "Fecha: ".$fecha." ".$row_ticket["hora"]."<br>";
    echo "Serial: ".$row_ticket["codigo"]."<br>";
    echo "Ticket Vigente por 5 días<br><br>";

    if (isset($_GET["cod_t"])) {
        $sql="SELECT p.*, a.id_partido, a.logro, a.val_alta, a.valor_logro, c.competicion, j.* FROM parlay p
        JOIN apuestas a ON p.codigo=a.ticket
        JOIN partidos j ON a.id_partido=j.id
        JOIN competiciones c ON c.id_competicion=j.id_competicion
        WHERE p.codigo='".$_GET["cod_t"]."'
        ORDER BY p.fecha ASC";
    }
    else {
        $sql="SELECT p.*, a.id_partido, a.logro, a.val_alta, a.valor_logro,c.competicion, j.* FROM parlay p
        JOIN apuestas a ON p.codigo=a.ticket
        JOIN partidos j ON a.id_partido=j.id
        JOIN competiciones c ON c.id_competicion=j.id_competicion
        WHERE p.codigo='".$codigo."'
        ORDER BY p.fecha ASC";
    }

    $rs=(mysqli_query($mysqli, $sql)) or die(mysqli_error());
    while($row = mysqli_fetch_array($rs)) {
        $sql_eq1="SELECT equipo from equipos WHERE id='".$row["equipo1"]."'";
        $rs_eq1=mysqli_query($mysqli,$sql_eq1) or die(mysqli_error());
        $row_eq1=mysqli_fetch_array($rs_eq1);

        $sql_eq2="SELECT equipo from equipos WHERE id='".$row["equipo2"]."'";
        $rs_eq2=mysqli_query($mysqli,$sql_eq2) or die(mysqli_error());
        $row_eq2=mysqli_fetch_array($rs_eq2);

        if (isset($codigo)) {
            $sql_resul="SELECT * FROM resultados WHERE id_partido='".$row["id_partido"]."'";
            $rs_resul=mysqli_query($mysqli,$sql_resul) or die(mysqli_error());
            $row_resul=mysqli_fetch_array($rs_resul);
        }

        if ($_SESSION["pais"]==2 || $_SESSION["pais"]==2) {
            list($a2,$m2,$d2)= explode("-",$row["fecha_v"]);
        }
        else {
                list($a2,$m2,$d2)= explode("-",$row["fecha"]);
        }

            
        $fecha2 = $d2."/".$m2."/".$a2;

        echo "<b>".$row["competicion"].":</b><br>";

        if ($row["logro"]=="gj1") {
            echo $row_eq1["equipo"]."-> <b>Ganar:</b> ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
                                    
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";

            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_gj1"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_gj1"]."</span><br>";
            }
            if ($row_resul["r_gj1"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_gj1"]."</span><br>";
            }
            if ($row_resul["r_gj1"]=="PUSH") {
                echo "<span class='push'>".$row_resul["r_gj1"]."</span><br>";
            }
                                    
            echo "-------------------------------------------------------------<br>";
                                                            

        }

        if ($row["logro"]=="gj2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Ganar:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_gj2"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_gj2"]."</span><br>";
            }
            elseif ($row_resul["r_gj2"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_gj2"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_gj2"]."</span><br>";
            }

            echo "-------------------------------------------------------------<br>";

                                    
                                                            
        }


        if ($row["logro"]=="empate") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Empate:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_empate"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_empate"]."</span><br>";
            }
            elseif ($row_resul["r_empate"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_empate"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_empate"]."</span><br>";
            }

            echo "-------------------------------------------------------------<br>";

                                                            
        }

        if ($row["logro"]=="empatept") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Empate 1T:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_empatept"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_empatept"]."</span><br>";
            }
            elseif ($row_resul["r_empatept"]=="PERDEDOR") {
                 echo "<span class='perdedor'>".$row_resul["r_empatept"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_empatept"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";

                                                            
        }

        if ($row["logro"]=="alta") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Alta</b> ( ".$row["val_alta"]." ): ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_alta"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_alta"]."</span><br>";
            }
            elseif ($row_resul["r_alta"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_alta"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_alta"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";
                                                            
        }

        if ($row["logro"]=="baja") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Baja</b> ( ".$row["val_alta"]." ): ".$row["valor_logro"]."<br>";
                                    
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_baja"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_baja"]."</span><br>";
            }
            elseif ($row_resul["r_baja"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_baja"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_baja"]."</span><br>";
            }
                echo "-------------------------------------------------------------<br>";
                                                            
        }

        if ($row["logro"]=="runline1") {
            echo $row_eq1["equipo"]."-> <b>Runline</b> (".$row["v_runline1"]."): ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_runline1"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_runline1"]."</span><br>";
            }
            elseif ($row_resul["r_runline1"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_runline1"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_runline1"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";
                                                            
        }

        if ($row["logro"]=="runline2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Runline</b> (".$row["v_runline2"]."): ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora3: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_runline2"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_runline2"]."</span><br>";
            }
            elseif ($row_resul["r_runline2"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_runline2"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_runline2"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";

                                                            
        }

        if ($row["logro"]=="gpt1") {
            echo $row_eq1["equipo"]."-> <b>Ganar 1T:</b> ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora3: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_gpt1"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_gpt1"]."</span><br>";
            }
            elseif ($row_resul["r_gpt1"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_gpt1"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_gpt1"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";

        }

        if ($row["logro"]=="gpt2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Ganar 1T:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora3: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_gpt2"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_gpt2"]."</span><br>";
            }
            elseif ($row_resul["r_gpt2"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_gpt2"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_gpt2"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";
                                                            
        }

        if ($row["logro"]=="gst1") {
            echo $row_eq1["equipo"]."-> <b>Ganar 2T:</b> ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_gst1"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_gst1"]."</span><br>";
            }
            elseif ($row_resul["r_gst1"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_gst1"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_gst1"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";

        }

        if ($row["logro"]=="gst2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Ganar 2T</b>: ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_gst2"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_gst2"]."</span><br>";
            }
            elseif ($row_resul["r_gst2"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_gst2"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_gst2"]."</span><br>";
            }

            echo "-------------------------------------------------------------<br>";
        }
                                     


        if ($row["logro"]=="g5to1") {
            echo $row_eq1["equipo"]."-> <b>Ganar 5to I:</b> ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            if ($row_resul["r_g5to1"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_g5to1"]."</span><br>";
            }
            elseif ($row_resul["r_g5to1"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_g5to1"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_g5to1"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";
                                                                

        }

        if ($row["logro"]=="g5to2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>Ganar 5to I:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            if ($row_resul["r_g5to2"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_g5to2"]."</span><br>";
            }
            elseif ($row_resul["r_g5to2"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_g5to2"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_g5to2"]."</span><br>";
            }

            echo "-------------------------------------------------------------<br>";
                                                                
        }

        if ($row["logro"]=="gg") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>GG:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_gg"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_gg"]."</span><br>";
            }
            elseif ($row_resul["r_gg"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_gg"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["gg"]."</span><br>";
            }

            echo "-------------------------------------------------------------<br>";
                                    
        }

        if ($row["logro"]=="ng") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>NG:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }

            if ($row_resul["r_ng"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_ng"]."</span><br>";
            }
            elseif ($row_resul["r_ng"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_ng"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_ng"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";
                                                            
        }

        if ($row["logro"]=="dc1x") {
            echo $row_eq1["equipo"]."-> <b>DC1x:</b> ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            if ($row_resul["r_dc1x"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_dc1x"]."</span><br>";
            }
            elseif ($row_resul["r_dc1x"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_dc1x"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_dc1x"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";

        }

        if ($row["logro"]=="dc2x") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>DC2x:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }

            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            if ($row_resul["r_dc2x"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_dc2x"]."</span><br>";
            }
            elseif ($row_resul["r_dc2x"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_dc2x"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_dc2x"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";
                                                            
        }

        if ($row["logro"]=="dc12") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-> <b>DC12:</b> ".$row["valor_logro"]."<br>";
            if ($_SESSION["pais"]==2) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."<br>";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."<br>";
            }
            if ($row_resul["r_dc12"]=="GANADOR") {
                echo "<span class='ganador'>".$row_resul["r_dc12"]."</span><br>";
            }
            elseif ($row_resul["r_dc12"]=="PERDEDOR") {
                echo "<span class='perdedor'>".$row_resul["r_dc12"]."</span><br>";
            }
            else {
                echo "<span class='push'>".$row_resul["r_dc12"]."</span><br>";
            }
            echo "-------------------------------------------------------------<br>";
                                                            
        }
        
        if (!in_array($row["id_competicion"], $compe_select)) {
            $compe_select[]=$row["id_competicion"];
        }
        
    }

    echo "<b>Apostado:</b> ".$row_ticket["monto"]."<br>";
    echo "-------------------------------------------------------------<br>";
    echo "<b>Ganancia:</b> ".$row_ticket["premio"]."<br><br>";
    echo "- Este ticket expira 5 días luego de su impresión<br>";
    echo "- Sin ticket no se cobra el premio.<br>";
    echo "- En caso de error de línea, hora programada, apuestas fuera de tiempo o comenzando el evento, estas serán CANCELADAS y el monto apostado será devuelto en consecuencia.<br>";
    echo "Conozco y acepto las reglas.<br>";
    echo "visita www.mexiapuestas.net<br>";


?>