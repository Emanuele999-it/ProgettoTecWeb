<?php

require_once __DIR__ . "/setterTemplate.php";
require_once __DIR__ . '/utente-class.php';

session_start();

$setterPagina = new setterTemplate("..");

$setterPagina->setTitle("Utente | The Darksoulers");
$setterPagina->setDescription("Pagina modifica informazioni utente");  

$setterPagina->setNavBar(file_get_contents(__DIR__ . "/contents/home-nav.php"));

$setterPagina->setPercorso("Utente");

$modificautenteCon = file_get_contents(__DIR__ . "/contents/modifica-utente-content.php");
$modificautenteCon = str_replace("<SegnapostoNome />",$_SESSION['user']->getNome(),$modificautenteCon);
$modificautenteCon = str_replace("<SegnapostoCognome />",$_SESSION['user']->getCognome(),$modificautenteCon);
$modificautenteCon = str_replace("<SegnapostoEmail />",$_SESSION['user']->getEmail(),$modificautenteCon);




$setterPagina->setContent($modificautenteCon);
$setterPagina->setFooter();



$setterPagina->validate();
?>





