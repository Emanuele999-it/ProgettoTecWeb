<?php
require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";

session_start();

$connection = new DBConnection();

if (!key_exists("user", $_SESSION)) {
    header("Location: ../error/401.php");
	exit;
}

$id = $_SESSION['user']->getUserid();
$idarticolo = $_GET['idArticolo'];

$result=$connection->query("DELETE FROM voto WHERE userid=$id AND gioco_id=(SELECT game_id FROM articolo WHERE articolo_id=$idarticolo)");
if (!$result) {
    header("Location: ../error/400.php");
	exit;
}
$connection->disconnect();


header("Location: articolo.php?id=$idarticolo");


?>
