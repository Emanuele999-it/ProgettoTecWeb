<div class="contenutoAccesso">
    <h1>Registrati</h1>
    <div id="termini-di-servizio">
        <h2>Termini di servizio</h2>
        <p>Con la registrazione avrai accesso alle funzionalit&agrave; riservate del sito. In particolare potrai visualizzare e scrivere i commenti e votare i tuoi giochi preferiti.</p>
        <p>Su questo sito non sono permessi insulti o <span xml:lang="en" lang="en">spam</span> quindi se un tuo commento ne contiene verr&agrave; eliminato dagli amministratori.</p>
    </div>
    <h2><span class="errore-credenziali"><SegnapostoCredenziali /></span></h2>
    <form action="<rootFolder />/php/registrazione-handle.php" method="post" id="form-registrazione">
        <fieldset class="form-fieldset">
            <legend class="legend">Inserisci i tuoi dati</legend>
            <ul class="form-container">
                <li class="form-element">
                    <label class="form-label" for="registrazione-nome">Nome:</label>
                    <input id="registrazione-nome" type="text" name="nome" value="" />
                    <span id="registrazione-nome-warning" class="warning"></span>
                </li>
                <li class="form-element">
                    <label class="form-label" for="registrazione-cognome">Cognome:</label>
                    <input id="registrazione-cognome" type="text" name="cognome" value="" />
                    <span id="registrazione-cognome-warning" class="warning"></span>
                </li>
                <li class="form-element">
                    <label class="form-label" for="registrazione-email"><span xml:lang="en" lang="en">Email</span>:</label>
                    <input id="registrazione-email" type="text" name="email" value="" />
                    <span id="registrazione-email-warning" class="warning"></span>
                </li>
                <li class="form-element">
                    <label class="form-label" for="registrazione-password1"><span xml:lang="en" lang="en">Password</span>:</label>
                    <input id="registrazione-password1" type="password" name="password1" value="" />
                    <span id="registrazione-password1-warning" class="warning"></span>
                </li>
                <li class="form-element">
                    <label class="form-label" for="registrazione-password2">Ripeti
                        <span xml:lang="en" lang="en">Password</span>:</label>
                    <input id="registrazione-password2" type="password" name="password2" />
                    <span id="registrazione-password2-warning" class="warning"></span>
                </li>
                <li class="form-element">
                    <input class="submit" type="submit" value="Registrati" />
                </li>
            </ul>
        </fieldset>
    </form>
</div>