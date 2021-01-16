<?php
require_once __DIR__ . '/db-handler.php';
require_once __DIR__ . '/scheda-articolo.php';

function getArticoli($page, $numArticoli)
{
    $mysql = new DBconnection;

    $page = $page*10;

    $query = "SELECT * FROM articolo ORDER BY data_pub DESC LIMIT $page,$numArticoli";
    $result = $mysql->query($query);

    $risultato = "";

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $immagine = $row['img_path'];
            $alt = $row['alt'];
            $titolo = $row['titolo'];
            $sommario = $row['sommario'];

            
            /*if ($immagine == null) {
                
            }

            $votor = $mysql->query("SELECT media({$row['id']});")->fetch_row();
            $voto = $votor[0];
            $voto = number_format($voto, 1);
            $id = $row['id'];
            $link = "<rootFolder />/php/ricetta.php?id=$id&amp;pagina=1";
            $livello = 2;*/
            

            $risultato .= schedaArticolo($immagine, $alt, $titolo, $sommario);
        }
    }
    else{
        $risultato .= "<p>Nessun articolo presente</p>";
    }

    $mysql->disconnect();

    return $risultato; //ritorna l'html della lista degli articoli (qui è creato tutto ciò che è dentro articoliContent)
}

