<?php
require_once __DIR__ . '/db-handler.php';
require_once __DIR__ . '/utente-class.php';


session_start();

$_SESSION["nickname"]   =   $_POST['nickname'];
$_SESSION["email"]      =   $_POST['email'];
$_SESSION["password"]   =   $_POST['password1'];

// Funzioni di controllo ???



$connection = new DBConnection();
$connection->query("INSERT INTO utente(nome,email,passw)
                    VALUES (\"{$_POST['nickname']}\",
                    \"{$_POST['email']}\",\"{$_POST['password1']}\");");


$user = new Utente($_POST['nickname']);

// ALTRE INFO DI SESSIONE

header("Location: ./utente.php");



?>