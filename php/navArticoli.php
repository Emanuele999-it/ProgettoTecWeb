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
        $risultato .= "<li class=\"elNavArticoli\"><a href=\"\" >< </a></li>";
        for($i = 0; $i < $numPagine; $i++){
            $numero = $i + 1;
            $risultato .= "<li class=\"elNavArticoli\"><a href=\"\" >" . $numero . "</a></li>";
        }
        $risultato .= "<li class=\"elNavArticoli\"><a href=\"\" > ></a></li></ul>";
        $risultato .= "</div>";
    }
    return $risultato;
}



?>