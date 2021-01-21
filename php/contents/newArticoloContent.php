<div id="content-aggiungi-articolo">

<h1>Aggiungi un nuovo Articolo</h1>


<form action="../php/newArticolo-handle.php" method="post" id="form-aggiungi-articolo" enctype="multipart/form-data" >
    <fieldset class="form-new-articolo">
        <legend class=""> 
            <h2>Campi dati obbligatori per l'aggiunta o modifica di un articolo</h2> 
        </legend>
    <ul class="form-container-dati-articolo">
        <li>
            <label for="aggiungi-gioco">Titolo del Gioco</label>
            <input type="text" id="aggiungi-gioco" name="gioco" value="" />
        </li>
        <li>
            <label for="aggiungi-titolo">Titolo Articolo</label>
            <input type="text" id="aggiungi-titolo" name="titolo" value="" />
        </li>
        <li>
            <label for="aggiungi-sommario">Sommario Articolo</label>
            <input type="text" id="aggiungi-sommario" name="sommario" value="" />
        </li>
        <li>
            <label for="aggiungi-recensione">Inserisci il Testo Recensione</label>
            <textarea class="form-inserisci-testo" name="recensione" id="aggiungi-recensione" ></textarea>
        </li>
        <li>
            <label for="aggiungi-immagine">Aggiungi una immagine riguardante il gioco</label>
            <input type="file" id="aggiungi-immagine" name="immagine" />
        </li>
        <li>
            <label for="aggiungi-descrizione-immagine">Aggiungi una breve descrizione dell'immagine</label>
            <input type="text" id="aggiungi-descrizione-immagine" name="alt-immagine" />
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
            <label for="prima-pagina">Vuoi che questo articolo venga visualizzato
                                     in prima pagina come articolo del momento ?</label>
                <select name="prima-pagina" id="scelta-prima-pagina">
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
        </li>
        <li>
            <input type="submit" value="Aggiungi" />
        </li>
    </ul>
    </fieldset>
</form>
</div>