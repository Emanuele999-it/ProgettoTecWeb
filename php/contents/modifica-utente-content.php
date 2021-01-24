<div id="modifca-utente">
    <h1>Modifica dati personali </h1>
    <div id="dati-personali">
        <form action="<rootFolder />/php/modifica-utente-handle.php" method="post">
            <fieldset class="form-fieldset">
                <ul class="form-fieldset">
                    <li>
                        <p>Inserisci nuovo Nome</p>
                        <input id="registrazione-nome" type="text" value="<SegnapostoNome />" name="nome" />
                        <span id="registrazione-nome-warning" class="warning"></span>
                    </li>
                </ul>
                <ul class="form-fieldset">
                    <li>
                        <p>Inserisci nuovo Cognome</p>
                        <input id="registrazione-cognome" type="text" value="<SegnapostoCognome />" name="cognome" />
                        <span id="registrazione-cognome-warning" class="warning"></span>
                    </li>
                </ul>
                <ul class="form-fieldset">
                    <li>
                        <p>Inserisci nuova <span xml:lang="en" lang="en">Email</span></p>
                        <input id="registrazione-email" value="<SegnapostoEmail />" type="text" name="email" />
                        <span id="registrazione-email-warning" class="warning"></span>
                    </li>
                </ul>
                <ul class="form-fieldset">
                    <li>
                        <p>Inserisci nuova <span xml:lang="en" lang="en">Password</span></p>
                        <input id="registrazione-password1" value="<SegnapostoPassw />" type="password" name="password" />
                        <span id="registrazione-password1-warning" class="warning"></span>
                    </li>
                    <li>
                        <p>Ripeti <span xml:lang="en" lang="en">Password</span></p>
                        <input id="registrazione-password2" value="<SegnapostoPassw />" type="password" name="password2" />
                        <span id="registrazione-password2-warning" class="warning"></span>
                    </li>
                    <li class="form-element">
                        <input class="submit" type="submit" value="Modifica" />
                    </li>
                </ul>
            </fieldset>
        </form>
    </div>
</div>
<div class="torna-su">
    <a class="torna-su-link" href="#header">Torna su</a>
</div>