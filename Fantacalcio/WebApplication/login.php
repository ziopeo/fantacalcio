<div class="container" id="login" style="float:center">
<H2 id="loginIntestazione">LOGIN</h2><BR/>

<form role="form" class="form-horizontal" method="POST" action="controller.php">
    <input type="hidden" name="metodo" value="login">
    <div class="form-group">
      <label class="control-label col-sm-2" for="userLoginText">Email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="utente" id="userLoginText" placeholder="Immetti email username o matricola">
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="passwordLoginText">Password:</label>
        <div class="col-sm-10">
          <input type="password" name="password" class="form-control" id="passwordLoginText" placeholder="Immetti password">
        </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" id="adminCheck" onclick="cambiaUserEmailAdmin(this)"> Admin</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       <input  type="submit" value="Entra" class="btn btn-default">
      </div>
    </div>
     
  </form>


</section>