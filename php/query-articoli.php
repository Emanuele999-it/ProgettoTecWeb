<?php
require_once __DIR__ . '/db-handler.php';
require_once __DIR__ . '/scheda-articolo.php';


function getSingoloArticolo($idArticolo){
    $mysql = new DBconnection;

    $query = "SELECT titolo, sommario, img_path, alt, testo FROM articolo WHERE articolo_id=".$idArticolo;
    $result = $mysql->query($query);

    $risultato = "";
    if (mysqli_num_rows($result)) {
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

    if (mysqli_num_rows($result)) {
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

    $query = "SELECT titolo FROM articolo WHERE articolo_id=".$idArticolo;
    $result = $mysql->query($query);

    $risultato = "";
    if (mysqli_num_rows($result)) {
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
    $query .= " ORDER BY data_pub DESC LIMIT ".$page.",".$numArticoli;
    $result = $mysql->query($query);

    $risultato = "";

    if (mysqli_num_rows($result)) {
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

function contaArticoli($paginaRichiesta, $ut){
    $mysql = new DBconnection;

    $query = "";
    switch($paginaRichiesta){
        case "articoli":
            $query = "SELECT count(*) AS num FROM articolo ";
            break;
        case "nuove uscite":
            $todayDate = date("Y-m-d");
            $query = "SELECT count(*) AS num FROM (SELECT * FROM `gioco` WHERE data_pubb > \"" . $todayDate . "\" ) AS Q1";
            break;
        case "genere":
            $query = "SELECT count(*) AS num FROM (SELECT articolo_id FROM articolo WHERE cat_id=" . $ut . ") AS Q1 ";
            break;
        case "ricerca":
            $query = "SELECT count(*) AS num FROM (select a.img_path, a.alt, a.titolo, a.sommario, a.articolo_id from articolo a join categoria c on (a.cat_id =c.cat_id)
            where c.nome LIKE '%".$ut."%' OR a.titolo LIKE '%".$ut."%' OR a.sommario LIKE '%".$ut."%' OR a.testo LIKE '%".$ut."%') AS Q1";
            break;
    }


    $result = $mysql->query($query);

    $num = 0;


    if (mysqli_num_rows($result)) {
        $row=$result->fetch_assoc();
        $num=$row['num'];
    }
    else{
        $num = -1;
    }

    $mysql->disconnect();

    return $num;
}

function cercaArticoli($value, $page)
{
    $mysql = new DBconnection;

    $page = $page*10;

    $query = "select a.img_path, a.alt, a.titolo, a.sommario, a.articolo_id from articolo a join categoria c on (a.cat_id =c.cat_id)
    where c.nome LIKE '%".$value."%' OR a.titolo LIKE '%".$value."%' OR a.sommario LIKE '%".$value."%' OR a.testo LIKE '%".$value."%' LIMIT ".$page.", 10";
    $result = $mysql->query($query);

    $risultato = "";

    if (mysqli_num_rows($result)) {
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
        $risultato .= "<p>Nessun articolo trovato</p>";
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

    if (mysqli_num_rows($result)) {
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

function getNuoveUscite($page)
{
    $mysql = new DBconnection;

    $page = $page*10;
    $todayDate = date("Y-m-d");
    $query = "SELECT * FROM `gioco` WHERE data_pubb > \"" . $todayDate . "\" ORDER BY data_pubb ASC LIMIT " . $page
        . ", 10";
    $result = $mysql->query($query);

    $risultato = "<h1> PROSSIME USCITE</h1>";

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $immagine = $row['img'];
            $alt = $row['alt'];
            $gioco = $row['nome'];
            $data_pubb = $row['data_pubb'];
            $gioco_id = $row['game_id'];
            
            $risultato .= schedaNuovaUscita($immagine, $alt, $gioco, $data_pubb, $gioco_id);


        }
    }
    else{
        $risultato .= "<p>Nessun gioco in uscita</p>";
    }

    $mysql->disconnect();

    return $risultato;
}

function getArticoliDaGenere($page, $numArticoli, $woPrincipale = false, $categoria)
{
    $mysql = new DBconnection;

    $page = $page*10;

    $query = "SELECT img_path, alt, titolo, sommario, articolo_id FROM articolo WHERE cat_id=" . $categoria;
    if($woPrincipale) $query .= " AND prima_pagina = 0 ";
    $query .= " ORDER BY data_pub DESC LIMIT ".$page.",".$numArticoli;
    $result = $mysql->query($query);

    $risultato = "";

    if (mysqli_num_rows($result)) {
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

function getVotoArticolo($idArticolo, $userId)
{
    $mysql = new DBconnection;
    $query = "SELECT voto FROM voto v join articolo a on v.gioco_id = a.game_id WHERE v.userid=$userId  AND a.articolo_id=$idArticolo";
    $result = $mysql->query($query);

    $risultato = "";

    if (mysqli_num_rows($result)) {
        while ($row = $result->fetch_assoc()) {
            $voto = $row['voto'];
            $risultato = $voto;
        }
    
    }

    $mysql->disconnect();

    return $risultato;
}
