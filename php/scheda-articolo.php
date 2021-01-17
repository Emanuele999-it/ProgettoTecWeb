<?php

function schedaArticolo($immagine, $alt, $titolo, $sommario, $idArticolo){
    $scheda = "<div class=\"articoloScheda\">"
        . "<img src=\"" . $immagine . "\" alt=\"" . $alt . "\" />"
        . "<a href=\"<rootFolder />/php/articolo.php?id=".$idArticolo."\"><h3>" . $titolo . "</h3></a>"
        . "<p>" . $sommario . "</p>"
        . "</div>";
    return $scheda;
}

function composeArticolo($immagine, $alt, $titolo, $sommario, $testo){
    $articolo = "<div id=\"recensione\" ><h1>".$titolo."</h1>
    <h3>".$sommario."</h3>
    <img src=".$immagine." alt=\"".$alt."\" />
    <p>".$testo."</p></div>";
    return $articolo;
}

function schedaTop10($immagine, $alt, $gioco, $votoM, $iter){
    $scheda = "<div class=\"articoloScheda\""
    if($iter<4){
        $scheda .= " id=\"Top" . $iter . "\"";
    }
    $scheda .= ">"
        . "<h2>#" . $iter . "</h2>"
        . "<img src=\"" . $immagine . "\" alt=\"" . $alt . "\" />"
        . "<h3>" . $gioco . "</h3>"
        . "<h4>Voto: " . $votoM . "</h4>"
        . "</div>";
    return $scheda;
}


?>