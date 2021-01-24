<div id="modifca-utente">
    <h1>Modifica dati personali </h1>
    <div id="dati-personali">
    <form action="../php/modifica-utente-handle.php?item=nome"  method="post"  >
        <fieldset class="form-fieldset">
            <legend class="legend">Nome inserito: <SegnapostoNome /></legend>
                <ul class="form-fieldset">
            <li> <p>Inserisci nuovo Nome</p>
            <input  id="registrazione-nome" type="text"  name="nome" value="" />
            <input class="form-element" id="nome-inserito"  type="submit"  value="Modifica"/>
            </li>
        </ul>
        </fieldset>
        </form>
    <form action="../php/modifica-utente-handle.php?item=cognome"  method="post"  >
            <fieldset class="form-fieldset">
                <legend class="legend">Cognome inserito: <SegnapostoCognome /></legend>
                    <ul class="form-fieldset">
                    <li><p>Inserisci nuovo Cognome</p>
                        <input   id="registrazione-cognome" type="text"  name="cognome" value="" />
                        <input class="form-element" id="cognome-inserito"  type="submit"  value="Modifica"/>
                    </li>
                </ul>
            </fieldset>
        </form>
    <form action="../php/modifica-utente-handle.php?item=email"  method="post"  >
        <fieldset class="form-fieldset">
            <legend class="legend">Email inserita: <SegnapostoEmail /></legend>
            <ul class="form-fieldset">
                <li>
                <input   id="registrazione-email" type="text"  name="email" value="" />
                <input class="form-element" id="email-inserita"  type="submit"  value="Modifica"/>
                </li>
            </ul>
        </fieldset>
    </form>
    <form action="../php/modifica-utente-handle.php?item=password"  method="post" >
        <fieldset class="form-fieldset">
            <legend class="legend">Password: *******</legend>
            <ul class="form-fieldset">
                <li>
                <input   id="registrazione-password" type="text"  name="password" value="" />
                <input class="form-element" id="password-inserita"  type="submit"  value="Modifica"/>
                </li>
            </ul>
        </fieldset>
    </form>
    </div>
</div>    
    <div class="torna-su">
        <a class="torna-su-link" href="#header">Torna su</a>
</div>