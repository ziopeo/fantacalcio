<!doctype html public>
<html dir="ltr" lang="IT">
	<head>
		<meta charset="UTF-8">
		<link href="styles/style.css" rel="stylesheet" type="text/css">
        <meta name="description" content="UFL - University Fanta League - website application per sfidare i tuoi compagni universitari in una fantalega">
        <meta name="keywords" content="università facoltà lega fantalega fantacalcio calcio soccer fantamilioni mercato calciatori">
        <meta name="author" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe">
        <meta name="copyright" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe, UFL">
        <meta name="robots" content="home,follow">
		<title>UFL - Home</title>
	</head>
	<body>
		<div id="total">
		<!-- header con titolo e giornte -->
		<header>
			<!--Immagine principale-->
			<a href="home.php">
				<img id="logo" src="image/logoLungoSMALL.png" alt="UFL - University Fanta League"/>
			</a>
		
			<!--Tabella giornate-->
			<div id="giornate" style="float:center">
				<table style="width:100%" border="1" bordercolordark="black" >
					<tr>
						<td align="center">
							<img src="image/giornate.png" width="236,2" height="35,4" alt="GIORNATE"/>
						</td>
					</tr>
				</table>
				<table border="1" bordercolordark="black" id="table_giornate">
					<tr>
						<!--Costruzione row giornate-->
						<?php
							$giornate = 39/*$_POST['giornate']*/;
							$count = 1;
							while($count<$giornate){
								echo'	
									<td width="10%" height="30%">
										<a href="giornata.php?giornata='.$count.'">' . $count . '</a>
									</td>
									';
								$count++;
							}
						?>
					</tr>
				</table>
				<table style="width:100%">
					<tr>
						<td align="center" bgcolor="#A4E4B9">
							<img src="image/home.png" width="472,4" height="70,8" alt="HOME PAGE"/>
						</td>
					</tr>
				</table>
			</div>
			<!--Fine div tabella giornate-->
		</header>
		<!--Fine header-->
		
		<!--contenitore-->
		<div id="contenitore">
			<!-- Section per la barra laterale contenente il menù -->
			<section id="sidebar">
				<div id="menù" style="float:left">
					<a href="home.php">
						<div id="areaUtente">
							<img src="image/areaUtente.png" width="177,2" height="59,1" alt="AREA UTENTE"/>
						</div>
					</a>
					<a href="squadra.php">
						<div id="b">
							<img src="image/squadra.png" width="177,2" height="59,1" alt="SQUADRA"/>
						</div>
					</a>	
					<a href="mercato.php">
						<div id="c">
							<img src="image/mercato.png" width="177,2" height="59,1" alt="MERCATO">
						</div>
					</a>
					<a href="cerca.php">
						<div id="d">
							<img src="image/cerca.png" width="177,2" height="59,1" alt="">
						</div>
					</a>
					<div id="e"><img src="image/logout.png" width="177,2" height="59,1" alt=""></div>
			
					<!--Frame per la classifica di serie a e gli ultimi risultati-->
					<iframe src="http://www.ilcalcio.net/classifica-serie-A.htm" width="256" height="244" scrolling="auto" frameborder="0"> 
						<font size="1" face="Tahoma\">Se il tuo browser non supporta i frame in linea clicca
							<a href="http://www.ilcalcio.net/\" target=\"_blank\">
								QUI
							</a>
						</font>
					</iframe>
					<!-- Fine frame -->
				</div>
			</section>
			<!-- Fine section -->
			
			<!-- Inizio div corpo -->
				<div id="corpo" style="float:center">
					<!--Tabella utente-->
					<table width="79%" border="1" bordercolor="rgba(47,145,60,1.00)" id="table_dati" align="center">
  						<tbody>
  							<tr>
    							<td colspan="2" align="center"><strong> Dati utente </strong></td>
   							</tr>
    						<tr>
      							<td width="22%"><strong>Nome</strong></td>
      							<td width="78%">
      								<textarea rows="1" cols="54"  title="nome_t" style="resize:none" width="100%" id="nome_t" name="nome_t" value="<?php echo $_POST['nome']; ?>" readonly></textarea>
      							</td>
    						</tr>
    						<tr>
      							<td><strong>Cognome</strong></td>
      							<td>
      								<textarea rows="1" cols="54" title="cognome_t" style="resize:none" width="100%" id="cognome_t" name="cognome_t" value="<?php echo $_POST['cognome']; ?>" readonly></textarea>
      							</td>
    						</tr>
    						<tr>
      							<td><strong>Matricola</strong></td>
      							<td>
      								<textarea rows="1" cols="54"  title="matricola_t" style="resize:none" width="100%" id="matricola_t" name="matricola_t" value="<?php echo $_POST['matricola']; ?>" readonly></textarea>
      							</td>
    						</tr>
    						<tr>
      							<td><strong>Facoltà</strong></td>
      							<td>
      								<textarea rows="1" cols="54"  title="facolta_t" style="resize:none" width="100%" id="facolta_t" name="facolta_t" value="<?php echo $_POST['facolta']; ?>" readonly></textarea>
      							</td>
    						</tr>
   	 						<tr>
      							<td><strong>Email</strong></td>
      							<td>
      								<textarea rows="1" cols="54"  title="email_t" style="resize:none" width="100%" id="email_t" name="email_t" value="<?php echo $_POST['email']; ?>" readonly></textarea>
      							</td>
    						</tr>
    						<tr>
      							<td><strong>Nuova mail</strong></td>
								<!-- controllare tramite foglio di stile la grandeza dell'input -->
      							<td><input type="text" placeholder="esempio@esempio.it"></td>
    						</tr>
    						<tr>
      							<td><strong>Nome squadra</strong></td>
      							<td>
      								<textarea rows="1" cols="54"  title="squadra_t" style="resize:none" width="100%" id="squadra_t" name="squadra_t" value="<?php echo $_POST['squadra_t']; ?>" readonly></textarea>
      							</td>
    						</tr>
    						<tr>
      							<td><strong>Password</strong></td>
      							<td>
      								<textarea rows="1" cols="54"  title="pass_t" style="resize:none" width="100%" id="pass_t" name="pass_t" value="<?php echo $_POST['pass']; ?>" readonly></textarea>
      							</td>
    						</tr>
    						<tr>
      							<td><strong>Nuova password</strong></td>
      							<td><input type="text" placeholder="password"></td>
                  			</tr>
						</tbody>
					</table>
					<img src="image/salvamodifiche.png" alt="SALVA MODIFICHE" width="184" height="43" align="right"/>
				</div>
			</div>
			<!-- Fine contenitore -->
		</section>
		<!-- Fine section corpoCentrale -->
		

		</div>
		<br>
		<br>
		<br>
		<!-- Inizio footer -->
		<div id="footer" name="footer" bgcolor="#A4E4B9">
			<table style="width:100%">
				<tr>
					<td align="center" bgcolor="#A4E4B9">
						<p>
							UFL - University Fanta League  -  Progetto di Ingegneria del Software  -  Realizzato da Stefano Foresta, Gennaro Franzese, Giuseppe Paglialonga
						</p>
					</td>
				</tr>
			</table>
		</div>
		<!-- Fine footer -->
	</body>
</html>

