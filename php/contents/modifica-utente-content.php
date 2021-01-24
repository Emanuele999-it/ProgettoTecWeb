<div id="modifca-utente">
    <h1>Modifica dati personali </h1>
    <div id="dati-personali">
        <form action="<rootFolder />/php/modifica-utente-handle.php?item=nome" method="post">
            <fieldset class="form-fieldset">
                <legend class="legend">Nome inserito:
                    <SegnapostoNome />
                </legend>
                <ul class="form-fieldset">
                    <li>
                        <p>Inserisci nuovo Nome</p>
                        <input id="registrazione-nome" type="text" value="<SegnapostoNome />" name="nome" value="" />
                        <span id="registrazione-nome-warning" class="warning"></span>
                    </li>
                </ul>
                <legend class="legend">Cognome inserito:
                    <SegnapostoCognome />
                </legend>
                <ul class="form-fieldset">
                    <li>
                        <p>Inserisci nuovo Cognome</p>
                        <input id="registrazione-cognome" type="text" value="<SegnapostoCognome />" name="cognome" value="" />
                        <span id="registrazione-cognome-warning" class="warning"></span>
                    </li>
                </ul>
                <legend class="legend">Email inserita:
                    <SegnapostoEmail />
                </legend>
                <ul class="form-fieldset">
                    <li>
                        <input id="registrazione-email" value="<SegnapostoEmail />" type="text" name="email" value="" />
                        <span id="registrazione-email-warning" class="warning"></span>
                    </li>
                </ul>
                <legend class="legend">Password: *******</legend>
                <ul class="form-fieldset">
                    <li>
                        <label class="form-label" for="registrazione-password1">Nuova
                            <span xml:lang="en" lang="en">Password</span>:</label>
                        <input id="registrazione-password1" type="text" name="password" value="" />
                        <span id="registrazione-password1-warning" class="warning"></span>
                    </li>
                    <li>
                        <label class="form-label" for="registrazione-password2">Ripeti
                            <span xml:lang="en" lang="en">Password</span>:</label>
                        <input id="registrazione-password2" type="text" name="password" value="" />
                        <span id="registrazione-password2-warning" class="warning"></span>
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
</div>
<div class="torna-su">
    <a class="torna-su-link" href="#header">Torna su</a>
</div>