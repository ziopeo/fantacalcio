

  
        

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
         <input type="hidden" name="metodo" value="setGiocatoriRosa">
          <select class="form-control" name="giocatoriRosa[]" id="selectGiocatoriRosa" size="20"  multiple onDblClick="venditaFantamilioni(this);" onchange="" > 
            <optgroup label="rosaPortieri" id="optRosaPortieri"></optgroup>
            <optgroup label="Difensori" id="optRosaDifensori"></optgroup>
            <optgroup label="Centrocampisti" id="optRosaCentrocampisti"></optgroup>
            <optgroup label="Attaccanti" id="optRosaAttaccanti"></optgroup>
          </select>
         
         <input  type="Submit" value="Salva Rosa" class="btn btn-default">
        </form>  
          
      </div>
      <div  class="col-md-3"> 
        <h3>Informazioni Giocatore</h3>
        <h4  id="informazioniGiocatore"></h4>
        <form role="form" method="POST" action="controller.php">
          <p> <h3> Fantamilioni</h3> </p>
          <p><h4 name="salvaFantamilioni"  id="fantamilioni">0</h4></p>
          <p></p>
           <p> <input  type="button" value="crea" onClick="creaTemp()" class="btn btn-default"></p>
        </form>
      </div>

