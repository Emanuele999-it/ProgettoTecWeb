<div id="contenutoAccesso">
    <h1>Registrati</h1>
    <div id="termini-di-servizio">
        <h2 >Termini di servizio</h2>
        <p>Con la registrazione avrai accesso alle funzionalit&agrave; riservate del sito. In particolare potrai visualizzare e scrivere i commenti e votare i tuoi giochi preferiti.</p>
        <p>Su questo sito non sono permessi insulti o <span xml:lang="en" lang="en">spam</span> quindi se un tuo commento ne contiene verr&agrave; eliminato dagli amministratori.</p>
    </div>
    <!-- <form action="../php/handle-signup.php"
            method="post"
            id="form-signup">-->
    <fieldset class="form-fieldset">
    <legend class="legend">Inserisci i tuoi dati</legend>
    <ul class="form-container">
        <li class="form-element">
            <!--Ho lasciato tutti i valori per il php come linea guida-->
            <label class="form-label"
                for="signup-nick"><span xml:lang="en" lang="en">Nickname</span>:</label>
            <input class="barra-input"
                id="signup-nick" 
                type="text"
                name="nickname"
                value="" />
            <span id="signup-nick-message" class="warning">  </span>
        </li>
        <li class="form-element">
            <label class="form-label"
                    for="signup-email"><span xml:lang="en" lang="en">Email</span>:</label>
            <input class="barra-input"
                    id="signup-email"
                    type="text"
                    name="email"
                    value="" />
            <span id="signup-email-message"
                    class="warning">  </span>
        </li>
        <li class="form-element">
            <label class="form-label"
                    for="signup-password1"><span xml:lang="en" lang="en">Password</span>:</label>
            <input class="barra-input"
                    id="signup-password1"
                    type="password"
                    name="password1"
                    value="" />
        </li>
        <li class="form-element">
            <label class="form-label"
                    for="signup-password2">Ripeti
                    <span xml:lang="en" lang="en">Password</span>:</label>
            <input class="barra-input"
                    id="signup-password2"
                    type="password"
                    name="password2" />
            <span id="signup-password2-message"
                    class="warning">  </span>
        </li>
        <li class="form-element">
            <input class="submit"
                    type="submit"
                    value="Registrati" />
        </li>
    </ul>
    </fieldset>
    <!--</form>-->
</div>