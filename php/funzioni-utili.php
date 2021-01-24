<?php
    require_once __DIR__ . "/db-handler.php";
    require_once __DIR__ . "/utente-class.php";


    // \"{$nomedelgioco}\",
    function commentiutenti ($idarticolo) {
        //$userid="user_id";
        $connection = new DBConnection();
        $commenti = $connection->query("SELECT comment_id,userid,testo,data_com 
                                      FROM commento WHERE articolo_id = \"{$idarticolo}\"  ");

        $boxcommento = "";                                      


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
        $boxcommento = str_replace("<SegnapostoEliminacommento />","<SegnapostoEliminacommento />",$boxcommento);     
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
            $boxcommento = str_replace("<SegnapostoEliminacommento />",
             "<form class=\"\" method=\"post\" action=\"../php/elimina-commento.php?idarticolo=$idarticolo&amp;
             idcommento=$idcommento\">
             <fieldset class=\"\" style=\"border:none;\">
             <input class=\"tasto-elimina-commento\" type=\"submit\" value=\"Elimina\" />
             </fieldset>
             </form>",
              $boxcommento);
		} else {
			$boxcommento = str_replace("<SegnapostoEliminacommento />", "", $boxcommento);
		}	
        }

        $connection->disconnect();

        return $boxcommento;
    }

    function controlloEmail ($emaildacontrollare){

        $erroreEmail = "";
        $connection = new DBConnection();
        //echo $emaildacontrollare; throw new Exception ("CONTROLLO EMAIL", 1 ); exit;

        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            //echo $emaildacontrollare; throw new Exception ("CONTROLLO EMAIL", 1 ); exit;
            if (empty($emaildacontrollare)) {
                $erroreEmail = "0";         // EMAIL VUOTA
               // echo $emaildacontrollare;throw new Exception ("CONTROLLO EMAIL", 1 ); exit;
            } else {
               // echo $emaildacontrollare; throw new Exception ("CONTROLLO EMAIL", 1 ); exit;
                if (!filter_var($emaildacontrollare, FILTER_VALIDATE_EMAIL)) {
                    $erroreEmail = "1";  // EMAIL NON CORRETTA
                    if ( $erroreEmail == "1") { throw new Exception ("EMAIL NON CORRETTA", 1 ); }
                }
                //echo $emaildacontrollare; throw new Exception ("CONTROLLO EMAIL", 1 ); exit;

                $result = $connection->query(" SELECT email FROM utente
                            WHERE email=\"{$emaildacontrollare}\" ");
                if (!$result) { throw new Exception ("EMAIL NON TROVATA", 1 ); }
                $result2  = $result->fetch_assoc();
                $result3  = $result2["email"];
                if ($result3) {
                    $erroreEmail = "2";            // EMAIL GIA' INSERITA NEL DATABASE
                    //if ( $erroreEmail =="2") { throw new Exception ("// EMAIL GIA' INSERITA NEL DATABASE", 1 ); }   
                }
            }
        $connection->disconnect();    
        return $erroreEmail;

        }
    }



?>