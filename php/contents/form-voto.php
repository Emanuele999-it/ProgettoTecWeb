
<form action="<rootFolder />/php/voti.php?idarticolo=<segnapostoIdArticolo />" method="post" class="commenti">
<fieldset class="fieldClassVoto">
        <legend><strong>Valuta questo gioco</strong></legend>
		<br/>
        <ul class="SelezioneVoto">
        <li>
            <label>1 Stella</label><input type="radio"  class="torna-su-link" checked="checked" name="pulsante-voto" value="1" />
        </li>
        <li>
            <label>2 Stelle</label><input type="radio"  class="torna-su-link" name="pulsante-voto" value="2" />
        </li>
        <li>
            <label>3 Stelle</label><input type="radio"  class="torna-su-link" name="pulsante-voto" value="3" />
        </li>
        <li>
            <label>4 Stelle</label><input type="radio"  class="torna-su-link" name="pulsante-voto" value="4" />
        </li>
        <li>
            <label>5 Stelle</label><input type="radio"  class="torna-su-link" name="pulsante-voto" value="5" />
        </li>
        </ul>
		<br/>
            <input class="submit" type="submit" value= "Vota"/>
		<br/>
	</fieldset>
</form>