<?php


  echo '<style>
        #ticket2 {
        width: 302px;
        text-align:justify;
        display: none;
        
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
    echo "Apuesta: LOTERIA NACIONAL DE MEXICO\$intro$";
    list($a,$m,$d)= explode("-",$row_ticket["fecha"]);
    $fecha = $d."/".$m."/".$a;
    echo "Fecha: ".$fecha." ".$row_ticket["hora"]."\$intro$";
    echo "Sorteo: ".$row_ns["sorteo"]." (".$row_ns["dia"].")\$intro$";
    echo "Serial: ".$row_ticket["codigo"]."\$intro$";
    echo "Ticket Vigente por 5 dias\$intro$\$intro$";


        echo "Loteria:\$intro$";

            echo "Numeros Seleccionados: ".$row_ticket["numeros"].""."\$intro$";
                                    
                                    
            echo "-------------------------------------------------------------\$intro$";
                                                            
        
        

    echo "Apostado: ".$row_ticket["monto"]."\$intro$";
    echo "-------------------------------------------------------------\$intro$";
    echo "Ganancia: ".$row_ticket["premio"]."\$intro$\$intro$";
    echo "- Este ticket expira 5 dias luego de su impresion\$intro$";
    echo "- Sin ticket no se cobra el premio.\$intro$";
    echo "- En caso de error de linea, hora programada, apuestas fuera de tiempo o comenzando el evento, estas seran CANCELADAS y el monto apostado sera devuelto en consecuencia.\$intro$";
    echo "Conozco y acepto las reglas.\$intro$";
    echo "visita www.mexiapuestas.net\$intro$";
    echo "</div>";
    echo "</div>";

?>