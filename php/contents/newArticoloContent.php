<div id="content-aggiungi-articolo">

    <h1>Aggiungi un nuovo Articolo</h1>


    <form action="<rootFolder />/php/newArticolo-handle.php" method="post" id="form-aggiungi-articolo" enctype="multipart/form-data">
        <fieldset class="form-new-articolo">
            <legend class="">
                Campi dati obbligatori per l'aggiunta di un articolo
            </legend>
            <ul class="form-container-dati-articolo">
                <li>
                    <SegnapostoGioconontrovato />
                    <label for="aggiungi-gioco">Titolo del Gioco</label>
                    <input type="text" id="aggiungi-gioco" name="gioco" value="" />
                    <span id="aggiungi-gioco-warning" class="warning"></span>
                </li>
                <li>
                    <label for="aggiungi-titolo">Titolo Articolo</label>
                    <input type="text" id="aggiungi-titolo" name="titolo" value="" />
                    <span id="aggiungi-titolo-warning" class="warning"></span>
                </li>
                <li>
                    <label for="aggiungi-sommario">Sommario Articolo</label>
                    <input type="text" id="aggiungi-sommario" name="sommario" value="" />
                    <span id="aggiungi-sommario-warning" class="warning"></span>
                </li>
                <li>
                    <label for="aggiungi-recensione">Inserisci il Testo Recensione</label>
                    <textarea class="form-inserisci-testo" name="recensione" id="aggiungi-recensione" rows="20" cols="100"></textarea>
                    <span id="aggiungi-recensione-warning" class="warning"></span>
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
                    <label for="prima-pagina">Vuoi che questo articolo venga visualizzato
                        in prima pagina come articolo del momento ?</label>
                    <select name="prima-pagina" id="scelta-prima-pagina">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                </li>
                <li>
                    <input class="submit" type="submit" value="Aggiungi" />
                </li>
            </ul>
        </fieldset>
    </form>
</div>