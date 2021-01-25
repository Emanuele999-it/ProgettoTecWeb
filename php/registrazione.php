<?php
require_once __DIR__ . '/db-handler.php';
require_once __DIR__ . "/setterTemplate.php";

session_start();

//controllo se ha gia' il login (aka inserimento manuale del link)
if ($_SESSION['loggedin']) {
    header("Location: error/400.php");
    exit;
}

$setterPagina = new setterTemplate("..");


$setterPagina->setTitle("Registrati | The Darksoulers");
$setterPagina->setDescription("Pagina per la registrazione");


$setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

$setterPagina->setPercorso("Registrati");


//registrazione
$utenteMobile = preg_replace(
    "((?s)<a href=\"<rootFolder />/php/registrazione.php\">Registrati</a>)",
    "<a href=\"#header\" class=\"active\">Registrati</a>",
    file_get_contents(__DIR__ . "/contents/logRegMobileContent.php")
);
$utenteFull = preg_replace(
    "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/php/registrazione.php\">Registrati</a></li>)",
    "<li id=\"currentLink\" class=\"elementomenu\">Registrati</li>",
    file_get_contents(__DIR__ . "/contents/logRegContent.php")
);

$utenteMobile = str_replace("<a href=\"<rootFolder />/php/registrazione.php\">Registrati</a>", "Registrati", $utenteMobile);
$utenteFull = str_replace("<a href=\"<rootFolder />/php/registrazione.php\">Registrati</a>", "Registrati", $utenteFull);

$setterPagina->setLoginContent($utenteFull, $utenteMobile);


//da sistemare una volta implementato il db
$regCon = file_get_contents(__DIR__ . "/contents/registrazioneContent.php");

if ($_SESSION["erroreEmailtrovato"] == true) {
    $regCon = str_replace(
        "<SegnapostoCredenziali />",
        " Hai inserito una Email già inserita da un altro utente ",
        $regCon
    );
    $_SESSION["erroreEmailtrovato"] = false;
}


$setterPagina->setContent($regCon);
$setterPagina->setFooter();

$setterPagina->validate();
