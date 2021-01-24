<div class="commenti">
	<h3>Inserisci nuovo commento</h3>
	<form id="inserisciCommento" method="post" action="../php/inserimento-commenti.php?idarticolo=<SegnapostoIDarticolo />">
		<fieldset>
			<label for="inserisciCommento">Scrivi tuo commento</label>
			<textarea id="box-commento" name="contenuto-commento" rows="8" cols="100"></textarea>
			<span id="box-commento-warning" class="warning"></span>
			<input id="tasto-box-commento" class="invia-commento-submit" type="submit" value="Commenta" />
		</fieldset>
	</form>
</div>