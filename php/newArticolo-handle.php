<?php
require_once "./db-handler.php";
require_once "./utente-class.php";

session_start();

$connection = new DBConnection();


$_SESSION["titolo"]            = $_POST['titolo']; 
$_SESSION["sommario"]          = $_POST['sommario']; 
$_SESSION["testo"]             = $_POST['recensione'];
//$_SESSION["data_pub"]          = date('Y-m-d H:i:s');
$_SESSION["anno-gioco"]        = $_POST["anno-pubblicazione-gioco"]; 
$_SESSION["mese-gioco"]        = $_POST["mese-pubblicazione-gioco"]; 
$_SESSION["giorno-gioco"]        = $_POST["giorno-pubblicazione-gioco"]; 
$_SESSION["img_path"]          = '';   // FATTO
$_SESSION["cat_id"]            = $_POST['genere-gioco'];
$_SESSION["alt_immagine"]      = $_POST['alt-immagine']; 
$_SESSION["game_id"]           = "";  // FATTO
$_SESSION["prima_pagina"]      = $_POST['prima-pagina']; 
$_SESSION["nomedelgioco"]      = $_POST["gioco"];   // FATTO
$_SESSION["data_pub"]         = "";   // FATTO

//TRAVASO PERCHE' LA QUERY NON VA CON LE VARIABILI SESSION
$titolo                       = $_SESSION["titolo"]; 
$sommario                     = $_SESSION["sommario"] ; 
$testo                        = $_SESSION["testo"];
//$data_pub_articolo            = $_SESSION["data_pub"];
$anno                         = $_SESSION["anno-gioco"];
$mese                         = $_SESSION["mese-gioco"];
$giorno                       = $_SESSION["giorno-gioco"];
$img_path                     = $_SESSION["img_path"];
$cat_id                       = $_SESSION["cat_id"];
$alt_immagine                 = $_SESSION["alt_immagine"]; 
$game_id                      = $_SESSION["game_id"];       // FATTO
$prima_pagina                 = $_SESSION["prima_pagina"]; 

$nomedelgioco                 =  $_POST["gioco"]; // "";
$data_pub_gioco               = $anno. "-" . $mese. "-" . $giorno ;
$data_pub_articolo            = date("Y-m-d H:i:s");


if($img_path != ""){
    $img_path = "<rootFolder />/img/noimage.jpg";
    $alt_immagine = "Immagine non presente";
}

//CONTROLLO SE IL GIOCO ESISTE GIA' NEL DATABASE
$controllotrovato=false;
$controllogioco=$connection->query("SELECT nome FROM `gioco`");
while ($row = $controllogioco->fetch_assoc()) {
    $controllogiocotitolo =  $row["nome"];
    if ( $controllogiocotitolo == $nomedelgioco )
        $controllotrovato=true;
}
if (!$controllogioco) {
    throw new Exception("CONTROLLO GIOCO SBAGLIATO", 1);
    exit;
} 

 
//QUERY FUNZIONANTE PER INSERIMENTO DEL GIOCO NUOVO ALTRIMENTI NON POSSO INSERIRE L'ARTICOLO
//INSERIMENTO GIOCO OPPURE NO  
if (!$controllotrovato){
        $result=$connection->query("INSERT INTO gioco (game_id, nome, cat_id,
                                                        data_pubb, img, alt)
                                    VALUES (NULL,\"{$nomedelgioco}\",\"{$cat_id}\",
                                            \"{$data_pub_gioco}\",\"{$img_path}\",\"{$alt_immagine}\")");
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("errore query")';
            echo 'alert("INSERT INTO gioco (game_id, nome, cat_id,
            data_pubb, img, alt)
VALUES (NULL,\"{$nomedelgioco}\",\"{$cat_id}\",
\"{$data_pub_gioco}\",\"{$img_path}\",\"{$alt_immagine}\")")';
            echo '</script>';
            throw new Exception("INSERIMENTO GIOCO SBAGLIATO", 1);
            exit;
        }
} 
else {

}

// OTTENGO IL GAME_ID DEL   GIOCO 
$result=$connection->query("SELECT game_id FROM `gioco` WHERE nome=\"{$nomedelgioco}\" ");
if (!$result) {
    throw new Exception("GET GAME_ID SBAGLIATO", 1);
    exit;
}
while ($row = $result->fetch_assoc()) {
    $game_id =  intval($row['game_id']);
}
// INTVAL LO USO PER CASTARE IL DATO RICEVUTO INDIETRO DA fetch_assoc()



$ultimoarticolo_id=$connection->query("SELECT MAX(articolo_id) FROM articolo");
while ($row = $ultimoarticolo_id->fetch_assoc()) {
    $articolo_id =  intval($row['MAX(articolo_id)']);
    $articolo_id = $articolo_id + 1;                        //INCREMENTO PER OTTENTE IL NUOVO ARTICOLO_ID
}
if (!$ultimoarticolo_id) {
    throw new Exception("OTTENIMENTO NUOVO ARTICOLO_ID query SBAGLIATO", 1);
    exit;
}


$result=$connection->query("INSERT INTO articolo (articolo_id,titolo, sommario,
                                                  testo, data_pub, img_path,
                                                  cat_id, alt,  game_id, prima_pagina )
                    VALUES (\"{$articolo_id}\", \"{$titolo}\",\"{$sommario}\",
                    \"{$testo}\",\"{$data_pub_articolo}\",\"{$img_path}\",
                    \"{$cat_id}\",\"{$alt_immagine}\",\"{$game_id}\",\"{$prima_pagina}\")");
if (!$result) {
    throw new Exception("INSERIMENTO DATI ARTICOLO query SBAGLIATO", 1);
    exit;
}




////////////////////////////////////////////////////////////////////////////////////////////FILE IMMAGINE
if(!isset($_FILES['immagine']['error']) ){
    throw new Exception("upload IMMAGINE SBAGLIATO", 1);
}
//controllo imgpath
$target_file = "<rootFolder />/img/noimage.jpg";
if($img_path != ""){
    $target_file = "<rootFolder />/img/" . basename($_FILES["immagine"]["name"]);
    $imageFileType = strtolower(pathinfo($_FILES["immagine"]["name"], PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['immagine']['tmp_name'], $target_file);
}

// UPDATE SET per il path immagine di articolo

    $result=$connection->query("UPDATE articolo SET img_path=\"{$target_file}\" WHERE titolo=\"{$titolo}\" ");
    if (!$result) {
        throw new Exception("QUERY ARTICOLO update file SBAGLIATA", 1);
        exit;
        }

/*      QUERY CORRETTA
    UPDATE gioco SET img="../img/metalgear.jpg" WHERE nome="a"
*/
//UPDATE SET per il path immaggine di gioco
if (!$controllotrovato){
    $result=$connection->query("UPDATE gioco SET img=\"{$target_file}\" WHERE nome=\"{$nomedelgioco}\" ");
    if (!$result) {
        throw new Exception("QUERY GIOCO update file SBAGLIATA", 1);
        exit;
}
}

if ($prima_pagina == 1){
    $result=$connection->query("UPDATE articolo SET prima_pagina=0");
    $result=$connection->query("UPDATE articolo SET prima_pagina=1 WHERE titolo=\"{$titolo}\" ");
}



if (!$result) {
        throw new Exception("QUERY GIOCO update file SBAGLIATA", 1);
        exit;
}

$connection->disconnect();

header("Location: ../index.php");
exit;

?>
