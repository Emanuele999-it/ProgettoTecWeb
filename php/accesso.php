<?php
require_once __DIR__ . "/setterTemplate.php";

session_start();

//controllo se ha gia' il login (aka inserimento manuale del link)
if ($_SESSION['loggedin']) {
    header("Location: error/400.php");
    exit;
}

$setterPagina = new setterTemplate("..");

$setterPagina->setTitle("Login | The Darksoulers");
$setterPagina->setDescription("Pagina di login");
$setterPagina->setPercorso("Accedi");

$setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

//accesso
$utenteMobile = preg_replace(
    "((?s)<a href=\"<rootFolder />/php/accesso.php\">Accedi</a>)",
    "<a href=\"#header\" class=\"active\">Accedi</a>",
    file_get_contents(__DIR__ . "/contents/logRegMobileContent.php")
);
$utenteFull = preg_replace(
    "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/php/accesso.php\">Accedi</a></li>)",
    "<li id=\"currentLink\" class=\"elementomenu\">Accedi</li>",
    file_get_contents(__DIR__ . "/contents/logRegContent.php")
);

//accesso
$utenteMobile = file_get_contents(__DIR__ . "/contents/logRegMobileContent.php");
$utenteFull = file_get_contents(__DIR__ . "/contents/logRegContent.php");

$utenteMobile = str_replace("<a href=\"<rootFolder />/php/accesso.php\">Accedi</a>", "Accedi", $utenteMobile);
$utenteFull = str_replace("<a href=\"<rootFolder />/php/accesso.php\">Accedi</a></li>", "Accedi", $utenteFull);

$setterPagina->setLoginContent($utenteFull, $utenteMobile);


//da sistemare una volta implementato il db
$accCon = file_get_contents(__DIR__ . "/contents/accessoContent.php");
if ($_SESSION["err-credenziali"] == true) {
    $accCon = str_replace("<SegnapostoCredenziali />", " Hai inserito Email o Password sbagliata ", $accCon);
    $_SESSION["err-credenziali"] = false;
}

$setterPagina->setContent($accCon);
$setterPagina->setFooter();

$setterPagina->validate();
