<div class="commenti" >
			<h3>Inserisci nuovo commento</h3>
			<form id="inserisciCommento" method="post" 
			action="../php/inserimento-commenti.php?idarticolo=<SegnapostoIDarticolo />">
			<fieldset style="border: none;">
				<label for="contenuto-commento">Scrivi tuo commento</label>
				<textarea id="box-commento" name="contenuto-commento" type="submit" value="Commenta"
				 rows="8" cols="100" ></textarea>
				<input id="tasto-box-commento" class="invia-commento-submit" type="submit" value="Commenta" >
			</fieldset>
			</form>
		</div>