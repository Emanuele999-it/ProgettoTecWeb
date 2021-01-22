<?php
	require_once __DIR__ . "/setterTemplate.php";
	require_once __DIR__ . "/query-articoli.php";
	require_once __DIR__ . "/utente-class.php";

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
	if ($_SESSION["user"]->getAdmin()) {
		$id = $_GET["id"];
		$artPageCon = str_replace("<SegnapostoDeleteArticolo />",
		 "<a class=\"torna-su-link\" id=\"delete-articolo\" href=\" ../php/elimina-articolo.php?deleteID=$id\"> Elimina articolo </a>",
		 $artPageCon);
	} else {
		$artPageCon = str_replace("<SegnapostoDeleteArticolo />", "", $artPageCon);
	}		



	$setterPagina->setContent($artPageCon);
	$setterPagina->setFooter();

	$setterPagina->validate()

?>
