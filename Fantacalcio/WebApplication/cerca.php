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
		<link href="css/principale.css" rel="stylesheet" type="text/css">
        <link href="css/index.css" rel="stylesheet" type="text/css">
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
							<!--Inserire riferimenti alle giornate e controllo per le giornate già giocate per la costruzione della tabella-->
							<td width="30%" height="30%"><a>1<!--Inserisci giornata--></a></td>
						</tr>
					</table>
					<table style="width:100%">
						<tr>
							<td align="center" bgcolor="#A4E4B9">
								<img src="image/cercat.png" width="472,4" height="70,8" alt="CERCA"/>
							</td>
						</tr>
					</table>
				</div>
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
						<div id="e">
							<img src="image/logout.png" width="177,2" height="59,1" alt="">
						</div>
			
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

					<!--Section della ricerca-->
					<section in="ricerca">
						<!--Ricerca giocatore-->
						<form name="r_giocatore" method="post" action="/search" style="width:30%">
 							<fieldset align="center" name="field_modulo">	
 								<legend> Ricerca giocatore: </legend>
    							<input type="search" autocomplete="on" placeholder="nome,cognome" name="keyword_g" required maxlength="50">
  								<input type="submit" value="Ricerca">
  							</fieldset>
						</form>

						<!--Ricerca squadra-->
						<form name="r_squadra" method="post" action="/search" style="width:30%">
 							<fieldset align="center" name="field_modulo">	
 								<legend> Ricerca squadra: </legend>
    							<input type="search" autocomplete="on" placeholder="nome squadra" name="keyword_s" required maxlength="50">
  								<input type="submit" value="Ricerca">
  							</fieldset>
						</form>

						<!--Ricerca utente-->
						<form name="r_utente" method="post" action="/search" style="width:30%">
 							<fieldset align="center" name="field_modulo">	
 								<legend> Ricerca utente: </legend>
    							<input type="search" autocomplete="on" placeholder="nome utente" name="keyword_u" required maxlength="50">
  								<input type="submit" value="Ricerca">
  							</fieldset>
						</form>
					</section>

					<!--Section dei risultati-->
					<section in="risultati">

					</section>
				</div>
			</div>
			<!-- Fine contenitore -->
				
		
			<footer>
		
			</footer>
				<!-- Fine footer -->
		</div>
	</body>
</html>