<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("../");

    /*manca codice per settare i meta, da inserire nella classe in setterTemplate*/

    $setterPagina->setHeader();
    
    $listaArtCon = file_get_contents(__DIR__ . "/contents/listaArticoliGenereContent.php");
    $setterPagina->setContent($listaArtCon);
    $setterPagina->setFooter();

    $setterPagina->sistemaLink();
    $setterPagina->sistemaMenu();
    $setterPagina->stampaHtml(); //fa l'echo della pagina

?>