<!DOCTYPE html>

<html>     
    <head>        
        <meta charset="UTF-8">
        <title>Trabajo Ayudantia: 8 Reinas</title>
        <script src="js/jquery-1.11.0.js"></script>
        <script src="js/generales_propias.js"></script>        
    </head>
    
    <body background="img/fondo.jpg">
        <div><br>        
        <?php        
        echo '<table style="margin: 0 auto" border="1">';
            for($j=0;$j<8;$j++){
                echo '<tr>';            
                for($i=0;$i<8;$i++){
                    echo '<td width="15px" height="15px">';                
                        echo '<input id="in_'.$j.'-'.$i.'" '
                                . 'type="checkbox" onclick="checkeado(\''.$j.'\',\''.$i.'\');'
                                . 'ingresa_dato();">';
                        echo '</td>';
                }            
                echo '</tr>';
            }
        echo '</table>'; 
        echo '<br>';
        ?>
            
        <br>
        </div>
        <div  align="center">
            <input id="btn_verificar" type="button" value="Verificar Solucion" onclick="validar($solucion);"><br><br>
            <input id="textito" type="text" readonly="true" disabled="true" style=" text-align: center"><br><br>
            <input id="btn_reiniciar" type="button" value="Reiniciar" onclick="reiniciar();"><br>            
        </div>
        <br>
        <div  align="center">
            <form id="form_resultado" action="./mostrar_resultados.php" >
                <input type="submit" value="Ver Soluciones Posibles"><br>
            </form>
        </div>
    </body>
</html>

