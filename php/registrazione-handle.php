<?php
require_once __DIR__ . '/db-handler.php';
require_once __DIR__ . '/utente-class.php';


session_start();

$_SESSION["nome"]       =   $_POST['nome'];
$_SESSION["cognome"]    =   $_POST['cognome'];
$_SESSION["email"]      =   $_POST['email'];
$_SESSION["password"]   =   $_POST['password1'];


$connection = new DBConnection();




$query      = "INSERT INTO utente (nome,cognome,email,img_path,passw) 
                VALUES (\"{$_POST['nome']}\",\"{$_POST['cognome']}\",\"{$_POST['email']}\",'../img/avatar.jpg',\"{$_POST['password1']}\")";

$connection->query($query);


$user = new Utente($_POST['email']);
$_SESSION['user'] = $user;

$connection->disconnect();
header("Location: ./utente.php");
exit;


?>