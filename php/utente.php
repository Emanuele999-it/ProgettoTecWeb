<?php
    require_once __DIR__ . "/setterTemplate.php";
    require_once __DIR__ . '/utente-class.php';

    session_start();

    $setterPagina = new setterTemplate("..");

    $setterPagina->setTitle("Utente | The Darksoulers");
    $setterPagina->setDescription("Pagina pannello utente");  

    $setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

	//controllo se ha fatto il login
    $setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"), file_get_contents(__DIR__ . "/contents/logRegMobileContent.php"));
	
    $setterPagina->setPercorso("Utente");
    
    $utenteCon = file_get_contents(__DIR__ . "/contents/utenteContent.php");
    $utenteCon = str_replace("<NomeUtenetSegnaposto />", $_SESSION['user']->getNome(), $utenteCon);
    if ($_SESSION["user"]->getAdmin()) {
        $utenteCon = str_replace("<SegnapostoAggiungiNuovoArticolo />",
         "<a id=\"aggiungi-articolo\" href=\" ../php/newArticolo.php\"> Aggiungi nuovo Articolo </a>",
         $utenteCon);
    } else {
        $utenteCon = str_replace("<SegnapostoAggiungiNuovoArticolo />", "", $utenteCon);
    }

  
    $setterPagina->setContent($utenteCon);
    $setterPagina->setFooter();



    $setterPagina->validate();
?>