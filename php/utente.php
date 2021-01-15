<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("..");

    $setterPagina->setTitle("Utente | The Darksoulers");
    $setterPagina->setDescription("Pagina iniziale del sito The Darksoulers");  

    $setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

    $setterPagina->setPercorso("Utente");
    
    $utenteCon = file_get_contents(__DIR__ . "/contents/utenteContent.php");
    $setterPagina->setContent($utenteCon);
    $setterPagina->setFooter();

    $setterPagina->validate();
?>