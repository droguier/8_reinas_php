$(document).ready(function(){
    $checkeados=0;
    $valida=true;
    $solucion=new Array();
    
    for($i=0;$i<8;$i++){
        $solucion[$i]= new Array();
        for($j=0;$j<8;$j++){
            $solucion[$i][$j]=0;
        }
    }   
    
    $(":checkbox").click(
        function(){                   
            $checkeados++;
            if($checkeados==8){ // MODIFICAR PARA SIMPLIFICAR
                $(":checkbox").attr("disabled","true");
            }
        }
    );              
});

function acerto(){
    $("#textito").css("color","green");
    $("#textito").val("Correcto!");
};

function fallo(){
    $("#textito").css("color","red");
    $("#textito").val("Incorrecto.");
};

function reiniciar(){
    //reiniciamos los checkboxs
    $(":checkbox").removeAttr("disabled");
    $(":checkbox").removeAttr("checked");                
    $("#textito").val(" ");
    $checkeados=0;
    //reiniciamos los auxiliares
    $valida=true;
    for($columna=0;$columna<8;$columna++){
        for($fila=0;$fila<8;$fila++){
            $solucion[$columna][$fila]=0;                
        }
    } 
}

function checkeado(j,i){
    $("#in_"+j+"-"+i).attr("disabled","true");
    if($valida==true){
        if($solucion[j][i]==-1){
            $valida=false;
        }else{
            for($columna=0;$columna<8;$columna++){
                for($fila=0;$fila<8;$fila++){
                    if($fila==i)
                        //$("#in_"+$columna+"-"+$fila).attr("disabled","true");
                        $solucion[$columna][$fila]=-1;
                    
                    if($columna==j)
                        //$("#in_"+$columna+"-"+$fila).attr("disabled","true");
                        $solucion[$columna][$fila]=-1;      
                    
                }
            }
            
            for($diagonal=0;$diagonal<8;$diagonal++){
                if((j-$diagonal)>=0&&(i-$diagonal)>=0){
                    aux1=j-$diagonal;
                    aux2=i-$diagonal;
                    $solucion[aux1][aux2]=-1;
                    //$("#in_"+aux1+"-"+aux2).attr("disabled","true");
                }
                
                if(8>(parseInt(j)+parseInt($diagonal))&&8>(parseInt(j)+parseInt($diagonal))){
                    aux1=parseInt(j)+parseInt($diagonal);
                    aux2=parseInt(i)+parseInt($diagonal);
                    $solucion[aux1][aux2]=-1;
                    //$("#in_"+aux1+"-"+aux2).attr("disabled","true");
                }
                
                if(((j-$diagonal)>=0)&&(8>(parseInt(i)+parseInt($diagonal)))){
                    aux1=j-$diagonal;
                    aux2=parseInt(i)+parseInt($diagonal);
                    $solucion[aux1][aux2]=-1;
                    //$("#in_"+aux1+"-"+aux2).attr("disabled","true");                    
                }
                
                if(8>(parseInt(j)+parseInt($diagonal))&&(i-$diagonal)>=0){
                    aux1=parseInt(j)+parseInt($diagonal);
                    aux2=i-$diagonal;
                    $solucion[aux1][aux2]=-1;
                    //$("#in_"+aux1+"-"+aux2).attr("disabled","true");
                }
            }
        }
    }
}

function validar(){
    if($valida==true){
        acerto();
    }else{
        fallo();
    }   
}
    