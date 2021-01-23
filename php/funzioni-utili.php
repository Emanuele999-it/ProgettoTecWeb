<?php
    require_once __DIR__ . "/db-handler.php";
    require_once __DIR__ . "/utente-class.php";


    // \"{$nomedelgioco}\",
    function commentiutenti ($idarticolo) {
        //$userid="user_id";
        $connection = new DBConnection();
        $commenti = $connection->query("SELECT userid,testo,data_com 
                                      FROM commento WHERE articolo_id = \"{$idarticolo}\"   ");

        while ($row = $commenti->fetch_assoc()) {
        $boxcommento = $boxcommento . file_get_contents(__DIR__ . "./contents/box-commento.php");
        $inseriticommenti =  $row["testo"];
        $datacommento = $row["data_com"];
        $boxcommento = str_replace("<Segnapostotestocommento />",$inseriticommenti,$boxcommento);
        $boxcommento = str_replace("<SegnapostoDatacommento />",$datacommento,$boxcommento);    

        $utente      = $connection->query("SELECT nome FROM utente WHERE userid = \"{$row["userid"]}\"   ");
        $row2        = $utente->fetch_assoc();
        $prova       = $row2["nome"];
        $boxcommento = str_replace("<SegnaPostonomeutente />",$prova,$boxcommento);     
//ATTENZIONE CHE CI POSSONO ESSERE ARTICOLI SENZA COMMENTI
        if (!$commenti) {
            throw new Exception("commenti query sbagliata", 1);  //ATTENZIONE CHE CI POSSONO ESSERE ARTICOLI SENZA COMMENTI
            exit;
        } 
        }

        $connection->disconnect();

        return $boxcommento;
    }










?>
