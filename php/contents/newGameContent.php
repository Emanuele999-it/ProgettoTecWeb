<div id="content-aggiungi-articolo">

    <h1>Aggiungi un nuovo Gioco</h1>


    <form action="<rootFolder />/php/newGioco-handle.php" method="post" id="form-aggiungi-gioco" enctype="multipart/form-data">
        <fieldset class="form-new-articolo">
            <legend class="">
                <h2>Campi dati obbligatori per l'aggiunta di un gioco</h2>
            </legend>
            <ul class="form-container-dati-articolo">
                <li>
                    <SegnapostoGiocotrovato />
                    <label for="aggiungi-gioco">Titolo del Gioco</label>
                    <input type="text" id="aggiungi-gioco" name="gioco" value="" />
                    <span id="aggiungi-gioco-warning" class="warning"></span>
                </li>
                <li>
                    <label for="aggiungi-anno-publicazione">Anno pubblicazione gioco</label>
                    <input type="text" class="data-pubblicazione-gioco" id="aggiungi-anno-publicazione" name="anno-pubblicazione-gioco" value="" />
                    <span id="aggiungi-anno-publicazione-warning" class="warning"></span>
                </li>

                <li>
                    <label for="aggiungi-mese-publicazione">Mese pubblicazione gioco</label>
                    <input type="text" class="data-pubblicazione-gioco" id="aggiungi-mese-publicazione" name="mese-pubblicazione-gioco" value="" />
                    <span id="aggiungi-mese-publicazione-warning" class="warning"></span>
                </li>
                <li>
                    <label for="aggiungi-giorno-publicazione">Giorno pubblicazione gioco</label>
                    <input type="text" class="data-pubblicazione-gioco" id="aggiungi-giorno-publicazione" name="giorno-pubblicazione-gioco" value="" />
                    <span id="aggiungi-giorno-publicazione-warning" class="warning"></span>
                </li>
                <li>
                    <label for="aggiungi-immagine">Aggiungi una immagine riguardante il gioco</label>
                    <input type="file" id="aggiungi-immagine" name="immagine" />
                    <span id="aggiungi-immagine-warning" class="warning"></span>
                </li>
                <li>
                    <label for="aggiungi-descrizione-immagine">Aggiungi una breve descrizione dell'immagine</label>
                    <input type="text" id="aggiungi-descrizione-immagine" name="alt-immagine" />
                    <span id="aggiungi-descrizione-immagine-warning" class="warning"></span>
                </li>
                <li>
                    <label for="genere">Seleziona il genere del gioco</label>
                    <select name="genere-gioco" id="scelta-genere-gioco">
                        <option value="1">Gioco di ruolo</option>
                        <option value="2">Sportivo</option>
                        <option value="3">Sparatutto</option>
                        <option value="4">Avventura</option>
                        <option value="5">Azione</option>
                        <option value="6">Gestionale</option>
                    </select>
                </li>
                <li>
                    <input class="submit" type="submit" value="Aggiungi" />
                </li>
            </ul>
        </fieldset>
    </form>
</div>