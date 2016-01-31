<!doctype html public>
<html dir="ltr" lang="IT">
	<head>
		<meta charset="UTF-8">
		<link href="styles/style.css" rel="stylesheet" type="text/css">
        <meta name="description" content="UFL - University Fanta League - website application per sfidare i tuoi compagni universitari in una fantalega">
        <meta name="keywords" content="università facoltà lega fantalega fantacalcio calcio soccer fantamilioni mercato calciatori">
        <meta name="author" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe">
        <meta name="copyright" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe, UFL">
        <meta name="robots" content="giornata,follow">
		<title>UFL - Giornata</title>
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
							<img src="image/giornate.png" width="472,4" height="70,8" alt="GIORNATE"/>
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

				<!--Classifica ateneo-->
				<h1>
					<center>
						<strong>- Classifica Ateneo TOP 20 -</strong>
					</center>
				</h1>
				<br>
				<table width="79%" border="1" bordercolor="rgba(47,145,60,1.00)" id="table_cateneo" align="center">
					<tr>
						<td>Posizione</td>
						<td>Squadra</td>
						<td>Allenatore</td>
						<td>Punteggio</td>
					</tr>

					<!--Costruzione righe classifica ateneo-->
					<?php
						$count = 1;
						while($count<21){
							/*echo"
								<tr>
									<td>Posizione".$posizione."</td>
									<td>Squadra".$squadra."</td>
									<td>Allenatore".$allenatore."</td>
									<td>Punteggio".$punteggio."</td>
								</tr>
								";*/
							echo"
								<tr>
									<td>Posizione</td>
									<td>Squadra</td>
									<td>Allenatore</td>
									<td>Punteggio</td>
								</tr>
								";
							$count++;
						}
					?>
				</table>
				<br>
				<br>

				<!--Classifica facoltà-->
				<h1>
					<center>
						<strong>- Classifica Facoltà -</strong>
					</center>
				</h1>
				<br>
				<table width="79%" border="1" bordercolor="rgba(47,145,60,1.00)" id="table_cfacolta" align="center">
					<tr>
						<td>Posizione</td>
						<td>Squadra</td>
						<td>Allenatore</td>
						<td>Punteggio</td>
					</tr>

					<!--Costruzione righe classifica facoltà-->
					<?php
						$count = 1;
						while($count<5/*$nsquadre*/){
							/*echo"
								<tr>
									<td>Posizione".$posizione."</td>
									<td>Squadra".$squadra."</td>
									<td>Allenatore".$allenatore."</td>
									<td>Punteggio".$punteggio."</td>
								</tr>
								";*/
							echo"
								<tr>
									<td>Posizione</td>
									<td>Squadra</td>
									<td>Allenatore</td>
									<td>Punteggio</td>
								</tr>
								";
							$count++;
						}
					?>
				</table>
				<br>
				<br>

				<!--Formazione giornata scelta-->
				<h1>
					<center>
						<strong>- Formazione -</strong>
					</center>
				</h1>
				<br>
				<table width="79%" border="1" bordercolor="rgba(47,145,60,1.00)" id="table_formazioneg" align="center">
					<tr>
						<td>Ruolo</td>
						<td>Nome</td>
						<td>Punteggio</td>
					</tr>

					<!--Costruzione righe formazione-->
					<?php
						$count = 1;
						while($count<18){
							/*echo"
								<tr>
									<td>Ruolo".$ruolo."</td>
									<td>Nome".$nome."</td>
									<td>Punteggio".$punteggio_g."</td>
								</tr>
								";*/
							echo"
								<tr>
									<td>Ruolo</td>
									<td>Nome</td>
									<td>Punteggio</td>
								</tr>
								";
							$count++;
						}
					?>
				</table>
				<br>
				<br>
			</div>
		
			<!-- Fine contenitore -->
		</div>
		<br>
		<br>
		<br>
		<!-- Inizio footer -->
		<div id="footer" name="footer" bgcolor="#A4E4B9"style="bottom:-1300">
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
