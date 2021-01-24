<?php
require_once "./db-handler.php";
require_once "./utente-class.php";

session_start();

$connection = new DBConnection();


$_SESSION["nomedelgioco"]      = $_POST["gioco"];
$_SESSION["cat_id"]            = $_POST['genere-gioco'];
$_SESSION["anno-gioco"]        = $_POST["anno-pubblicazione-gioco"];
$_SESSION["mese-gioco"]        = $_POST["mese-pubblicazione-gioco"];
$_SESSION["giorno-gioco"]      = $_POST["giorno-pubblicazione-gioco"];
$_SESSION["img_path"]          = $_FILES['immagine']['name'];
$_SESSION["alt_immagine"]      = $_POST['alt-immagine'];

//TRAVASO PERCHE' LA QUERY NON VA CON LE VARIABILI SESSION
$nomedelgioco                 = $_SESSION["nomedelgioco"];
$cat_id                       = $_SESSION["cat_id"];
$anno                         = $_SESSION["anno-gioco"];
$mese                         = $_SESSION["mese-gioco"];
$giorno                       = $_SESSION["giorno-gioco"];
$img_path                     = $_SESSION["img_path"];
$alt_immagine                 = $_SESSION["alt_immagine"];

echo "nomefile: ".$img_path;

$data_pub_gioco               = $anno . "-" . $mese . "-" . $giorno;

$isDefaultImage = false;
if ($img_path == "") {
    $img_path = "<rootFolder />/img/noimage.jpg";
    $alt_immagine = "Immagine non presente";
    $isDefaultImage = true;
} else {
    if (!isset($_FILES['immagine']['error'])) {
        throw new Exception("upload IMMAGINE SBAGLIATO", 1);
    }

    $img_path = "<rootFolder />/img/" . basename($_FILES["immagine"]["name"]);
    $target_file = "../img/" . basename($_FILES["immagine"]["name"]);
    $imageFileType = strtolower(pathinfo($_FILES["immagine"]["name"], PATHINFO_EXTENSION));
    move_uploaded_file($_FILES['immagine']['tmp_name'], $target_file);
}


$controllogioco = $connection->query("SELECT nome FROM `gioco`");
while ($row = $controllogioco->fetch_assoc()) {
    $controllogiocotitolo =  $row["nome"];
    if ($controllogiocotitolo == $nomedelgioco) {
        //controllo da fare se gioco gia' presente e nel caso lanciare l'errore
    }
}


if (!$controllotrovato) {
    $result = $connection->query("INSERT INTO gioco (game_id, nome, cat_id,
                                                    data_pubb, img, alt)
                                VALUES (NULL,\"{$nomedelgioco}\",\"{$cat_id}\",
                                        \"{$data_pub_gioco}\",\"{$img_path}\",\"{$alt_immagine}\")");
    if (!$result) {
        throw new Exception("INSERIMENTO GIOCO SBAGLIATO", 1);
        exit;
    }
}

header("Location: ../index.php");
exit;
