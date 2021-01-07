<?php
    require_once __DIR__ . "/php/setterTemplate.php";

    $setterPagina = new setterTemplate();

    /*manca codice per settare i meta, da inserire nella classe in setterTemplate*/

    $setterPagina->setHeader();
    $setterPagina->setContent("homeContent.php");
    $setterPagina->setFooter();

    $setterPagina->stampaHtml(); //fa l'echo della pagina

?>