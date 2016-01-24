<?php
	
	echo"<!doctype html public>
		<?php 
			include(\"db_con.php\");
		?>
		<html dir=\"ltr\" lang=\"IT\">
			<head>
			<meta charset=\"UTF-8\">
        	<meta name=\"description\" content=\"UFL - University Fanta League - website application per sfidare i tuoi compagni universitari in una fantalega\">
        	<meta name=\"keywords\" content=\"università facoltà lega fantalega fantacalcio calcio soccer fantamilioni mercato calciatori\">
        	<meta name=\"author\" content=\"Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe\">
        	<meta name=\"copyright\" content=\"Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe, UFL\">
        	<meta name=\"robots\" content=\"index,follow\">
			<title>UFL - University Fanta League</title>
		</head>

		<body>
        	<div class=\"back_imgIndex\" style=\"float:center\">
				<img id=\"logo\" src=\"image/logoLungoSMALL.png\" alt=\"UFL - University Fanta League\"/>
        	  	<div class=\"input\">
					
					<!-- form per l'immissione dati -->
					<form name=\"login_form\" method=\"post\" action=\"login.php\">	
						User &nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"user_log\">
						Password &nbsp;&nbsp;&nbsp; <input type=\"password\" name=\"pass_log\">
						<input type=\"submit\" name=\"submit\" value=\"ACCEDI\">
					</form>
					<br>
					<br>
					<br>
					<strong>Registrati subito</strong>
					<form name=\"registrazione_form\" method=\"post\" action=\"registrazione.php\">
						Matricola &nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"matricola_reg\">
						Nome &nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"nome_reg\">
						Cognome &nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"cognome_reg\">
						Facoltà &nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"facolta_reg\">
						E-mail &nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"email_reg\">
						Password &nbsp;&nbsp;&nbsp; <input type=\"password\" name=\"pass_reg\">
						<br>
						<input type=\"submit\" name=\"submit\" value=\"REGISTRATI\">
					</form>
				</div>
        	</div>
		</body>
	</html>"
?>