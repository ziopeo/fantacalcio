
  <div class=" col-md-4" id="adminPanel" style="float:center" >
 
    <h2 id="loginIntestazione">Pannello Amministratore</h2><BR/>

    <div>
    <form role="form" method="POST" action="controller.php" id="uploadCalendario" enctype="multipart/form-data">
		<div class="form-group" >
			<p><input type="hidden" name="metodo" value="uploadCalendario"></p>
			<label for="fileUploadCalendario">	Seleziona il file contenente il calendario:</label>
			<input type="file" name="fileCalendario" class="col-sm-offset-4" id="fileUploadCalendario"></p>
<p>			<input type="submit" value="Carica Calendario"></p>
		</div>
	</form>
	</div>
	<div>

	<form role="form" method="POST"  action="controller.php" id="uploadPagelle" enctype="multipart/form-data">
		<div class="form-group" >
			<input type="hidden" name="metodo" value="caricaPagelle">
			<label for="fileUploadPagelle">		Selezione il file contenente le pagelle giocatori:</label>
    	<input type="file" class="col-sm-offset-4" name="filePagelle" id="fileUploadPagelle">
    	<input type="submit" value="Carica Pagelle" >
		</div>
	</form>
</div>
<div>
	<form role="form" method="POST" action="controller.php"  id="uploadPagelle" enctype="multipart/form-data">
		<div class="form-group" >
			<input type="hidden" name="metodo" value="uploadGiocatori">
					<label for="fileUploadGiocatori" >Selezione il file contenente le pagelle giocatori:</label>
    	<input type="file" class="col-sm-offset-4" name="fileGiocatori" id="fileUploadGiocatori">
    	<input type="submit" value="Carica Archivio Giocatori .csv">
		</div>
	</form>
</div>
	<div class="btn-group">
    <button type="button" class="btn btn-primary">Fantamercato</button>
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><form role="form" method="POST" action="controller.php" ><input type="hidden" name="metodo" value="fantaOn">
      				<input type="submit" value="ON"></form></li>
      <li><form role="form"><input type="hidden" name="metodo" value="fantaOff">
      				<input type="submit" value="OFF"></form></li>
    </ul>
    <div class="form-group">
      <form role="form" method="POST" action><input type="hidden" name="metodo" value="avviaLeghe">
      				<input type="submit" value="Avvia lega Annuale"></form>
      </div>
    
  </div>
	

	
</div>