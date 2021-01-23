<?php
require_once __DIR__ . "/setterTemplate.php";
require_once __DIR__ . "/query-articoli.php";
require_once __DIR__ . "/utente-class.php";
require_once __DIR__ . "/navArticoli.php";

session_start();

$setterPagina = new setterTemplate("..");


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

$termineCerca = $_GET['termine-ricerca'];
$pagNav = array_key_exists('page', $_GET)  ? $_GET['page'] : 0;

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
        $pageContent = "<div  id=\"contenutoArticoli\" class=\"contenutoGenerale\" >";
        $numArticoli = contaArticoli("ricerca",$termineCerca);
        $pageContent .= cercaArticoli($termineCerca, $pagNav) . navArticoli($numArticoli, $pagNav) . "</div>";
        $replacingLink = "menu.php?termine-ricerca=" . $termineCerca;
        $pageContent = str_replace("<navArtPlaceholder />", $replacingLink,$pageContent);
        break;
    case 1:
        $setterPagina->setDescription("Elenco di tutti gli articoli");
        $pageContent = "<div  id=\"contenutoArticoli\" class=\"contenutoGenerale\" >";
        $numArticoli = contaArticoli("articoli","");
        $pageContent .= getArticoli($pagNav, 10) . navArticoli($numArticoli, $pagNav) . "</div>";
        $pageContent = str_replace("<navArtPlaceholder />", "menu.php?id=1",$pageContent);
        break;
    case 2:
        $setterPagina->setDescription("Elenco dei generi dei videogames");
        $pageContent = file_get_contents(__DIR__ . "/contents/genereContent.php");
        break;
    case 3:
        $setterPagina->setDescription("Elenco dei top 10 giochi più votati");
        $pageContent = "<div class=\"contenutoGenerale\" id=\"contenutoArticoli\" >";
        $pageContent .= getTop10() . "</div>";
        break;    
    case 4:
        $setterPagina->setDescription("Nuove uscite");
        $pageContent = "<div  class=\"contenutoGenerale\" id=\"contenutoArticoli\" >";
        $numArticoli = contaArticoli("nuove uscite","");
        $pageContent .= getNuoveUscite($pagNav) . navArticoli($numArticoli, $pagNav) . "</div>";
        $pageContent = str_replace("<navArtPlaceholder />", "menu.php?id=4",$pageContent);
        break;
}
$pageContent .= "<div class=\"torna-su\" ><a class=\"torna-su-link\" href=\"#header\">Torna su</a></div>";

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

    if($currPag == 1){
        $nav = preg_replace(
            "((?s)<a href=\"<rootFolder />/php/menu\.php\?id=$currPag\">.*?</a>)",
            "<a href=\"#header\" class=\"active\" xml:lang=\"en\">$pag[$currPag]</a>",
            preg_replace(
                "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/php/menu\.php\?id=$currPag\">.*?</a></li>)",
                "<li xml:lang=\"en\" id=\"currentLink\" class=\"elementomenu\">$pag[$currPag]</li>",
                $nav));
    }
    $setterPagina->setPercorso("Ricerca");
}

$setterPagina->setNavBar($nav);


if ($_SESSION['loggedin']) {
	$utenteMobile = str_replace("<SegnapostoNomeMobile />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLoginMobile.php"));
	$utenteFull = str_replace("<SegnapostoNome />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLogin.php"));
	$setterPagina->setLoginContent($utenteFull, $utenteMobile);
	}
else{
	$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"),file_get_contents(__DIR__ . "/contents/logRegMobileContent.php") );
	}

$setterPagina->setFooter();
$setterPagina->validate();