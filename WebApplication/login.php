      <div class="col-md-5 col-sm-6 text-center" id="login">
        <h2 id="loginIntestazione">LOGIN</h2><BR/>
       
        <form role="form" method="POST" action="controller.php">   
          <input id="loginutenteadmin" type="hidden" name="metodo" value="login">
          <div class="form-group" >
            <label for="userLoginText">Email:</label>
            <input type="text" class="form-control" name="utente" id="userLoginText" placeholder="Immetti email username o matricola">
          </div>
          
          <div class="form-group " >
              <label for="passwordLoginText">Password:</label>
              <input type="password" name="password" class="form-control" id="passwordLoginText" placeholder="Immetti password">
          </div>      
          
          <div class="checkbox">
            <label><input type="checkbox" name ="adminCheck" id="adminCheck" onclick="cambiaUserEmailAdmin(this)"> Admin</label>
          </div>         
          
          <div>
            <input  type="submit" value="Entra" class="btn btn-default">
          </div>
        </form>
        
        <form role="form" method="GET" action="controller.php">
          <div >
          <input type="hidden" name="metodo" value="stampaRegistrazione">
            <input  type="submit" value="Registrati" class="btn btn-default">
          </div>
        </form>
    </div>




