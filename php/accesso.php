<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("..");

    
    $setterPagina->setTitle("Login | The Darksoulers");
    $setterPagina->setDescription("Pagina di login");  

    $setterPagina->setNavBar(
        preg_replace(
            "((?s)<a href=\"<rootFolder />/php/accesso.php\">Accedi</a>)",
            "<a href=\"#header\" class=\"active\">Accedi</a>",
            preg_replace(
                "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/php/accesso.php\">Accedi</a></li>)",
                "<li id=\"currentLink\" class=\"elementomenu\">Accedi</li>",
                file_get_contents(__DIR__ . "/contents/home-nav.php"))));

    $setterPagina->setPercorso("Accedi");
    
    //da sistemare una volta implementato il db
    $accCon = file_get_contents(__DIR__ . "/contents/accessoContent.php");
    $setterPagina->setContent($accCon);
    $setterPagina->setFooter();

    $setterPagina->validate();
?>