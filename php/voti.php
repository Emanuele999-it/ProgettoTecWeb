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
$idarticolo = $_GET['idarticolo'];
$voto = intval($_POST['pulsante-voto']);

$result1=$connection->query("SELECT game_id FROM articolo WHERE articolo_id=\"".$idarticolo."\"");
$result3=$result1->fetch_assoc();
$result4=$result3["game_id"];

$result2=$connection->query("INSERT INTO `voto` (`user_id`, `gioco_id`, `voti`) VALUES( \"".$id."\", \"".$result4."\" ,\"".$voto."\")");
if(!$result2)
{
	throw new Exception("voto non inserito",1);
	exit;
}

$connection->disconnect();
header("Location: ../php/articolo.php?id=$result4.");
exit;
