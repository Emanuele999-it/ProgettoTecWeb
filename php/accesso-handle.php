<?php
require_once __DIR__ . "/utente-class.php";
require_once __DIR__ . '/db-handler.php';


session_start();

$_SESSION["email"]       = $_POST['email'];
$_SESSION["password"]    = $_POST['password'];
$_SESSION['loggedin']    = true;

$connection = new DBConnection();

$result=$connection->query("SELECT * FROM `utente`
                             WHERE email=\"{$_POST['email']}\" AND passw=\"{$_POST['password']}\" ");


$user_row = $result->fetch_assoc();
if ($user_row['email'] == "" || $user_row['passw']=="" ){
   // throw new Exception("Credenziali Sbagliate", 1);
    $_SESSION["err-credenziali"]=true;
    $_SESSION['loggedin']    = false;
    header("Location: ./accesso.php");
    exit;
}   

$user = new Utente($_POST['email']);
$_SESSION["user"] = $user;

$connection->disconnect();
header("Location: ./utente.php");
exit;


?>