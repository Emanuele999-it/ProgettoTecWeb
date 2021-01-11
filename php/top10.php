<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("../");

    /*manca codice per settare i meta, da inserire nella classe in setterTemplate*/

    $setterPagina->setHeader();
    
    $setterPagina->setContent("top10Content.php");
    $setterPagina->setFooter();

    $setterPagina->sistemaLink();
    $setterPagina->sistemaMenu();
    $setterPagina->stampaHtml(); //fa l'echo della pagina

?>