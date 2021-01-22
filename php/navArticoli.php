<?php

function navArticoli($numArticoli){
    $risultato="";
    if($numArticoli > 10){
        if($numArticoli%10 == 0){
            $numPagine = floor($numArticoli / 10);
        }
        else{
            $numPagine = floor($numArticoli / 10) + 1;
        }
        $risultato .= "<div id=\"navArticoli\"><ul>";
        $risultato .= "<li>< </li>";
        for($i = 0; $i < $numPagine; $i++){
            $numero = $i + 1;
            $risultato .= "<li>" . $numero . "</li>";
        }
        $risultato .= "<li> ></li></ul>";
        $risultato .= "</div>";
    }
    return $risultato;
}



?>