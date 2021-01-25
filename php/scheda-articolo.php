<?php

function schedaArticolo($immagine, $alt, $titolo, $sommario, $idArticolo){
    $scheda = "<div class=\"articoloScheda\">"
        . "<img src=\"" . $immagine . "\" alt=\"" . $alt . "\" />"
        . "<h3><a href=\"<rootFolder />/php/articolo.php?id=".$idArticolo."\">" . $titolo . "</a></h3>"
        . "<p>" . $sommario . "</p>"
        . "</div>";
    return $scheda;
}

function schedaPrincipale($immagine, $alt, $titolo, $sommario, $idArticolo){
    $scheda = "<h2>Articolo del Momento</h2>
    <div class=\"articoloPrincipale\">"
        . "<img src=\"" . $immagine . "\" alt=\"" . $alt . "\" />"
        . "<h2><a href=\"<rootFolder />/php/articolo.php?id=".$idArticolo."\">" . $titolo . "</a></h2>"
        . "<p>" . $sommario . "</p>"
        . "</div>";
    return $scheda;
}

function composeArticolo($immagine, $alt, $titolo, $sommario, $testo){
    $articolo = "<div id=\"recensione\" ><h1>".$titolo."</h1>
    <h3>".$sommario."</h3>
    <img src=\"".$immagine."\" alt=\"".$alt."\" />
    <p>".$testo."</p></div>";
    return $articolo;
}

function schedaTop10($immagine, $alt, $gioco, $votoM, $iter){
    $scheda = "<div class=\"articoloScheda\"";
    if($iter < 4){
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

function schedaNuovaUscita($immagine, $alt, $gioco, $data_pubb, $gioco_id){
    $scheda = "<div class=\"articoloScheda\">"
        . "<img src=\"" . $immagine . "\" alt=\"" . $alt . "\" />"
        . "<h3>" . $gioco . "</h3>"
        . "<h4>" . $data_pubb . "</h4>" ."<div <SegnapostoEliminaGioco /> 
         class=\"elimina-gioco-div\"> <a class=\"elimina-gioco\"
          href=\" ../php/elimina-gioco.php?deleteID=$gioco_id\">
          Elimina gioco </a></div> " 
        . "</div>";
    return $scheda;
}

?>
