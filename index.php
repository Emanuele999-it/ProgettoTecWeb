<?php
    require_once __DIR__ . "/php/setterTemplate.php";

    $setterPagina = new setterTemplate(".");

    $setterPagina->setTitle("The Darksoulers");
    $setterPagina->setDescription("Pagina iniziale del sito The Darksoulers");  

    //controllo se l'utente e' loggato
    $setterPagina->setLoginContent(file_get_contents(__DIR__ . "/php/contents/logRegContent.php"), file_get_contents(__DIR__ . "/php/contents/logRegMobileContent.php"));

    $setterPagina->setNavBar(
        preg_replace(
            "((?s)<a href=\"<rootFolder />/index.php\" xml:lang=\"en\">Home</a>)",
            "<a href=\"#header\" class=\"active\" xml:lang=\"en\">Home</a>",
            preg_replace(
                "((?s)<li class=\"elementomenu\"><a href=\"<rootFolder />/index.php\" xml:lang=\"en\">Home</a></li>)",
                "<li xml:lang=\"en\" id=\"currentLink\" class=\"elementomenu\">Home</li>",
                file_get_contents(__DIR__ . "/php/contents/home-nav.php"))));

    $setterPagina->setPercorso("<span xml:lang=\"en\"> Home</span>");
    
    //da sistemare una volta implementato il db
    $HomCon = file_get_contents(__DIR__ . "/php/contents/homeContent.php");
    $setterPagina->setContent($HomCon);
    $setterPagina->setFooter();

    $setterPagina->validate();
?>