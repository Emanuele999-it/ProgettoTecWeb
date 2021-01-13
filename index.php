<?php
    require_once __DIR__ . "/php/setterTemplate.php";

    $setterPagina = new setterTemplate(".");

    $setterPagina->setTitle("The Darksoulers");
    $setterPagina->setDescription("Pagina iniziale del sito The Darksoulers");  

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
    $setterPagina->setContent("homeContent.php");
    $setterPagina->setFooter();

    $setterPagina->validate();
?>