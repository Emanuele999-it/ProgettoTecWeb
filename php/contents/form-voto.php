
<form action="<rootFolder />/php/voti.php?idarticolo=<segnapostoIdArticolo />" method="post">
<fieldset class="fieldClassVoto">
        <legend>Valuta questo gioco</legend>
        <ul class="SelezioneVoto">
        <li>
            <label for="pulsante-voto-1" class="label-voto">1 Stella</label><input type="radio" id="pulsante-voto-1" class="pulsante-voto" checked="checked" name="pulsante-voto" value="1" />
        </li>
        <li>
            <label for="pulsante-voto-2" class="label-voto">2 Stelle</label><input type="radio" id="pulsante-voto-2" class="pulsante-voto" name="pulsante-voto" value="2" />
        </li>
        <li>
            <label for="pulsante-voto-3" class="label-voto">3 Stelle</label><input type="radio" id="pulsante-voto-3" class="pulsante-voto" name="pulsante-voto" value="3" />
        </li>
        <li>
            <label for="pulsante-voto-4" class="label-voto">4 Stelle</label><input type="radio" id="pulsante-voto-4" class="pulsante-voto" name="pulsante-voto" value="4" />
        </li>
        <li>
            <label for="pulsante-voto-5" class="label-voto">5 Stelle</label><input type="radio" id="pulsante-voto-5" class="pulsante-voto" name="pulsante-voto" value="5" />
        </li>
        </ul>
            <input class="pulsante-voto-submit" type="submit" value= "vota"/>
	</fieldset>
</form>