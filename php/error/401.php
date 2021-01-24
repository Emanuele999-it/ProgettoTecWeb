<?php
require_once __DIR__ . "/../setterTemplate.php";
require_once __DIR__ . "/../utente-class.php";

session_start();

$setterPagina = new setterTemplate("../..");

$setterPagina->setTitle("The Darksoulers");
$setterPagina->setDescription("Pagina iniziale errore 401");

$setterPagina->setPercorso("Errore 401");

$setterPagina->setNavBar(file_get_contents(__DIR__ . "/../contents/home-nav.php"));


//controllo se l'utente e' loggato
if ($_SESSION['loggedin']){
    $utenteMobile = file_get_contents(__DIR__ . "/../contents/userLoginMobile.php");
    $utenteFull = file_get_contents(__DIR__ . "/../contents/userLogin.php");
    
    $utenteMobile = str_replace("<SegnapostoNomeMobile />", $_SESSION['user']->getNome(), $utenteMobile);
    $utenteFull = str_replace("<SegnapostoNome />", $_SESSION['user']->getNome(), $utenteFull);
    $setterPagina->setLoginContent($utenteFull, $utenteMobile);
}
else {
    $setterPagina->setLoginContent(file_get_contents(__DIR__ . "/../contents/logRegContent.php"),file_get_contents(__DIR__ . "/../contents/logRegMobileContent.php") );
}

$contenuto = str_replace("<segnapostoErrore />", "Ops.. sembra che non puoi accedere a questa risorsa", file_get_contents(__DIR__ . "/../contents/erroreContent.php"));

$setterPagina->setContent($contenuto);
$setterPagina->setFooter();

$setterPagina->validate();
