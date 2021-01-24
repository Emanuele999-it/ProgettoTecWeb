<?php
require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";

session_start();

$connection = new DBConnection();

$result = $connection->query("UPDATE utente  SET (nome=\"{$_POST["nome"]}\", cognome=\"{$_POST["cognome"]}\", email=\"{$_POST["email"]}\", passw=\"{$_POST["password"]}\") 
WHERE userid=\"{$_SESSION["user"]->getUserid()}\"");
if(!$result) {
    throw new Exception("update utente rip",1);
    exit;
}
$connection->disconnect();
$_SESSION['user']->update();
header("Location: ../php/utente.php");
