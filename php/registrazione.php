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
                file_get_contents(__DIR__ . "/contents/home-nav.php")))+ù
	);

	$setterPagina->setPercorso("Registrati");

	
	//registrazione
	$utenteMobile = file_get_contents(__DIR__ . "/php/contents/logRegMobileContent.php");
	$utenteFull = file_get_contents(__DIR__ . "/php/contents/logRegContent.php");
		
	$utenteMobile = str_replace("<a href=\"<rootFolder />/php/registrazione.php\">Registrati</a>","Registrati", $utenteMobile);
	$utenteFull = str_replace("<a href=\"<rootFolder />/php/registrazione.php\">Registrati</a></li><SegnapostoNome /></a>","Registrati", $utenteFull);
	
	$setterPagina->setLoginContent($utenteFull, $utenteMobile);
	
	
	
	
    //da sistemare una volta implementato il db
    $regCon = file_get_contents(__DIR__ . "/contents/registrazioneContent.php");
    $setterPagina->setContent($regCon);
    $setterPagina->setFooter();

    $setterPagina->validate();
?>