<div>
 	<form id="uploadCalendario" enctype="multipart/form-data">
		Seleziona il file contenente il calendario:
		<input type="file" id="fileUploadCalendario">
		<input type="button" value="Carica Calendario" onclick="caricaCalendario()" name="buttonCaricaCalendario">
	</form>
	<div>
    	Selezione il file contenente l elenco dei giocatori:
    	<input type="file" name="fileGiocatori" id="fileUploadGiocatori">
    	<input type="button" value="Carica Giocatori" onclick="caricaGiocatori()" name="buttonCaricaGiocatori">
	</div>
	<div>
    	Selezione il file contenente l elenco dei giocatori:
    	<input type="file" name="filePagelle" id="fileUploadPagelle">
    	<input type="button" value="Carica Pagelle" onclick="caricaPagelle()" name="buttonCaricaPagelle">
	</div>
	<div>
		<input type="checkbox" name="fantamercato" value="on" > Fantamercato ATTIVO/DISATTIVO<br>
	</div>
</div>