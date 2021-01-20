<?php

require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";
session_start();

if ($_POST["utente-password"] == $_SESSION['user']->getPassword()) {
    

    $connection = new DBConnection();
    $userEmail = $_SESSION["user"]->getEmail();
    $email = $_SESSION['user']->getPassword();
    $connection->query("DELETE FROM utente WHERE  email=\"{$email}\"");
    $connection->disconnect();

    session_unset();

    session_destroy();

    header("Location: ../index.php");
    exit;
} else {
    $_SESSION["wrong"] = "";

    header("Location: ./utente.php");
    exit;
}




?>