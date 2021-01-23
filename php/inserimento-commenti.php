<?php
require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";

session_start();
$connection = new DBConnection();

if (!key_exists("user", $_SESSION)) {
    header("Location: ../error/401.php");
    exit;
}

$idUtente       = $_SESSION['user']->getUserid();
$idarticolo     = $_GET['idarticolo'];
$testo          = $_POST['contenuto-commento'];
$testo          = htmlentities($testo, ENT_QUOTES | ENT_XHTML);
$datacommento   = date("Y-m-d H:i:s");

// INSERT INTO `commento`(`comment_id`, `articolo_id`, `userid`, `testo`, `data_com`)
// VALUES (NULL,1,1,"prova","2020-12-12 12:45:06")
  
$connection->query("INSERT INTO `commento`(`comment_id`, `articolo_id`, `userid`, `testo`, `data_com`)
                         VALUE(NULL, $idarticolo, \"$testo\", $datacommento )");
    $connection->disconnect();

    header("Location: articolo.php?id=$idarticolo#commenti");

?>    


