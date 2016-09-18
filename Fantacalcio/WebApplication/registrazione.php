<div class="row">
  <div class=".container-fluid col-md-8 col-sm-8 center" id="login" >
 
    <h2 id="loginIntestazione">Registrazione</h2><BR/>
    <form role="form" method="POST" action="controller.php">
      
      <input type="hidden" name="metodo" value="registrazione">
      
      <div class="form-group" >
        <label for="matricolaRegText">Matricola:</label>
        <input type="text" class="form-control" name="matricolaUtente" id="matricolaRegText" placeholder="Immetti Matricola">
      </div>

      <div class="form-group" >
        <label for="nomeRegText">Nome:</label>
        <input type="text" class="form-control" name="nomeUtente" id="nomeRegText" placeholder="Immetti Nome">
      </div>
      
      <div class="form-group" >
        <label for="cognomeRegText">Cognome:</label>
        <input type="text" class="form-control" name="cognomeUtente" id="cognomeRegText" placeholder="Immetti Cognome">
      </div>
      
      <div class="form-group " >
          <label for="passwordRegText">Password:</label>
          <input type="password" name="passwordUtente" class="form-control" id="passwordRegText" placeholder="Immetti password">
      </div>        
      
      <div class="form-group" >
        <label for="emailRegText">Email:</label>
        <input type="email" class="form-control" name="emailUtente" id="emailRegText" placeholder="Immetti email">
      </div>

      <div class="form-group">
          <label> <select name="facoltaUtente" class="form-control" id="sceltaFacolta" >
          </select></label>
      </div>
      <script type="text/javascript">caricaFacolta();</script>
      <div class="col-sm-offset-2">
        <input  type="submit" value="Registrati" class="btn btn-default">
      </div>
    </form>  
  </div>
</div>
     
