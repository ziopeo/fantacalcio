   
      <div id="selezionaGiocatori" class="col-md-3">
        <h2 id="nomeSquadraUtente"></h2>
        
          <br>
            <select class="form-control" id="selectGiocatore" size="30" ondblclick="aggiungiA(this)" multiple > 
             <optgroup label="Portieri" id="optPortieri"></optgroup>

              <optgroup label="Difensori" id="optDifensori"></optgroup>

              <optgroup label="Centrocampisti" id="optCentrocampisti"></optgroup>

              <optgroup label="Attaccanti" id="optAttaccanti"></optgroup>
            </select>
        </div>
        <form role="form"  action="controller.php" method="post" onsubmit="return salvaModificheFP();" >
        <div id="selezionaFormazione" class="col-md-3">
            <h3>Formazione</h3>
            <input type="hidden" name="metodo" value="setGiocatoriFormazione">
            <select name="modulo" class="form-control" onchange="pulisciSelectFormazione();" id="selectModulo">
              <option value="343">3-4-3</option>
              <option value="352">3-5-2</option>
              <option value="442">4-4-2</option>
              <option value="433">4-3-3</option>
              <option value="451">4-5-1</option>
              <option value="532">5-3-2</option>
              <option value="541">5-4-1</option>
            </select> 

            <select class="form-control" name="giocatoriTitolari[]" id="selectGiocatoriFormazione" size="16"  multiple ondblclick="removeGiocatoreSelect(this)"> 
              <optgroup label="Portieri" id="optFormazionePortieri"></optgroup>
              <optgroup label="Difensori" id="optFormazioneDifensori"></optgroup>
              <optgroup label="Centrocampisti" id="optFormazioneCentrocampisti"></optgroup>
              <optgroup label="Attaccanti" id="optFormazioneAttaccanti"></optgroup>
            </select>
      
          <input  type="Submit" value="Salva Formazione"  class="btn btn-default">
        
          <script type="text/javascript"> getSquadraUtente();
          getNomeSquadraUtente();</script>
      </div>
 <div id="panchina" class="col-md-3">

 <h3>Panchina</h3>
   <select class="form-control" name="giocatoriPanchinari[]" id="selectGiocatoriPanchina" size="10"  multiple ondblclick="removeGiocatoreSelect(this)"> 
              <optgroup label="Portieri" id="optPanchinaPortieri"></optgroup>
              <optgroup label="Difensori" id="optPanchinaDifensori"></optgroup>
              <optgroup label="Centrocampisti" id="optPanchinaCentrocampisti"></optgroup>
              <optgroup label="Attaccanti" id="optPanchinaAttaccanti"></optgroup>
            </select>
            <input  type="Submit" value="Salva Tutto" id="butSalvaTutto" disabled class="btn btn-default">
    </div>
      </form>  


