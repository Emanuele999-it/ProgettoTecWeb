<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("..");

    $setterPagina->setTitle("Aggiungi Articolo | The Darksoulers");
    $setterPagina->setDescription("Pagina iniziale del sito The Darksoulers");  

    $setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

	//controllo se ha fatto il login
    $setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"), file_get_contents(__DIR__ . "/contents/logRegMobileContent.php"));
	
    $setterPagina->setPercorso("Utente");
    
    $newArtCon = file_get_contents(__DIR__ . "/contents/newArticoloContent.php");
    $setterPagina->setContent($newArtCon);
    $setterPagina->setFooter();

    $setterPagina->validate();
?>