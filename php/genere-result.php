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

$listaGenCon = "<div  id=\"contenutoArticoli\" class=\"contenutoGenerale\" >";
switch ($currCat) {
    case 0:
        $setterPagina->setDescription("Errore");
        $listaGenCon = "<p>Errore</p>";
        break;
    case 1:
        $setterPagina->setDescription("Elenco degli articoli di categoria Giochi di ruolo");
        $listaGenCon = getArticoliDaGenere(0, 10, false, 1) . "</div>";
        break;
    case 2:
        $setterPagina->setDescription("Elenco degli articoli di categoria Sportivi");
        $listaGenCon = getArticoliDaGenere(0, 10, false, 2) . "</div>";
        break;
    case 3:
        $setterPagina->setDescription("Elenco degli articoli di categoria Sparatutto");
        $listaGenCon = getArticoliDaGenere(0, 10, false, 3) . "</div>";
        break;    
    case 4:
        $setterPagina->setDescription("Elenco degli articoli di categoria Avventura");
        $listaGenCon = getArticoliDaGenere(0, 10, false, 4) . "</div>";
        break;
    case 5:
        $setterPagina->setDescription("Elenco degli articoli di categoria Azione");
        $listaGenCon = getArticoliDaGenere(0, 10, false, 5) . "</div>";
        break;
    case 6:
        $setterPagina->setDescription("Elenco degli articoli di categoria Gestionale");
        $listaGenCon = getArticoliDaGenere(0, 10, false, 6) . "</div>";
        break;
}

$listaGenCon .= "<div class=\"torna-su\" ><a class=\"torna-su-link\" href=\"#header\">Torna su</a></div>";
$setterPagina->setContent($listaGenCon);

if ($currCat != 0) {
    $setterPagina->setPercorso("Genere -> " . $categoria[$currCat]);
} else {
    $setterPagina->setPercorso("");
}

$setterPagina->setNavBar($nav);

$setterPagina->setFooter();
$setterPagina->validate();