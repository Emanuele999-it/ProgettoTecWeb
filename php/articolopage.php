<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("..");

    $setterPagina->setTitle("Articolo | The Darksoulers");
    $setterPagina->setDescription("Articolo riguardante un gioco");  

    $artPageCon = file_get_contents(__DIR__ . "/contents/articolopageContent.php");

    $setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

    $setterPagina->setPercorso("Articoli -> titolo articolo");

    $setterPagina->setContent($artPageCon);
    $setterPagina->setFooter();

    $setterPagina->validate()

?>