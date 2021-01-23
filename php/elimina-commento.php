<?php
require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";

session_start();
$connection = new DBConnection();

if (!key_exists("user", $_SESSION)) {
    header("Location: ../error/401.php");
}

$idarticolo = $_GET['idarticolo'];
$idcommento = $_GET['idcommento'];

$result = $connection->query("SELECT commento FROM commento WHERE comment_id=$idcommento");

$connection->query("DELETE FROM commento WHERE comment_id=$idcommento");

$connection->disconnect();

header("Location: articolo.php?id=$idarticolo#commenti");


?>