<?php
require_once __DIR__ . '/db-connection.php';
require_once __DIR__ . '/scheda-articolo.php';

function dieciArticoli($from)
{
    $mysql = new DBconnection;

    $query = "SELECT * FROM articolo ORDER BY data_pub DESC LIMIT $from,10";
    $result = $mysql->query($query);

    require_once __DIR__ . '/scheda-articolo.php';
    $risultato = "";

    if ($result) {

        while ($row = $result->fetch_assoc()) {
            $nome = $row['nome'];
            $difficolta = $row['difficolta'];
            $tempo = $row['tempo'];
            $immagine = $row['img'];

            if ($immagine == null) {

            }

            $votor = $mysql->query("SELECT media({$row['id']});")->fetch_row();
            $voto = $votor[0];
            $voto = number_format($voto, 1);
            $id = $row['id'];
            $link = "<rootFolder />/php/ricetta.php?id=$id&amp;pagina=1";
            $livello = 2;

            $risultato .=
            '<div class="articoloScheda">' .
            schedaArticolo($immagine, $nome, $difficolta, $tempo, $voto, $link, $livello) .
                '</div>';
        }

        $risultato .= "</ul>";
    }

    $mysql->disconnect();

    return [$risultato];
}


