<?php
require_once __DIR__ . "/setterTemplate.php";
require_once __DIR__ . "/query-articoli.php";

$setterPagina = new setterTemplate("..");

//controllo se l'utente e' loggato
$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/php/contents/logRegContent.php"), file_get_contents(__DIR__ . "/php/contents/logRegMobileContent.php"));

$setterPagina->setTitle("Articolo | The Darksoulers");
$setterPagina->setDescription("Articolo riguardante un gioco");  
$setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

$idArticolo = array_key_exists('id', $_GET) ? $_GET['id'] : 0;

if ($idArticolo <= 0) {
    header("Location: error/400.php");
    exit;
}
$htmlArticolo = getSingoloArticolo($idArticolo);
if ($htmlArticolo < 0) {
    header("Location: error/404.php");
    exit;
}

$titoloArticolo = getTitolo($idArticolo);
$setterPagina->setPercorso("Articoli -> $titoloArticolo");

//modifico il contenuto in base alla query ricevuta
$artPageCon = file_get_contents(__DIR__ . "/contents/articolopageContent.php");
$artPageCon = str_replace("<articoloContent />", $htmlArticolo, $artPageCon);
$setterPagina->setContent($artPageCon);
$setterPagina->setFooter();

$setterPagina->validate()

?>