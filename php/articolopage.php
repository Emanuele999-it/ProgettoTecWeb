<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("../");

    /*manca codice per settare i meta, da inserire nella classe in setterTemplate*/

    $setterPagina->setHeader();
    
    //la riga seguente andrà sostituita con lo script per importare dal database
    //una volta fatto lo script per recuperare dal database VA ELIMINATO il file articolopageContent
    $artPageCon = file_get_contents(__DIR__ . "/contents/articolopageContent.php");
    $setterPagina->setContent($artPageCon);
    $setterPagina->setFooter();

    $setterPagina->sistemaLink();
    $setterPagina->sistemaMenu();
    $setterPagina->stampaHtml(); //fa l'echo della pagina

?>