<?php

function schedaArticolo($immagine, $alt, $titolo, $sommario){
    $scheda = "<div class=\"articoloScheda\">"
        . "<img src=\"" . $immagine . "\" alt=\"" . $alt . "\" />"
        . "<a href=\"#\"><h3>" . $titolo . "</h3></a>"
        . "<p>" . $sommario . "</p>";
    return $scheda;
}

?>