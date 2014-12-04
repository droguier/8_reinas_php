<?php

//Funcion recursiva de las 8_reinas y generador de la solucion final.
function ocho_reinas($posicion_inicial, $solucion, $diag_descendente, $diag_ascendente) { 
    if($posicion_inicial > 7){
        echo imprimir_solucion($solucion);
    }else {
        for ($i = 0; $i < 8; $i++) {
            if(!in_array($i, $solucion) AND !in_array(($posicion_inicial-$i), $diag_descendente) AND !in_array(($posicion_inicial+$i), $diag_ascendente)){
                $diag_ascendente[$posicion_inicial] = $posicion_inicial+$i;
                $diag_descendente[$posicion_inicial] = $posicion_inicial-$i;
                $solucion[$posicion_inicial] = $i;
                ocho_reinas($posicion_inicial+1, $solucion, $diag_descendente, $diag_ascendente);
            }
        }
     } 
}
 
//Funcion para imprimir el array de posicion de los elementos de la solucion.
function imprimir_solucion($solucion) {
    $ns = array_flip($solucion);
    ksort($ns);
    $n_fila=0;
    echo '<table border="1" style="margin: 1 auto">';
    foreach ($ns as $fila => $columna){
        $n_fila++;
        echo '<tr>'; 
        for ($n_columna=0; $n_columna<8; $n_columna++) {
            echo '<td width="15px" height="15px">';
            if($n_columna == $columna){
                $vector_solucion[$n_fila]=$columna+1;
                //echo $n_fila;
                if(1==($n_fila+$n_columna)%2){
                    echo '<img src="./img/reina_negra.png"  width="15px" height="15px">';
                }else{
                    echo '<img src="./img/reina_blanca.png"  width="15px" height="15px">';
                }
            }else{
                if(1==($n_fila+$n_columna)%2){
                    echo '<img src="./img/espacio_blanco.png"  width="15px" height="15px">';
                }else{
                    echo '<img src="./img/espacio_negro.png"  width="15px" height="15px">';
                }
            }
            echo '</td>';            
        }
        echo '</tr>';
    }
    echo '</table><br>';
    echo '<div align="center">';
    echo "[";
    for($ind=0;$ind<8;$ind++){        
        echo $vector_solucion[$ind+1];
        if($ind<7){
            echo ",";
        }
    }
    echo "]";
    echo '</div>';
    echo '<br>';
}
?>

<html>     
    <head>        
        <meta charset="UTF-8">
        <title>Resultados Totales</title>
    </head>
    <body background="./img/fondo.jpg">
        <?php
        //Iniciamos los parametros bases para llamar a nuestra funcion de 8_reinas
        $posicion_inicial = 0;
        $solucion = Array();
        $diag_descendente = Array();
        $diag_ascendente = Array();
        ocho_reinas($posicion_inicial, $solucion, $diag_descendente, $diag_ascendente);
        ?>  
    </body>
</html>
    