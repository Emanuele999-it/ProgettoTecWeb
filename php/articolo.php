<?php
	require_once __DIR__ . "/setterTemplate.php";
	require_once __DIR__ . "/query-articoli.php";
	require_once __DIR__ . "/utente-class.php";
	require_once __DIR__ . "/funzioni-utili.php";

	session_start();

	$setterPagina = new setterTemplate("..");

	//controllo se l'utente e' loggato
	$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"), file_get_contents(__DIR__ . "/contents/logRegMobileContent.php"));

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

	$connection= new DBConnection();
	//controllo accesso
	if ($_SESSION['loggedin']) {

		$QVoto=getVotoArticolo($idArticolo, $_SESSION['user']->getUserid());

        if ($QVoto!="") {
			$idGame = array_key_exists('id', $_GET) ? $_GET['id'] : 0;
			
            $votare = "<p>Hai valutato questo gioco con un punteggio di: " . strval($QVoto) . "/5</p><br/>
			<form action=\"<rootFolder />/php/elimina-voto.php?idgame=$idGame&amp;idArticolo=$idArticolo\" method=\"post\">
			<input class=\"torna-su-link\" type=\"submit\" value= \"Ripensamenti? Elimina il tuo voto\"/></form>";
        } 
		else{
			
			$votare = file_get_contents(__DIR__ . "/contents/form-voto.php");
			$votare= str_replace("<segnapostoIdArticolo />",$idArticolo,$votare);
		}

		$utenteMobile = str_replace("<SegnapostoNomeMobile />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLoginMobile.php"));
		$utenteFull = str_replace("<SegnapostoNome />", $_SESSION['user']->getNome(), file_get_contents(__DIR__ . "/contents/userLogin.php"));
		$setterPagina->setLoginContent($utenteFull, $utenteMobile);
    } 
	else {
		$setterPagina->setLoginContent(file_get_contents(__DIR__ . "/contents/logRegContent.php"),file_get_contents(__DIR__ . "/contents/logRegMobileContent.php") );
		$votare = file_get_contents(__DIR__ . "/contents/accediORegistratiVoto.php");
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
		$artPageCon = str_replace("<SegnapostoIDarticolo />",$id,$artPageCon);
		$inseriticommenti = commentiutenti($id);
		$artPageCon = str_replace("<SegnapostoCommentiInseriti />", "<ul>". $inseriticommenti . "</ul>",$artPageCon);
	
	}
	else{
		$artPageCon = str_replace("<SegnapostoVotoCommenti />",
		"<div id=\"messagio-commenti-articolo\" >
        <h2>Per accedere alla votazione e alla sezione commenti del gioco fai log in</h2>
		<a href=\"../php/accesso.php\">accedi</a> o <a href=\"../php/registrazione.php\">
		registrati</a></div>",$artPageCon);
		$artPageCon = str_replace("<SegnapostoCommentiInseriti />", "",$artPageCon);
	}



	$artPageCon = str_replace("<segnapostoVoto />", $votare, $artPageCon);
	$setterPagina->setContent($artPageCon);
	$setterPagina->setFooter();

	$setterPagina->validate()

?>
