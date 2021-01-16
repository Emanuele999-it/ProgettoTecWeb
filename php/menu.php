<?php
require_once __DIR__ . "/setterTemplate.php";
require_once __DIR__ . "/query-lista-articoli.php";

$setterPagina = new setterTemplate("..");

//controllo se l'utente e' loggato
$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/php/contents/logRegContent.php"), file_get_contents(__DIR__ . "/php/contents/logRegMobileContent.php"));

if (key_exists("pagina", $_GET)) {
    if (intval($_GET["pagina"] < 1)) {
        header("Location: error/404.php");
        exit;
    }
}

$pag = [
    "Risultati della ricerca",
    "Articoli",
    "Genere",
    "Top 10",
    "Nuove Uscite",
];

$currPag = array_key_exists('id', $_GET) ? $_GET['id'] : 0;

if ($currPag == 0 && !key_exists("termine-ricerca", $_GET)) {
    header("Location: error/400.php");
    exit;
}

if ($currPag < 0 || $currPag >= 5) {
    header("Location: error/404.php");
    exit;
}

$setterPagina->setTitle("$pag[$currPag] | The Darksoulers");
$nav = file_get_contents(__DIR__ . "/contents/home-nav.php");
$pageContent = ""; //bisogna inserire un default

switch ($currPag) {
    case 0:
        $setterPagina->setDescription("Elenco degli articoli il cui nome contiene il termine ricercato");
        break;
    case 1:
        $setterPagina->setDescription("Elenco di tutti gli articoli");
        $pageContent = "<div  id=\"contenutoArticoli\" class=\"contenutoGenerale\" >";
        $pageContent .= getArticoli(0, 10) . "</div>";
        break;
    case 2:
        $setterPagina->setDescription("Elenco dei generi dei videogames");
        $pageContent = file_get_contents(__DIR__ . "/contents/genereContent.php");
        break;
    case 3:
        $setterPagina->setDescription("Elendo dei top 10 giochi più votati");
        $pageContent = file_get_contents(__DIR__ . "/contents/top10Content.php");
        break;    
    case 4:
        $setterPagina->setDescription("Nuove uscite");
        $pageContent = file_get_contents(__DIR__ . "/contents/nuoveusciteContent.php");
        break;
}

$setterPagina->setContent($pageContent);

if ($currPag != 0) {
    $nav = preg_replace(
            "((?s)<a href=\"<rootFolder />/php/menu\.php\?id=$currPag\">.*?</a>)",
            "<a href=\"#header\" class=\"active\" xml:lang=\"en\">$pag[$currPag]</a>",
            preg_replace(
                "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/php/menu\.php\?id=$currPag\">.*?</a></li>)",
                "<li xml:lang=\"en\" id=\"currentLink\" class=\"elementomenu\">$pag[$currPag]</li>",
                $nav));

    $setterPagina->setPercorso($pag[$currPag]);
} else {
    $setterPagina->setPercorso("Ricerca");
}

$setterPagina->setNavBar($nav);

$setterPagina->setFooter();
$setterPagina->validate();