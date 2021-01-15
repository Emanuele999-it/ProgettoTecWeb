<!--<div  id="contenutoArticoli" class="contenutoGenerale" >
    <div class="articoloScheda">
        <img src="../img/fifa2.jpg" alt="" />
        <h3>FIFA 21</h3>
        <p>bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
        </p>
    </div>
    <div class="articoloScheda">
        <img src="../img/doom2.jpg" alt="" />
        <h3>DOOM</h3>
        <p>bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
        </p>
    </div>
    <div class="articoloScheda">
        <img src="../img/nba2.jpg" alt="" />
        <h3>NBA 2K21</h3>
        <p>bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
            bla bla bla blabla bla bla blabla bla bla blabla bla bla bla
        </p>
    </div>
    <div class="torna-su" >
        <a class="torna-su-link" href="#header">Torna su</a>
    </div>
</div>
-->
<?php
require_once __DIR__ . "/query-lista-articoli.php";

    $dieciArt = dieciArticoli(0);
    echo $dieciArt;

?>