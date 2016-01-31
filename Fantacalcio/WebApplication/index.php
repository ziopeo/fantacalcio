<?php
	/* non si collega */
	session_start();
	include("db_con.php");
?>
	<!doctype html public>
		<html dir="ltr" lang="IT">
			<head>
				<meta charset="UTF-8">
        		<meta name="description" content="UFL - University Fanta League - website application per sfidare i tuoi compagni universitari in una fantalega">
        		<meta name="keywords" content="università facoltà lega fantalega fantacalcio calcio soccer fantamilioni mercato calciatori">
        		<meta name="author" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe">
        		<meta name="copyright" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe, UFL">
        		<meta name="robots" content="index,follow">
				<title>UFL - University Fanta League</title>
		</head>

		<body>
        	<div class="back_imgIndex" style="float:center">
				<img id="logo" src="image/logoLungoSMALL.png" alt="UFL - University Fanta League"/>
        	  	<div class="input" align="center">
					
					<!-- form per l'immissione dati -->
					<form name="login_form" method="post" action="controller.php">
						<fieldset style="width:30%">
							<input type="hidden" name="metodo" value="controlla_login">	
							User: &nbsp;&nbsp;&nbsp; <input type="text" name="user_log"><br>
							Password: &nbsp;&nbsp;&nbsp; <input type="password" name="pass_log"><br>
							<br>
							<button>Accedi</button>
						</fieldset>
					</form>
					<br>
					<br>
					<br>

					<strong>Registrati subito</strong>
					<form name="registrazione_form" method="post" action="controller.php">
						<fieldset style="width:30%">
							<input type="hidden" name="metodo" value="controlla_registrazione">
							Matricola: &nbsp;&nbsp;&nbsp; <input type="text" name="matricola_reg"><br>
							Nome: &nbsp;&nbsp;&nbsp; <input type="text" name="nome_reg"><br>
							Cognome: &nbsp;&nbsp;&nbsp; <input type="text" name="cognome_reg"><br>
							Facoltà: &nbsp;&nbsp;&nbsp; <input type="text" name="facolta_reg"><br>
							E-mail: &nbsp;&nbsp;&nbsp; <input type="text" name="email_reg"><br>
							Password: &nbsp;&nbsp;&nbsp; <input type="password" name="pass_reg"><br>
							<br>
							<button>Registrati</button>
						</fieldset>
					</form>
				</div>
        	</div>
		</body>
	</html>