<?php
    require_once __DIR__ . "/setterTemplate.php";

    $setterPagina = new setterTemplate("../");

    /*manca codice per settare i meta, da inserire nella classe in setterTemplate*/

    $setterPagina->setHeader();
    
    //la riga seguente andrà sostituita con lo script per importare dal database
    //una volta fatto lo script per recuperare dal database VA ELIMINATO il file articolopageContent
    $setterPagina->setContent("articolopageContent.php");
    $setterPagina->setFooter();

    $setterPagina->sistemaLink();
    $setterPagina->sistemaMenu();
    $setterPagina->stampaHtml(); //fa l'echo della pagina

?>