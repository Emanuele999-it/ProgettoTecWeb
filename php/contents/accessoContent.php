<div id="contenutoAccesso">
    <h1>Accedi</h1>
    <h2><span class="errore-credenziali"><SegnapostoCredenziali /></span></h2>
    <form action="../php/accesso-handle.php"  method="post"  id="form-accesso">
        <fieldset class="form-fieldset">
            <legend class="legend">Inserisci le tue credenziali</legend>
            <ul class="form-container form-centered">
                <li class="form-element">
                    <label class="form-label" for="login-nickname"><span xml:lang="en" lang="en">Email</span>:</label>
                    <input id="login-nickname" class="inputNick" type="text" name="email" />
                </li>
                <li class="form-element">
                    <label class="form-label" for="login-password"><span xml:lang="en" lang="en">Password</span>:</label>
                    <input id="login-password" class="inputPW" type="password" name="password" />
                </li>
                <li class="form-element">
                    <a href="utente.php"><input class="submit" type="submit" value="Accedi"/>  </a>
                </li>
            </ul>
        </fieldset>
        <p id="registrazione">Non sei ancora registrato? <a href="../php/registrazione.php">Registrati</a>
    </p>
    </form>
    <div class="torna-su">
        <a class="torna-su-link" href="#header">Torna su</a>
</div>