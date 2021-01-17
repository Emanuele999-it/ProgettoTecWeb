<?php
require_once __DIR__ . '/db-handler.php';
require_once __DIR__ . '/scheda-articolo.php';


function getSingoloArticolo($idArticolo){
    $mysql = new DBconnection;

    $query = "SELECT titolo, sommario, img_path, alt, testo FROM articolo WHERE articolo_id=$idArticolo";
    $result = $mysql->query($query);

    $risultato = "";
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $immagine = $row['img_path'];
            $alt = $row['alt'];
            $titolo = $row['titolo'];
            $sommario = $row['sommario'];  
            $testo = $row['testo'];    
            
            $risultato = composeArticolo($immagine, $alt, $titolo, $sommario, $testo);
        }
    }
    else{
        $risultato = -1;
    }

    $mysql->disconnect();

    return $risultato;
}

function getTitolo($idArticolo){
    $mysql = new DBconnection;

    $query = "SELECT titolo FROM articolo WHERE articolo_id=$idArticolo";
    $result = $mysql->query($query);

    $risultato = "";
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $risultato = $row["titolo"];      
        }
    }
    else{
        $risultato = -1;
    }

    $mysql->disconnect();

    return $risultato;
}

function getArticoli($page, $numArticoli)
{
    $mysql = new DBconnection;

    $page = $page*10;

    $query = "SELECT img_path, alt, titolo, sommario, articolo_id FROM articolo ORDER BY data_pub DESC LIMIT $page,$numArticoli";
    $result = $mysql->query($query);

    $risultato = "";

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $immagine = $row['img_path'];
            $alt = $row['alt'];
            $titolo = $row['titolo'];
            $sommario = $row['sommario']; 
            $idArticolo = $row['articolo_id'];          

            $risultato .= schedaArticolo($immagine, $alt, $titolo, $sommario, $idArticolo);
        }
    }
    else{
        $risultato .= "<p>Nessun articolo presente</p>";
    }

    $mysql->disconnect();

    return $risultato; //ritorna l'html della lista degli articoli (qui è creato tutto ciò che è dentro articoliContent)
}


