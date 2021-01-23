<?php
	require_once __DIR__ . "/setterTemplate.php";
	require_once __DIR__ . "/query-articoli.php";
	require_once __DIR__ . "/utente-class.php";
	require_once __DIR__ . "/funzioni-utili.php";

	session_start();

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

	//controllo accesso
	if ($_SESSION['loggedin']) {
		$utenteMobile = str_replace("<SegnapostoNomeMobile />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLoginMobile.php"));
		$utenteFull = str_replace("<SegnapostoNome />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLogin.php"));
		$setterPagina->setLoginContent($utenteFull, $utenteMobile);
		}
	else{
		$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"),file_get_contents(__DIR__ . "/contents/logRegMobileContent.php") );
		}




	//modifico il contenuto in base alla query ricevuta
	$artPageCon = file_get_contents(__DIR__ . "/contents/articolopageContent.php");
	$artPageCon = str_replace("<articoloContent />", $htmlArticolo, $artPageCon);

	// DELETE ARTICOLO
	if (key_exists("user", $_SESSION) &&  $_SESSION["user"]->getAdmin()){	
	
		$id = $_GET["id"];
		$artPageCon = str_replace("<SegnapostoDeleteArticolo />",
		 "<div id=\"elimina-articolo\"> <a class=\"torna-su-link\" id=\"delete-articolo\" 
		 href=\" ../php/elimina-articolo.php?deleteID=$id\"> Elimina articolo </a></div>",
		 $artPageCon);
	} else {
		$artPageCon = str_replace("<SegnapostoDeleteArticolo />", "", $artPageCon);
	}		

	$id = $_GET["id"];
	if ($_SESSION['loggedin']) {
		$boxinsertcommento = file_get_contents(__DIR__ . "/contents/box-insert-commento.php");
		$artPageCon = str_replace("<SegnapostoVotoCommenti />",$boxinsertcommento,$artPageCon);
		$inseriticommenti = commentiutenti($id);
		$artPageCon = str_replace("<SegnapostoCommentiInseriti />", "<ul>". $inseriticommenti . "</ul>",$artPageCon);
		}
	else{
		$artPageCon = str_replace("<SegnapostoVotoCommenti />",
		"<div id=\"messagio-commenti-articolo\" >
        <h2>Per accedere alla votazione e alla sezione commenti del gioco fai log in</h2>
		<p>per visualizzare <a href=\"../php/accesso.php\">accedi</a> o <a href=\"../php/registrazione.php\">
		registrati</a></p></div>",$artPageCon);
	}




	$setterPagina->setContent($artPageCon);
	$setterPagina->setFooter();

	$setterPagina->validate()

?>
