<?php
    require_once __DIR__ . "/php/setterTemplate.php";
    require_once __DIR__ . "/php/query-articoli.php";
	require_once __DIR__ . "/php/utente-class.php";

	session_start();

    $setterPagina = new setterTemplate(".");

    $setterPagina->setTitle("The Darksoulers");
    $setterPagina->setDescription("Pagina iniziale del sito The Darksoulers");  
	
	$setterPagina->setPercorso("<span xml:lang=\"en\"> Home</span>");
	
    $setterPagina->setNavBar(
        preg_replace(
            "((?s)<a href=\"<rootFolder />/index.php\" xml:lang=\"en\">Home</a>)",
            "<a href=\"#header\" class=\"active\" xml:lang=\"en\">Home</a>",
            preg_replace(
                "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/index.php\" xml:lang=\"en\">Home</a></li>)",
                "<li xml:lang=\"en\" id=\"currentLink\" class=\"elementomenu\">Home</li>",
                file_get_contents(__DIR__ . "/php/contents/home-nav.php")))
	);
	
	
	//controllo se l'utente e' loggato
	if (isset($_SESSION['nome']) && $_SESSION['loggedin']) {
		
		$utenteMobile = file_get_contents(__DIR__ . "/php/contents/userLoginMobile.php");
		$utenteFull = file_get_contents(__DIR__ . "/php/contents/userLogin.php");
		
		$utenteMobile = str_replace("<a href=\"<rootFolder />/php/utente.php\"><SegnapostoNomeMobile /></a>","<SegnapostoNomeMobile />", file_get_contents(__DIR__ . "/php/contents/userLoginMobile.php"));
		$utenteFull = str_replace("<a  href=\"<rootFolder />/php/utente.php\"><SegnapostoNome /></a>","<SegnapostoNome />", file_get_contents(__DIR__ . "/php/contents/userLogin.php"));
		
		$utenteMobile = str_replace("<SegnapostoNomeMobile />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/php/contents/userLoginMobile.php"));
		$utenteFull = str_replace("<SegnapostoNome />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/php/contents/userLogin.php"));
		$setterPagina->setLoginContent($utenteFull, $utenteMobile);
	}
	else {
		$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/php/contents/logRegContent.php"),file_get_contents(__DIR__ . "/php/contents/logRegMobileContent.php") );
	}
	

    $last3articoli = getArticoli(0, 3, true);
    $articoloPrincipale = getArticoloPrincipale();

    $HomCon = str_replace("<last3art />", $last3articoli, file_get_contents(__DIR__ . "/php/contents/homeContent.php"));
    $HomCon = str_replace("<articoloPrincipale />", $articoloPrincipale, $HomCon);
    $setterPagina->setContent($HomCon);
    $setterPagina->setFooter();

    $setterPagina->validate();
?>