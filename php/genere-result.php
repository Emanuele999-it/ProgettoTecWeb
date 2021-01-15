<?php
require_once __DIR__ . "/setterTemplate.php";

$setterPagina = new setterTemplate("..");

if (key_exists("pagina", $_GET)) {
    if (intval($_GET["pagina"] < 1)) {
        header("Location: error/404.php");
        exit;
    }
}

$categoria = [
    "none",
    "Giochi di ruolo",
    "Sportivi",
    "Sparatutto",
    "Avventura",
    "Azione",
    "Gestionale",
];

$currCat = array_key_exists('id', $_GET) ? $_GET['id'] : 0;

if ($currCat <= 0 || $currCat >= 7) {
    header("Location: error/404.php");
    exit;
}

$setterPagina->setTitle("$categoria[$currCat] | The Darksoulers");
$nav = file_get_contents(__DIR__ . "/contents/home-nav.php");

switch ($currCat) {
    case 0:
        $setterPagina->setDescription("Errore");
        break;
    case 1:
        $setterPagina->setDescription("Elenco degli articoli di categoria Giochi di ruolo");
        break;
    case 2:
        $setterPagina->setDescription("Elenco degli articoli di categoria Sportivi");
        break;
    case 3:
        $setterPagina->setDescription("Elenco degli articoli di categoria Sparatutto");
        break;    
    case 4:
        $setterPagina->setDescription("Elenco degli articoli di categoria Avventura");
        break;
    case 5:
        $setterPagina->setDescription("Elenco degli articoli di categoria Azione");
        break;
    case 6:
        $setterPagina->setDescription("Elenco degli articoli di categoria Gestionale");
        break;
}

//da pescare da database in base al genere
$listaGenCon = file_get_contents(__DIR__ . "/contents/listaArticoliGenereContent.php");
$setterPagina->setContent($listaGenCon);

if ($currCat != 0) {
    $setterPagina->setPercorso("Genere -> " . $categoria[$currCat]);
} else {
    $setterPagina->setPercorso("");
}

$setterPagina->setNavBar($nav);

$setterPagina->setFooter();
$setterPagina->validate();