
<form action="<rootFolder />/php/voti.php?idarticolo=<segnapostoIdArticolo />" method="post" class="commenti">
<fieldset class="fieldClassVoto">
        <legend><strong>Valuta questo gioco</strong></legend>
		<br>
        <ul class="SelezioneVoto">
        <li>
            <label for="pulsante-voto-1" class="label-voto">1 Stella</label><input type="radio" id="pulsante-voto-1" class="torna-su-link" checked="checked" name="pulsante-voto" value="1" />
        </li>
        <li>
            <label for="pulsante-voto-2" class="label-voto">2 Stelle</label><input type="radio" id="pulsante-voto-2" class="torna-su-link" name="pulsante-voto" value="2" />
        </li>
        <li>
            <label for="pulsante-voto-3" class="label-voto">3 Stelle</label><input type="radio" id="pulsante-voto-3" class="torna-su-link" name="pulsante-voto" value="3" />
        </li>
        <li>
            <label for="pulsante-voto-4" class="label-voto">4 Stelle</label><input type="radio" id="pulsante-voto-4" class="torna-su-link" name="pulsante-voto" value="4" />
        </li>
        <li>
            <label for="pulsante-voto-5" class="label-voto">5 Stelle</label><input type="radio" id="pulsante-voto-5" class="torna-su-link" name="pulsante-voto" value="5" />
        </li>
        </ul>
		<br>
            <input class="submit" type="submit" value= "Vota"/>
		<br>
	</fieldset>
</form>