<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("..");

    
    $setterPagina->setTitle("Registrati | The Darksoulers");
    $setterPagina->setDescription("Pagina per la registrazione");  
    

    $setterPagina->setNavBar(
        preg_replace(
            "((?s)<a href=\"<rootFolder />/php/registrazione.php\">Registrati</a>)",
            "<a href=\"#header\" class=\"active\">Registrati</a>",
            preg_replace(
                "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/php/registrazione.php\">Registrati</a></li>)",
                "<li id=\"currentLink\" class=\"elementomenu\">Registrati</li>",
                file_get_contents(__DIR__ . "/contents/home-nav.php"))));

	//controllo se ha fatto il login
    $setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"), file_get_contents(__DIR__ . "/contents/logRegMobileContent.php"));
	
    $setterPagina->setPercorso("Registrati");
    
	$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/php/contents/logRegContent.php"), file_get_contents(__DIR__ . "/php/contents/logRegMobileContent.php"));

	
    //da sistemare una volta implementato il db
    $regCon = file_get_contents(__DIR__ . "/contents/registrazioneContent.php");
    $setterPagina->setContent($regCon);
    $setterPagina->setFooter();

    $setterPagina->validate();
?>