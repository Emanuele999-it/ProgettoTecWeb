<?php
require_once __DIR__ . "/db-handler.php";
require_once __DIR__ . "/utente-class.php";
session_start();

if (!key_exists("loggedin", $_SESSION) || !$_SESSION["loggedin"]) {
    header("Location: ../error/401.php");
    exit;
}
if (!$_SESSION["user"]->getAdmin()) {
    header("Location: ../403.php");
    exit;
}

$deleteID = intval($_GET['deleteID']);
$connection = new DBConnection();
// DELETE FROM `articolo` WHERE articolo_id=18
$result = $connection->query(" DELETE FROM articolo WHERE articolo_id=\"{$deleteID}\" ");	
if (!$result) {
    throw new Exception("ELIMINAZIONE SBAGLIATO", 1);
    exit;
}
$connection->disconnect();
header("Location: ../index.php");
exit;

?>