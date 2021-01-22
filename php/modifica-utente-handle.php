<?php
require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";

session_start();



if ($_GET["item"]=="nome") {
    $connection = new DBConnection();
    $connection->query("UPDATE utente  SET nome=\"{$_POST["nome"]}\" WHERE cognome=\"{$_SESSION["user"]->getCognome()}\"");
    $connection->disconnect();
    $_SESSION['user']->update();
    header("Location: ../php/utente.php");
    exit;
}

if ($_GET["item"]=="cognome") {
    $connection = new DBConnection();
    $connection->query("UPDATE utente  SET cognome=\"{$_POST["cognome"]}\" WHERE nome=\"{$_SESSION["user"]->getNome()}\"");
    $connection->disconnect();
    $_SESSION['user']->update();
    header("Location: ../php/utente.php");
    exit;
}

if ($_GET["item"]=="email") {
    $connection = new DBConnection();
    $connection->query("UPDATE utente  SET email=\"{$_POST["email"]}\" WHERE nome=\"{$_SESSION["user"]->getNome()}\"");
    $connection->disconnect();
    $_SESSION['user']->update();
    header("Location: ../php/utente.php");
    exit;
}

if ($_GET["item"]=="password") {
    $connection = new DBConnection();
    $connection->query("UPDATE utente  SET passw=\"{$_POST["password"]}\" WHERE nome=\"{$_SESSION["user"]->getNome()}\"");
    $connection->disconnect();
    $_SESSION['user']->update();
    header("Location: ../php/utente.php");
    exit;
}


$_SESSION['user']->update();
header("Location: ../php/utente.php");


?>