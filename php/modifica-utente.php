<?php

require_once __DIR__ . "/setterTemplate.php";
require_once __DIR__ . '/utente-class.php';

session_start();

$setterPagina = new setterTemplate("..");

$setterPagina->setTitle("Utente | The Darksoulers");
$setterPagina->setDescription("Pagina modifica informazioni utente");  

$setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

$setterPagina->setPercorso("Utente");

$modificautenteCon = file_get_contents(__DIR__ . "/contents/modifica-utente-content.php");
$modificautenteCon = str_replace("<SegnapostoNome />",$_SESSION['user']->getNome(),$modificautenteCon);
$modificautenteCon = str_replace("<SegnapostoCognome />",$_SESSION['user']->getCognome(),$modificautenteCon);
$modificautenteCon = str_replace("<SegnapostoEmail />",$_SESSION['user']->getEmail(),$modificautenteCon);
$modificautenteCon = str_replace("<SegnapostoPassw />",$_SESSION['user']->getPassword(),$modificautenteCon);

// CONTROLLO EMAIL IDENTICA DI PRIMA
if ($_SESSION["erroreEmailIdenticatrovato"] == true ) {
	$modificautenteCon = str_replace("<SegnapostoModificaEmail />",
	 "<h2><span class=\"errore-credenziali\"> Hai inserito la stessa email di prima</span></h2>",$modificautenteCon);
	$_SESSION["erroreEmailIdenticatrovato"]=false;
}

// CONTROLLO EMAIL GIA' INSERITO
if ($_SESSION["erroreEmailtrovato"] == true ) {
	$modificautenteCon = str_replace("<SegnapostoModificaEmail />",
	 "<h2><span class=\"errore-credenziali\"> Hai inserito una Email già inserita da un altro utente</span></h2>",$modificautenteCon);
	$_SESSION["erroreEmailtrovato"]=false;
}
else{
	$modificautenteCon = str_replace("<SegnapostoModificaEmail />","",$modificautenteCon);
}



if ($_SESSION['loggedin']) {
	$utenteMobile = str_replace("<SegnapostoNomeMobile />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLoginMobile.php"));
	$utenteFull = str_replace("<SegnapostoNome />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLogin.php"));
	$setterPagina->setLoginContent($utenteFull, $utenteMobile);
	}
else{
	$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"),file_get_contents(__DIR__ . "/contents/logRegMobileContent.php") );
}



$setterPagina->setContent($modificautenteCon);
$setterPagina->setFooter();



$setterPagina->validate();






