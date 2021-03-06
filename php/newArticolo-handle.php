<?php
require_once "./db-handler.php";
require_once "./utente-class.php";

session_start();

$connection = new DBConnection();


$_SESSION["titolo"]            = $_POST['titolo'];
$_SESSION["sommario"]          = $_POST['sommario'];
$_SESSION["testo"]             = $_POST['recensione'];
$_SESSION["img_path"]          = $_FILES['immagine']['name'];
$_SESSION["alt_immagine"]      = $_POST['alt-immagine'];
$_SESSION["prima_pagina"]      = $_POST['prima-pagina'];
$_SESSION["nomedelgioco"]      = $_POST["gioco"];

//TRAVASO PERCHE' LA QUERY NON VA CON LE VARIABILI SESSION
$titolo                       = $_SESSION["titolo"];
$sommario                     = $_SESSION["sommario"];
$testo                        = $_SESSION["testo"];
$img_path                     = $_SESSION["img_path"];
$alt_immagine                 = $_SESSION["alt_immagine"];
$prima_pagina                 = $_SESSION["prima_pagina"];
$nomedelgioco                 = $_SESSION["nomedelgioco"];
$game_id                      = "";
$cat_id                       = "";
$data_pub_articolo            = date("Y-m-d H:i:s");

//controllo se il gioco esiste
$exist = false;
$defaultImg = "";
$defaultAlt = "";
$controllogioco = $connection->query("SELECT nome, cat_id, game_id, img, alt FROM `gioco`");
while ($row = $controllogioco->fetch_assoc()) {
    $controllogiocotitolo =  $row["nome"];
    if ($controllogiocotitolo == $nomedelgioco) {
        $game_id = intval($row['game_id']);
        $cat_id  = intval($row['cat_id']);
        $defaultImg = $row['img'];
        $defaultAlt = $row['alt'];
        $exist = true;
    }
}
if (!$exist) {
    $_SESSION["giono-non-trovato"] = true;
    header("Location: ./newArticolo.php");
}

$useDefaultImage = false;
if ($img_path == "") {
    //prendo l'immagine dal gioco
    $img_path = $defaultImg;
    $alt_immagine = $defaultAlt;
    $useDefaultImage = true;
}

$ultimoarticolo_id = $connection->query("SELECT MAX(articolo_id) FROM articolo");
while ($row = $ultimoarticolo_id->fetch_assoc()) {
    $articolo_id =  intval($row['MAX(articolo_id)']);
    $articolo_id = $articolo_id + 1;
}
if (!$ultimoarticolo_id) {
    throw new Exception("OTTENIMENTO NUOVO ARTICOLO_ID query SBAGLIATO", 1);
    exit;
}

$result = $connection->query("INSERT INTO articolo (articolo_id,titolo, sommario,
                                                  testo, data_pub, img_path,
                                                  cat_id, alt,  game_id, prima_pagina )
                    VALUES (\"{$articolo_id}\", \"{$titolo}\",\"{$sommario}\",
                    \"{$testo}\",\"{$data_pub_articolo}\",\"{$img_path}\",
                    \"{$cat_id}\",\"{$alt_immagine}\",\"{$game_id}\",\"{$prima_pagina}\")");

if (!$result) {
    throw new Exception("INSERIMENTO DATI ARTICOLO query SBAGLIATO", 1);
    exit;
}

if (!$useDefaultImage) {
    if (!isset($_FILES['immagine']['error'])) {
        throw new Exception("upload IMMAGINE SBAGLIATO", 1);
    }

    $img_path = "<rootFolder />/img/" . basename($_FILES["immagine"]["name"]);
    $target_file = "../img/" . basename($_FILES["immagine"]["name"]);
    $imageFileType = strtolower(pathinfo($_FILES["immagine"]["name"], PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['immagine']['tmp_name'], $target_file);


    $result = $connection->query("UPDATE articolo SET img_path=\"{$target_file}\" WHERE articolo_id=\"{$articolo_id}\" ");
    if (!$result) {
        throw new Exception("QUERY ARTICOLO update file SBAGLIATA", 1);
        exit;
    }
}

if ($prima_pagina == 1) {
    $result = $connection->query("UPDATE articolo SET prima_pagina=0");
    $result = $connection->query("UPDATE articolo SET prima_pagina=1 WHERE titolo=\"{$titolo}\" ");
}

if (!$result) {
    throw new Exception("QUERY GIOCO update file SBAGLIATA", 1);
    exit;
}

$connection->disconnect();

header("Location: ../index.php");
exit;
