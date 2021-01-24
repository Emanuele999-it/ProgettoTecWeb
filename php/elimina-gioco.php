<?php
require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";

session_start();
$connection = new DBConnection();

if (!key_exists("user", $_SESSION)) {
    header("Location: ../error/401.php");
}

$game_id = $_GET['deleteID'];


$connection->query("DELETE FROM gioco WHERE game_id=$game_id");

$connection->disconnect();

header("Location: menu.php?id=4");


?>
