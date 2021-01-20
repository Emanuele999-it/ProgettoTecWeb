
<div id="content">        
    <div id="benvenuto-utente">
        <img src="../img/avatar.jpg" alt="foto profilo" class="foto-profilo">
        <h1>Benvenuto <NomeUtenetSegnaposto /></h1>
    </div>

    <p id="modifica-dati" >Per modificare i tuoi dati personali schiaccia qui: 
    <a id="modifica-link" href="../php/modifica-utente.php">Modifica dati</a>
    </p>
    <SegnapostoAggiungiNuovoArticolo />
    <form id="eliminazione-account" method="POST" action="elimina-account.php" >
        <fieldset  class="form-fieldset">
            <legend class="legend"> Eliminazione <span xml:lang="en" lang="en" >Account</span>, inserisci la password</legend>
            <input type="password" id="eliminazione-password" name="utente-password">
            <input type="submit"   value="Elimina Account">
        </fieldset> 
        <p style="text-align: center;"><strong>Attenzione!</strong> L'eliminazione del profilo è definitiva.</p>
    </form>
        <div class="torna-su">
            <a class="torna-su-link" href="#header">Torna su</a>
    </div>        
</div>