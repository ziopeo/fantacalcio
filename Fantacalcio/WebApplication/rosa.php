

  
        

      <div id="selezionaGiocatori" class="col-md-3">
        <select id="selectSquadra" onchange="caricaGiocatori(this.value)">
          <option value="squadra">squadra</option>
          </select> 
        
          <br>
            <select id="selectGiocatore" size="30" onClick="caricaInformazioniGiocatore(this)" ondblclick="aggiungiArosa(this)" multiple  onchange="" > 
             <optgroup label="Portieri" id="optPortieri"></optgroup>
                <option value="squadra" > </option>
              <optgroup label="Difensori" id="optDifensori"></optgroup>
                <option value="squadra"> </option>
              <optgroup label="Centrocampisti" id="optCentrocampisti"></optgroup>
                <option value="squadra"> </option>
              <optgroup label="Attaccanti" id="optAttaccanti"></optgroup>
            </select>
        </div>
      <div id="selezionaRosa" class="col-md-3">
          <select id="selectFormazione" onchange="" >     
         </select>
         <br>
        <select id="selectGiocatoriRosa" size="20"  multiple onDblClick="venditaFantamilioni(this);" onchange="" > 
          <optgroup label="rosaPortieri" id="optRosaPortieri"></optgroup>
              <option value="squadra"> </option>
            <optgroup label="Difensori" id="optRosaDifensori"></optgroup>
              <option value="squadra"> </option>
            <optgroup label="Centrocampisti" id="optRosaCentrocampisti"></optgroup>
              <option value="squadra"> </option>
            <optgroup label="Attaccanti" id="optRosaAttaccanti"></optgroup>
        </select>
          
          
      </div>
      <div  class="col-md-3"> 
        <h3>Informazioni Giocatore</h3>
        <h4  id="informazioniGiocatore"></h4>
        <form role="form" method="POST" action="controller.php">
          <p> <h3> Fantamilioni</h3> </p>
          <p><h4 name="salvaFantamilioni"  id="fantamilioni">0</h4></p>
          <p> <input  type="button" value="Salva Modifiche" onclick("calcolaFantamilioni()") class="btn btn-default"></p>
        </form>
      </div>

