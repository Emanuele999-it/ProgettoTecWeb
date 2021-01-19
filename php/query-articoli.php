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

function getArticoloPrincipale(){

    $mysql = new DBconnection;

    $query = "SELECT img_path, alt, titolo, sommario, articolo_id FROM articolo WHERE prima_pagina = 1 LIMIT 1";
    $result = $mysql->query($query);

    $risultato = "";

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $immagine = $row['img_path'];
            $alt = $row['alt'];
            $titolo = $row['titolo'];
            $sommario = $row['sommario']; 
            $idArticolo = $row['articolo_id'];          

            $risultato .= schedaPrincipale($immagine, $alt, $titolo, $sommario, $idArticolo);
        }
    }
    else{
        $risultato = "";
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

function getArticoli($page, $numArticoli, $woPrincipale = false)
{
    $mysql = new DBconnection;

    $page = $page*10;

    $query = "SELECT img_path, alt, titolo, sommario, articolo_id FROM articolo ";
    if($woPrincipale) $query .= " WHERE prima_pagina = 0 ";
    $query .= " ORDER BY data_pub DESC LIMIT $page,$numArticoli";
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

    return $risultato;
}

function getTop10()
{
    $mysql = new DBconnection;

    $query = "SELECT gioco_id, nome, avg(voto) AS votoM, img, alt FROM voto, gioco WHERE voto.gioco_id=gioco.game_id
        GROUP BY voto.gioco_id ORDER BY votoM DESC LIMIT 0,10";
    $result = $mysql->query($query);

    $risultato = "<h1>TOP 10 giochi piu votati</h1>";

    if ($result) {
        $iter = 1;
        while ($row = $result->fetch_assoc()) {
            $immagine = $row['img'];
            $alt = $row['alt'];
            $gioco = $row['nome'];
            $votoM = $row['votoM'];
            
            $risultato .= schedaTop10($immagine, $alt, $gioco, $votoM, $iter);

            $iter += 1;
        }
    }
    else{
        $risultato .= "<p>Nessun gioco presente</p>";
    }

    $mysql->disconnect();

    return $risultato;
}
