<?php
require_once "./db-handler.php";
require_once "./utente-class.php";

session_start();

$connection = new DBConnection();


$_SESSION["titolo"]            = $_POST['titolo']; 
$_SESSION["sommario"]          = $_POST['sommario']; 
$_SESSION["testo"]             = $_POST['recensione'];
$_SESSION["data_pub"]          = date('Y-m-d H:i:s');
$_SESSION["img_path"]          = '';   // NB da fare
$_SESSION["cat_id"]            = $_POST['genere-gioco'];
$_SESSION["alt_immagine"]      = $_POST['alt-immagine']; 
$_SESSION["game_id"]           = 20;  //NB da fare
$_SESSION["prima_pagina"]      = $_POST['prima-pagina']; 

$_SESSION["nomedelgioco"]      = $_POST["gioco"];   // NB da fare
$_SESSION["data_pub"]         = "";   // NB da fare

//TRAVASO PERCHE' LA QUERY NON VA CON LE VARIABILI SESSION
$titolo                       = $_SESSION["titolo"]; 
$sommario                     = $_SESSION["sommario"] ; 
$testo                        = $_SESSION["testo"];
$data_pub_articolo            = $_SESSION["data_pub"];
$img_path                     = $_SESSION["img_path"];
$cat_id                       = $_SESSION["cat_id"];
$alt_immagine                 = $_SESSION["alt_immagine"]; 
$game_id                      = $_SESSION["game_id"];  //NB da fare
$prima_pagina                 = $_SESSION["prima_pagina"]; 

$nomedelgioco                 = ""; // $_POST["nomedelgioco"]
$data_pub_gioco                     = ""; // $_POST["data_pub"];
$data_pub_gioco                     = date("Y-m-d");
$data_pub_articolo                  = date("Y-m-d");


/* QUERY FUNZIONANTE 
INSERT INTO `gioco`(`game_id`, `nome`, `cat_id`, `data_pubb`, `img`, `alt`) 
VALUES (NULL,"",1,"2021-10-30","","")
*/

//QUERY FUNZIONANTE PER INSERIMENTO DEL GIOCO NUOVO ALTRIMENTI NON POSSO INSERIRE L'ARTICOLO

$ultimogame_id=$connection->query("SELECT COUNT(game_id) FROM `gioco`");
while ($row = $ultimogame_id->fetch_assoc()) {
    $game_id =  intval($row['COUNT(game_id)']);
    $game_id = $game_id + 1;                        //INCREMENTO PER OTTENTE IL NUOVO GAME_ID
}

if (!$ultimogame_id) {
    throw new Exception("GET GAME_ID SBAGLIATO", 1);
    exit;
}




$result=$connection->query("INSERT INTO gioco (game_id, nome, cat_id,
                                                 data_pubb, img, alt)
                             VALUES (\"{$game_id}\",\"{$nomedelgioco}\",\"{$cat_id}\",
                                    \"{$data_pub_gioco}\",\"{$img_path}\",\"{$alt_immagine}\")");




if (!$result) {
    throw new Exception("INSERIMENTO GIOCO SBAGLIATO", 1);
    exit;
}

// OTTENGO IL GAME_ID DEL DEL NUOVO GIOCO CHE CORRISPONDE AL NUMERO DI RIGHE

$result=$connection->query("SELECT COUNT(game_id) FROM `gioco`");

while ($row = $result->fetch_assoc()) {
    $game_id =  intval($row['COUNT(game_id)']);
}

// INTVAL LO USO PER CASTARE IL DATO RICEVUTO INDIETRO DA fetch_assoc()

if (!$result) {
    throw new Exception("GET GAME_ID SBAGLIATO", 1);
    exit;
}



/*      QUERY FUNZIONANTE
INSERT INTO articolo (articolo_id,titolo,sommario,testo,data_pub,img_path,cat_id,alt,game_id, prima_pagina ) 
VALUES (NULL,"a","a","a","2020-12-07 18:00:21","",1,"",20, 0)

$result= $connection->query("INSERT INTO articolo (articolo_id,titolo,sommario,
                                                    testo,data_pub,img_path,cat_id,alt,game_id, prima_pagina ) 

VALUES (NULL,'a','a','a','2020-12-07 18:00:21','',1,'',20, 0)");

*/

// OTTENGO  ARTICOLO_ID DEL DEL NUOVO GIOCO CHE CORRISPONDE AL NUMERO DI RIGHE + 1


$ultimoarticolo_id=$connection->query("SELECT COUNT(articolo_id) FROM `articolo`");
while ($row = $ultimoarticolo_id->fetch_assoc()) {
    $articolo_id =  intval($row['COUNT(articolo_id)']);
    $articolo_id = $articolo_id + 1;                        //INCREMENTO PER OTTENTE IL NUOVO ARTICOLO_ID
}

if (!$ultimoarticolo_id) {
    throw new Exception("INSERIMENTO ARTICOLO_ID query SBAGLIATO", 1);
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

if(!isset($_FILES['immagine']['error']) ){
    throw new Exception("upload IMMAGINE SBAGLIATO", 1);
}
//else{throw new Exception("upload OK !!", 1);}

$target_file = "../img/" . basename($_FILES["immagine"]["name"]);
$imageFileType = strtolower(pathinfo($_FILES["immagine"]["name"], PATHINFO_EXTENSION));
$target_dir ="../img/";
move_uploaded_file($_FILES['immagine']['tmp_name'], $target_file);


/* QUERY CORRETTA 
UPDATE articolo SET img_path="prova" WHERE titolo="metal"
 */
$result=$connection->query("UPDATE articolo SET img_path=\"{$target_file}\" WHERE titolo=\"{$titolo}\" ");

if (!$result) {
    throw new Exception("QUERY update file SBAGLIATA", 1);
    exit;
}

if (!$result) {
    throw new Exception("Errore inserimento articolo", 1);
    exit;
}

$connection->disconnect();


header("Location: ./utente.php");
exit;


?>
