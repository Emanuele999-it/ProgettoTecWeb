<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("..");

    
    $setterPagina->setTitle("Registrati | The Darksoulers");
    $setterPagina->setDescription("Pagina per la registrazione");  

    $setterPagina->setNavBar(
        preg_replace(
            "((?s)<a href=\"<rootFolder />/php/registrazione.php\">Registrati</a>)",
            "<a href=\"#header\" class=\"active\">Registrati</a>",
            preg_replace(
                "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/php/registrazione.php\">Registrati</a></li>)",
                "<li id=\"currentLink\" class=\"elementomenu\">Registrati</li>",
                file_get_contents(__DIR__ . "/contents/home-nav.php"))));

    $setterPagina->setPercorso("Registrati");
    
    //da sistemare una volta implementato il db
    $setterPagina->setContent("registrazioneContent.php");
    $setterPagina->setFooter();

    $setterPagina->validate();
?>