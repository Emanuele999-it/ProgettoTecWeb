<?php
    require_once __DIR__ . "/setterTemplate.php";
    require_once __DIR__ . '/utente-class.php';

    session_start();

    $setterPagina = new setterTemplate("..");

    $setterPagina->setTitle("Utente | The Darksoulers");
    $setterPagina->setDescription("Pagina pannello utente");  

    $setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

	
    $setterPagina->setPercorso("Utente");
    
    $utenteCon = file_get_contents(__DIR__ . "/contents/utenteContent.php");
    $utenteCon = str_replace("<NomeUtenetSegnaposto />", $_SESSION['user']->getNome(), $utenteCon);

    //accesso
    $utenteMobile = preg_replace(
        "((?s)<a href=\"<rootFolder />/php/utente.php\"><SegnapostoNomeMobile /></a>)",
        "<a href=\"#header\" class=\"active\"><SegnapostoNomeMobile /></a>",file_get_contents(__DIR__ . "/contents/userLoginMobile.php"));
	$utenteFull = file_get_contents(__DIR__ . "/contents/userLogin.php");
	
	$utenteFull = str_replace("<a  href=\"<rootFolder />/php/utente.php\"><SegnapostoNome /></a>","<SegnapostoNome />",$utenteFull);
	
	$utenteMobile = str_replace("<SegnapostoNomeMobile />", $_SESSION['user']->getNome(), $utenteMobile);
	$utenteFull = str_replace("<SegnapostoNome />", $_SESSION['user']->getNome(), $utenteFull);
    
	$setterPagina->setLoginContent($utenteFull, $utenteMobile);
	
	
    if ($_SESSION["user"]->getAdmin()) {
        $utenteCon = str_replace("<SegnapostoAggiungiNuovoArticolo />",
         "<a id=\"aggiungi-articolo\" class=\"addGameArti\" href=\" <rootFolder />/php/newArticolo.php\"> Aggiungi nuovo Articolo </a>",
         $utenteCon);
        $utenteCon = str_replace("<SegnapostoAggiungiNuovoGioco />",
        "<a id=\"aggiungi-gioco\" class=\"addGameArti\" href=\" <rootFolder />/php/newGame.php\"> Aggiungi nuovo Gioco </a>",
        $utenteCon);
    } else {
        $utenteCon = str_replace("<SegnapostoAggiungiNuovoArticolo />", "", $utenteCon);
    }

    if ($_SESSION["eliminazione-account-sbagliata"] == true){
        $_SESSION["eliminazione-account-sbagliata"] = false;
        $utenteCon = str_replace("<SegnapostoEliminaAccount />",
        "<h2><span class=\"errore-credenziali\"> Hai inserito la Password Sbagliata</span></h2>",
         $utenteCon);
    }
    else{
        $utenteCon = str_replace("<SegnapostoEliminaAccount />", "", $utenteCon);
    }

  
    $setterPagina->setContent($utenteCon);
    $setterPagina->setFooter();



    $setterPagina->validate();
