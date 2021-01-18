<?php
require_once __DIR__ . '/db-handler.php';
require_once __DIR__ . '/utente-class.php';


session_start();

$_SESSION["nickname"]   =   $_POST['nickname'];
$_SESSION["email"]      =   $_POST['email'];
$_SESSION["password"]   =   $_POST['password1'];

// Funzioni di controllo ???



$connection = new DBConnection();
$query      = "INSERT INTO utente (useri_id,nome,cognome,email,img_path,passw,is_admin)
                VALUES             ('1','1','1','1','1','1','1')";

$result = $mysql->query($query);



/*$prova = $connection->query("INSERT INTO utente(useri_id,nome,cognome,email,img_path,passw,is_admin)
                     VALUES (\"{$_POST['nickname']}\",\"{$_POST['nickname']}\",\"{$_POST['nickname']}\",
                     \"{$_POST['nickname']}\",\"{$_POST['nickname']}\",\"{$_POST['nickname']}\",);");

if (!$prova) {
    throw new Exception ("User doesn't exixst", 1);
    exit;
}*/



//$user = new Utente($_POST['nickname']);

// ALTRE INFO DI SESSIONE

header("Location: ./utente.php");



?>