<?php


 echo '<style>
       
 #ticket2 {
        width: 302px;
        text-align:justify;
        display: none;
        
    }

    #copia{
            position: absolute;
            margin-top:-300px;
            margin-left:70px;
            z-index: 100;
            color:#5D5D5D;
            font-size: 40px;
            -webkit-transform: rotate(-40deg);
            transform: rotate(-40deg);
        }   

    </style>';
    echo '<div class="col-lg-6 col-lg-offset-5">';
    echo '<div id="ticket2">';
    if ($row_agen["agencia_padre"] == 26) {
        echo "            GANA DIARIO\$intro$\$intro$";
    }
    echo "www.mexiapuestas.net\$intro$";
    echo "Agencia: ".$row_agen["agencia"]."\$intro$";
    if ($row_agen["agencia_padre"] == 26) {
        echo "Telefono: 5544842237\$intro$";
    }
    echo "Apuesta: ".$row_ticket["tipo"]."\$intro$";
    list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
    $fecha = $d."/".$m."/".$a;
    echo "Fecha: ".$fecha." ".$row_ticket["hora"]."\$intro$";
    echo "Serial: ".$row_ticket["codigo"]."\$intro$";
    echo "Ticket Vigente por 5 DIAS\$intro$\$intro$";


    $rs=(mysqli_query($mysqli, $sql)) or die(mysqli_error());
    while($row = mysqli_fetch_array($rs)) {
            $sql_eq1="SELECT equipo from equipos WHERE id='".$row["equipo1"]."'";
            $rs_eq1=mysqli_query($mysqli,$sql_eq1) or die(mysqli_error());
            $row_eq1=mysqli_fetch_array($rs_eq1);

            $sql_eq2="SELECT equipo from equipos WHERE id='".$row["equipo2"]."'";
            $rs_eq2=mysqli_query($mysqli,$sql_eq2) or die(mysqli_error());
            $row_eq2=mysqli_fetch_array($rs_eq2);
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                list($a2,$m2,$d2)= explode("-",$row["fecha_v"]);
            }
            else {
                 list($a2,$m2,$d2)= explode("-",$row["fecha"]);
            }

            
            $fecha2 = $d2."/".$m2."/".$a2;
            
        if ($row["logro"]=="gj1") {
            echo $row_eq1["equipo"]."-%3E Ganar: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    

        }

        if ($row["logro"]=="gj2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Ganar: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }


        if ($row["logro"]=="empate") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Empate: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="empatept") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Empate 1T: ".$row["valor_logro"]."\$intro$";
           if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="alta") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Alta( ".$row["val_alta"]." ): ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="baja") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Baja( ".$row["val_alta"]." ): ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="runline1") {
            echo $row_eq1["equipo"]."-%3E Runline (".$row["v_runline1"]."): ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="runline2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Runline (".$row["v_runline2"]."): ".$row["valor_logro"]."\$intro$";
             if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";

                                    
        }

        if ($row["logro"]=="gpt1") {
            echo $row_eq1["equipo"]."-%3E Ganar 1T: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";

        }

        if ($row["logro"]=="gpt2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Ganar 1T: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

         if ($row["logro"]=="gst1") {
            echo $row_eq1["equipo"]."-%3E Ganar 2T: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
           echo "------------------------------------------\$intro$";

        }

        if ($row["logro"]=="gst2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Ganar 2T: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
        }
             


        if ($row["logro"]=="g5to1") {
            echo $row_eq1["equipo"]."-%3E Ganar 5to I: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    

        }

        if ($row["logro"]=="g5to2") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E Ganar 5to I: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="gg") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E GG: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="ng") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E NG: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="dc1x") {
            echo $row_eq1["equipo"]."-%3E DC1x: ".$row["valor_logro"]." vs ".$row_eq2["equipo"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";

        }

        if ($row["logro"]=="dc2x") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E DC2x: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }

        if ($row["logro"]=="dc12") {
            echo $row_eq1["equipo"]." vs ".$row_eq2["equipo"]."-%3E DC12: ".$row["valor_logro"]."\$intro$";
            if ($_SESSION["pais"]==2 || $_SESSION["pais"]==4) {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora_v"]."\$intro$";
            }
            else {
                echo "Fecha: ".$fecha2." Hora: ".$row["hora"]."\$intro$";
            }
            echo "------------------------------------------\$intro$";
                                    
        }
        
        
    }

                            echo "Apostado: ".$row_ticket["monto"]."\$intro$";
                            echo "------------------------------------------\$intro$";
                            echo "Ganancia: ".$row_ticket["premio"]."\$intro$\$intro$";
                            echo "- Este ticket expira 5 DIAS luego de su IMPRESION\$intro$";
                            echo "- Sin ticket no se cobra el premio.\$intro$";
                            echo "- En caso de error de LINEA, hora programada, apuestas fuera de tiempo o comenzando el evento, estas serán CANCELADAS y el monto apostado SERA devuelto en consecuencia.\$intro$";
                            echo "- Las apuestas de fútbol están basadas en el resultado al final de los 90 Minutos de Juego, no incluye prorroga ni penales.\$intro$";
                            echo "Conozco y acepto las reglas.\$intro$";
                            echo "visita www.mexiapuestas.net\$intro$";
    echo "</div>";
    echo "</div>";

?>