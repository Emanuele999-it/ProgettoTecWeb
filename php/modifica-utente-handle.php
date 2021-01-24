<?php
require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";
require_once __DIR__ . "/funzioni-utili.php";

session_start();

$connection = new DBConnection();

if ( $_SESSION['user']->getNome() == $_POST["nome"] && 
     $_SESSION['user']->getCognome() == $_POST["cognome"]  ){
    if ($_SESSION['user']->getEmail() == $_POST["email"] ){
        $_SESSION["erroreEmailIdenticatrovato"] = true;
        header("Location: ./modifica-utente.php");
        exit;
    }
    // CONTROLLO EMAIL GIA' INSERITO
    $_SESSION["erroreEmail"] = controlloEmail($_SESSION["email"]);
    if ( $_SESSION["erroreEmail"] == "2"){
        $_SESSION["erroreEmailtrovato"] = true;
        $_SESSION["erroreEmail"] = "";
        header("Location: ./modifica-utente.php");
        exit;
    }
}

$result = $connection->query("UPDATE utente
SET nome=\"{$_POST["nome"]}\", cognome=\"{$_POST["cognome"]}\", email=\"{$_POST["email"]}\", passw=\"{$_POST["password"]}\" 
WHERE userid=\"{$_SESSION["user"]->getUserid()}\"");

if(!$result) {
    header("Location: ../php/error/400.php");
    exit;
}

$connection->disconnect();
$_SESSION['user']->update();
header("Location: ../php/utente.php");
