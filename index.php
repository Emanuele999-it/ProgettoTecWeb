<?php
    require_once __DIR__ . "/php/setterTemplate.php";
    require_once __DIR__ . "/php/query-articoli.php";

    $setterPagina = new setterTemplate(".");

    $setterPagina->setTitle("The Darksoulers");
    $setterPagina->setDescription("Pagina iniziale del sito The Darksoulers");  

	

    $setterPagina->setNavBar(
        preg_replace(
            "((?s)<a href=\"<rootFolder />/index.php\" xml:lang=\"en\">Home</a>)",
            "<a href=\"#header\" class=\"active\" xml:lang=\"en\">Home</a>",
            preg_replace(
                "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/index.php\" xml:lang=\"en\">Home</a></li>)",
                "<li xml:lang=\"en\" id=\"currentLink\" class=\"elementomenu\">Home</li>",
                file_get_contents(__DIR__ . "/php/contents/home-nav.php")))
	);
	
    
    $setterPagina->setPercorso("<span xml:lang=\"en\"> Home</span>");


	//controllo se l'utente e' loggato
	
	if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'])) {
		$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"), file_get_contents(__DIR__ . "/contents/logRegMobileContent.php"));
	}
	else {
		$utenteMobile = str_replace("<SegnapostoNomeMobile />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLoginMobile.php"));
		$utenteFull = str_replace("<SegnapostoNome />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLogin.php"));
		$setterPagina->setLoginContent($utenteFull,$utenteMobile);
	}


    $last3articoli = getArticoli(0, 3, true);
    $articoloPrincipale = getArticoloPrincipale();

    $HomCon = str_replace("<last3art />", $last3articoli, file_get_contents(__DIR__ . "/php/contents/homeContent.php"));
    $HomCon = str_replace("<articoloPrincipale />", $articoloPrincipale, $HomCon);
    $setterPagina->setContent($HomCon);
    $setterPagina->setFooter();

    $setterPagina->validate();
?>