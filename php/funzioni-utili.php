<?php
    require_once __DIR__ . "/db-handler.php";
    require_once __DIR__ . "/utente-class.php";


    // \"{$nomedelgioco}\",
    function commentiutenti ($idarticolo) {
        //$userid="user_id";
        $connection = new DBConnection();
        $commenti = $connection->query("SELECT comment_id,userid,testo,data_com 
                                      FROM commento WHERE articolo_id = \"{$idarticolo}\"   ");

        while ($row = $commenti->fetch_assoc()) {
        $boxcommento = $boxcommento . file_get_contents(__DIR__ . "/contents/box-commento.php");
        $inseriticommenti =  $row["testo"];
        $datacommento = $row["data_com"];
        $boxcommento = str_replace("<Segnapostotestocommento />",$inseriticommenti,$boxcommento);
        $boxcommento = str_replace("<SegnapostoDatacommento />",$datacommento,$boxcommento);    

        $utente      = $connection->query("SELECT nome FROM utente WHERE userid = \"{$row["userid"]}\"   ");
        $row2        = $utente->fetch_assoc();
        $prova       = $row2["nome"];
        $boxcommento = str_replace("<SegnaPostonomeutente />",$prova,$boxcommento);
        $boxcommento = str_replace("<SegnapostoEliminacommento />","<SegnapostoEliminacommento$userid />",$boxcommento);     
//ATTENZIONE CHE CI POSSONO ESSERE ARTICOLI SENZA COMMENTI
        if (!$commenti) {
            throw new Exception("commenti query sbagliata", 1);  //ATTENZIONE CHE CI POSSONO ESSERE ARTICOLI SENZA COMMENTI
            exit;
        } 
        // TASTO ELIMINA COMMENTO
        $idutentecommento = $row["userid"];
        $idcommento       = $row["comment_id"];
/*
        echo "<p>PROVA ID UTENTE COMMENTO</p>".$idutentecommento."<p>PROVA</p>";
        echo "<p>PROVA ID USER ID</p>".$_SESSION['user']->getUserid()."<p>PROVA</p>";
        echo $_SESSION['user']->getAdmin();
        throw new Exception("PROVA STAMPA ID UTENTE", 1);
*/
		if ( ($idutentecommento == $_SESSION['user']->getUserid()) || $_SESSION['user']->getAdmin()) {
            $boxcommento = str_replace("<SegnapostoEliminacommento$userid />",
             "<form class=\"\" method=\"post\" action=\"../php/elimina-commento.php?idarticolo=$idarticolo&amp;
             idcommento=$idcommento\">
             <fieldset class=\"\" style=\"border:none;\">
             <input class=\"tasto-elimina-commento\" type=\"submit\" value=\"Elimina\" >
             </fieldset>
             </form>",
              $boxcommento);
		} else {
			$boxcommento = str_replace("<SegnapostoEliminacommento$userid />", "", $boxcommento);
		}	
        }

        $connection->disconnect();

        return $boxcommento;
    }










?>
