<div id="divFormazioni">
	<div id="selezionaGiocatori">
		<select id="selectSquadra" onchange="caricaGiocatori(this.value)"> 
			<option value="squadra"></option>
			<option value="squadra">squadra</option>
			<option value="squadra">juventus</option>
  		</select>	
  	
  	
<p/>		<select id="selectGiocatore" size="30" onClick="caricaInformazioniGiocatore(this)" ondblclick="aggiungiArosa(this)" multiple  onchange="" > 
			<optgroup label="Portieri" id="optPortieri"></optgroup>
  			<option value="squadra" > </option>
  			<optgroup label="Difensori" id="optDifensori"></optgroup>
  			<option value="squadra"> </option>
  			<optgroup label="Centrocampisti" id="optCentrocampisti"></optgroup>
  			<option value="squadra"> </option>
  			<optgroup label="Attaccanti" id="optAttaccanti"></optgroup>
  		</select>
	</div>
	 <div id="selezionaRosa">
  		<select id="selectFormazione" onchange="" > 
	    	
	  	</select><p/>
	  	<select id="selectGiocatoriRosa" size="20"  multiple onDblClick="alert(this.value)" onchange="" > 
	    	<optgroup label="rosaPortieri" id="optRosaPortieri"></optgroup>
  			<option value="squadra"> </option>
  			<optgroup label="Difensori" id="optRosaDifensori"></optgroup>
  			<option value="squadra"> </option>
  			<optgroup label="Centrocampisti" id="optRosaCentrocampisti"></optgroup>
  			<option value="squadra"> </option>
  			<optgroup label="Attaccanti" id="optRosaAttaccanti"></optgroup>
	  		
	  	</select>
  	</div>
  	<div id="informazioniGiocatore">
  	</div>
</div>