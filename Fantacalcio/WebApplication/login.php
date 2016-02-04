<section id="login" style="float:center">
<H2 id="loginIntestazione">LOGIN</h2><BR/>
<div>

<p><input type="checkbox" id="adminCheck" name="admin" onchange="cambiaUserEmailAdmin(this)" value="on"> Admin</p>
        <form>
        <input type="hidden" name ="metodo" value="login">
        <p><input type="text" name ="utente" id="userLoginText"  placeholder="Username or Email"></p>
        <p><input type="password" name="password" id="passwordLoginText"  placeholder="Password"></p>
        <p><button type="submit" formmethod="post" formaction="controller.php">login</button></p>
      </form>
      </div>
</section>