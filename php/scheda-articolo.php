<?php

function schedaArticolo($immagine, $alt, $titolo, $sommario, $idArticolo){
    $scheda = "<div class=\"articoloScheda\">"
        . "<img src=\"" . $immagine . "\" alt=\"" . $alt . "\" />"
        . "<a href=\"<rootFolder />/php/articolo?id=$idArticolo\"><h3>" . $titolo . "</h3></a>"
        . "<p>" . $sommario . "</p>"
        . "</div>";
    return $scheda;
}

function composeArticolo($immagine, $alt, $titolo, $sommario, $testo){
    $articolo = "<div id=\"recensione\" style=\"margin-right:5em;\"><h1>$titolo</h1>
    <h3><$sommario /></h3>
    <img src=$immagine alt=\"$alt\" style=\"width:50%; float:left; padding: 1em 1em 1em 1em;\"/>
    <p>$testo</p></div>";
    return $articolo;
}

?>