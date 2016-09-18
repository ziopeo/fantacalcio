

  
        

      <div id="selezionaGiocatori" class="col-md-3">
        <select class="form-control" id="selectSquadra"  onchange="caricaGiocatori(this.value)">
          <option value="squadra">squadra</option>
          </select> 
        <script type="text/javascript"> getSquadre();</script>
          <br>
            <select class="form-control" id="selectGiocatore" size="30" onClick="caricaInformazioniGiocatore(this)" ondblclick="aggiungiArosa(this)" multiple  onchange="" > 
             <optgroup label="Portieri" id="optPortieri"></optgroup>

              <optgroup label="Difensori" id="optDifensori"></optgroup>

              <optgroup label="Centrocampisti" id="optCentrocampisti"></optgroup>

              <optgroup label="Attaccanti" id="optAttaccanti"></optgroup>
            </select>
        </div>
      <div id="selezionaRosa" class="col-md-3">
          
         <br>
         <form role="form"  action="controller.php" method="post" onsubmit="return salvaModificheRosa();">
         
          <h3> Fantamilioni:
          <input type="hidden" name="fantamilion" id ="fantamilion" value="0">  
          <h4 name="fantamilioni" id="fantamilioni">0</h4>
          <select class="form-control" name="giocatoriRosa[]" id="selectGiocatoriRosa" size="20"  onClick="caricaInformazioniGiocatore(this)" multiple onDblClick="venditaFantamilioni(this);"  > 
            <optgroup label="rosaPortieri" id="optRosaPortieri"></optgroup>
            <optgroup label="Difensori" id="optRosaDifensori"></optgroup>
            <optgroup label="Centrocampisti" id="optRosaCentrocampisti"></optgroup>
            <optgroup label="Attaccanti" id="optRosaAttaccanti"></optgroup>
          </select>
         <input type="hidden" name="metodo" value="setGiocatoriRosa">
         <input  type="Submit" value="Salva Rosa" class="btn btn-default">
        </form>  
          
      </div>
      <div  class="col-md-3"> 
        <h3>Informazioni Giocatore</h3>
        <h4  id="informazioniGiocatore"></h4>
        <script> caricaGiocatoriUtente();</script>
      </div>

