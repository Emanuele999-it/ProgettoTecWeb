<?php
    require_once __DIR__ . "/php/setterTemplate.php";

    $setterPagina = new setterTemplate(".");

    /*manca codice per settare i meta, da inserire nella classe in setterTemplate*/

    $setterPagina->setTitle("The Darksoulers");
    $setterPagina->setDescription("Pagina iniziale del sito The Darksoulers");
    $setterPagina->setNavBar(file_get_contents(__DIR__ . "/php/contents/home-nav.php"));
    $setterPagina->setPercorso("<span xml:lang=\"en\"> Home</span>");
    
    $setterPagina->setContent("homeContent.php");
    $setterPagina->setFooter();

    $setterPagina->validate();
?>