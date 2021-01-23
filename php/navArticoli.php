<?php

function navArticoli($numArticoli, $pagNav){
    $risultato="";
    if($numArticoli > 10){
        if($numArticoli%10 == 0){
            $numPagine = floor($numArticoli / 10);
        }
        else{
            $numPagine = floor($numArticoli / 10) + 1;
        }
        $risultato .= "<div id=\"navArticoli\"><ul>";
        if($pagNav != 0){
            $prec = $pagNav-1;
            $risultato .= "<li class=\"elNavArticoli\"><a href=\"<rootFolder />/php/<navArtPlaceholder />&amp;page=" . $prec
                . "\" >&lt; </a></li>";
        }
        else{
            $risultato .= "<li class=\"elNavArticoli\">&lt; </li>";
        }
        for($i = 0; $i < $numPagine; $i++){
            $numero = $i + 1;
            if($i == $pagNav){
                $risultato .= "<li class=\"elNavArticoli\">" . $numero . "</li>";
            }
            else{
                $risultato .= "<li class=\"elNavArticoli\"><a href=\"<rootFolder />/php/<navArtPlaceholder />&amp;page="
                    . $i . "\" >" . $numero . "</a></li>";
            }
        }
        if($pagNav+1 != $numPagine){
            $succ = $pagNav+1;
            $risultato .= "<li class=\"elNavArticoli\"><a href=\"<rootFolder />/php/<navArtPlaceholder />&amp;page=" . $succ
                . "\" > ></a></li></ul>";
        }
        else{
            $risultato .= "<li class=\"elNavArticoli\"> ></li></ul>";
        }
        $risultato .= "</div>";
    }
    return $risultato;
}


?>