<!doctype html public>
<html dir="ltr" lang="IT">
	<head>
		<meta charset="UTF-8">
		<link href="styles/style.css" rel="stylesheet" type="text/css">
        <meta name="description" content="UFL - University Fanta League - website application per sfidare i tuoi compagni universitari in una fantalega">
        <meta name="keywords" content="università facoltà lega fantalega fantacalcio calcio soccer fantamilioni mercato calciatori">
        <meta name="author" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe">
        <meta name="copyright" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe, UFL">
        <meta name="robots" content="squadra,follow">
		<title>UFL - Squadra</title>
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
									echo"
										<td width=\"10%\" height=\"30%\">
											<a href=\"giornata.php\">" . $count . "</a>
										</td>
										";
									$count++;
								}
							?>
						</tr>
					</table>
					<table style="width:100%">
						<tr>
							<td align="center" bgcolor="#A4E4B9">
								<img src="image/squadrat.png" width="472,4" height="70,8" alt="SQUADRA"/>
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

					<!-- Tabella per visualizzazione rosa -->
					<h1>
						<center>
							<strong>- ROSA -</strong>
						</center>
					</h1>
					<table name="Rosa" width="100%" border="1" id="rosa">
						<tr>
							<td>Ruolo</td>
							<td>Nome</td>
							<td>Prezzo iniziale</td>
							<td>Prezzo attuale</td>
							<td>Squadra</td>
						</tr>
    					<tr name="row_g">
							<td name="td_ruolo"></td>
							<td name="td_nome"></td>
    						<td name="td_iniziale"></td>
    						<td name="td_finale"></td>
    						<td name="td_squadra"></td>
    					</tr>
					</table>
					<!-- fine tabella rosa -->


					<hr align=”left” size=”2″ width=”300″ color=”green” noshade>
					
					<!-- inizio formazione -->
					<h1>
						<center>
							<strong>- FORMAZIONE -</strong>
						</center>
					</h1>

					<!-- form modulo -->
					<center>
						<form align="center" style="width:30%" method="post" action="squadra.php" name="form_modulo">
							<br>
							<fieldset align="center" name="field_modulo">
								<legend>Scelta del modulo</legend>
								<input type="radio" id="433" name="modulo" value="433"/>433
								<input type="radio" id="343" name="modulo" value="343"/>343
								<input type="radio" id="442" name="modulo" value="442"/>442
								<input type="radio" id="352" name="modulo" value="352"/>352
								<input type="radio" id="532" name="modulo" value="532"/>532
								<input type="radio" id="541" name="modulo" value="541"/>541
								
							</fieldset>
							<br>
							<input type="submit">
						</form>
					</center>
					<!-- fine formazione -->
					<?php
						$modulo = $_POST['modulo'];
						switch ($modulo) {

							case '433':
								echo"
									<h1>
										<center>
											<strong> -Modulo 433- </strong>
										</center>
									</h1>

									<!--Portieri-->
									<h3>
										<center>
											<strong> -Portiere- </strong>
										</center>
									</h3>
									<table name=\"portieri\" id=\"portieri\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Difensori-->
									<h3>
										<center>
											<strong> -Difensori- </strong>
										</center>
									</h3>
									<table name=\"difensori\" id=\"difensori\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Centrocampisti-->
									<h3>
										<center>
											<strong> -Centrocampisti- </strong>
										</center>
									</h3>
									<table name=\"centrocampisti\" id=\"centrocampisti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Attaccanti-->
									<h3>
										<center>
											<strong> -Attaccanti- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Panchinari-->
									<h3>
										<center>
											<strong> -Panchina- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">
										<tr id=\"\" name=\"\">
											<td>Por</td>
											<td>Dif 1</td>
											<td>Dif 2</td>
											<td>Cen 1</td>
											<td>Cen 2</td>
											<td>Att 1</td>
											<td>Att 2</td>
										</tr>
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>
								";
								break;

							case '343':
								echo"
									<h1>
										<center>
											<strong> -Modulo 343- </strong>
										</center>
									</h1>

									<!--Portieri-->
									<h3>
										<center>
											<strong> -Portiere- </strong>
										</center>
									</h3>
									<table name=\"portieri\" id=\"portieri\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Difensori-->
									<h3>
										<center>
											<strong> -Difensori- </strong>
										</center>
									</h3>
									<table name=\"difensori\" id=\"difensori\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Centrocampisti-->
									<h3>
										<center>
											<strong> -Centrocampisti- </strong>
										</center>
									</h3>
									<table name=\"centrocampisti\" id=\"centrocampisti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Attaccanti-->
									<h3>
										<center>
											<strong> -Attaccanti- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Panchinari-->
									<h3>
										<center>
											<strong> -Panchina- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">
										<tr id=\"\" name=\"\">
											<td>Por</td>
											<td>Dif 1</td>
											<td>Dif 2</td>
											<td>Cen 1</td>
											<td>Cen 2</td>
											<td>Att 1</td>
											<td>Att 2</td>
										</tr>
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>
								";
								break;

							case '442':
								echo"
									<h1>
										<center>
											<strong> -Modulo 442- </strong>
										</center>
									</h1>

									<!--Portieri-->
									<h3>
										<center>
											<strong> -Portiere- </strong>
										</center>
									</h3>
									<table name=\"portieri\" id=\"portieri\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Difensori-->
									<h3>
										<center>
											<strong> -Difensori- </strong>
										</center>
									</h3>
									<table name=\"difensori\" id=\"difensori\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Centrocampisti-->
									<h3>
										<center>
											<strong> -Centrocampisti- </strong>
										</center>
									</h3>
									<table name=\"centrocampisti\" id=\"centrocampisti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Attaccanti-->
									<h3>
										<center>
											<strong> -Attaccanti- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Panchinari-->
									<h3>
										<center>
											<strong> -Panchina- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">
										<tr id=\"\" name=\"\">
											<td>Por</td>
											<td>Dif 1</td>
											<td>Dif 2</td>
											<td>Cen 1</td>
											<td>Cen 2</td>
											<td>Att 1</td>
											<td>Att 2</td>
										</tr>
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>
								";
								break;

							case '352':
								echo"
									<h1>
										<center>
											<strong> -Modulo 352- </strong>
										</center>
									</h1>

									<!--Portieri-->
									<h3>
										<center>
											<strong> -Portiere- </strong>
										</center>
									</h3>
									<table name=\"portieri\" id=\"portieri\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Difensori-->
									<h3>
										<center>
											<strong> -Difensori- </strong>
										</center>
									</h3>
									<table name=\"difensori\" id=\"difensori\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Centrocampisti-->
									<h3>
										<center>
											<strong> -Centrocampisti- </strong>
										</center>
									</h3>
									<table name=\"centrocampisti\" id=\"centrocampisti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Attaccanti-->
									<h3>
										<center>
											<strong> -Attaccanti- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Panchinari-->
									<h3>
										<center>
											<strong> -Panchina- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">
										<tr id=\"\" name=\"\">
											<td>Por</td>
											<td>Dif 1</td>
											<td>Dif 2</td>
											<td>Cen 1</td>
											<td>Cen 2</td>
											<td>Att 1</td>
											<td>Att 2</td>
										</tr>
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>
								";
								break;

							case '532':
								echo"
									<h1>
										<center>
											<strong> -Modulo 532- </strong>
										</center>
									</h1>

									<!--Portieri-->
									<h3>
										<center>
											<strong> -Portiere- </strong>
										</center>
									</h3>
									<table name=\"portieri\" id=\"portieri\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Difensori-->
									<h3>
										<center>
											<strong> -Difensori- </strong>
										</center>
									</h3>
									<table name=\"difensori\" id=\"difensori\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Centrocampisti-->
									<h3>
										<center>
											<strong> -Centrocampisti- </strong>
										</center>
									</h3>
									<table name=\"centrocampisti\" id=\"centrocampisti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Attaccanti-->
									<h3>
										<center>
											<strong> -Attaccanti- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Panchinari-->
									<h3>
										<center>
											<strong> -Panchina- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">
										<tr id=\"\" name=\"\">
											<td>Por</td>
											<td>Dif 1</td>
											<td>Dif 2</td>
											<td>Cen 1</td>
											<td>Cen 2</td>
											<td>Att 1</td>
											<td>Att 2</td>
										</tr>
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>
								";
								break;

							case '541':
								echo"
									<h1>
										<center>
											<strong> -Modulo 541- </strong>
										</center>
									</h1>

									<!--Portieri-->
									<h3>
										<center>
											<strong> -Portiere- </strong>
										</center>
									</h3>
									<table name=\"portieri\" id=\"portieri\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Difensori-->
									<h3>
										<center>
											<strong> -Difensori- </strong>
										</center>
									</h3>
									<table name=\"difensori\" id=\"difensori\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Centrocampisti-->
									<h3>
										<center>
											<strong> -Centrocampisti- </strong>
										</center>
									</h3>
									<table name=\"centrocampisti\" id=\"centrocampisti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Attaccanti-->
									<h3>
										<center>
											<strong> -Attaccanti- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">

										<!--Titolari-->
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>

									<!--Panchinari-->
									<h3>
										<center>
											<strong> -Panchina- </strong>
										</center>
									</h3>
									<table name=\"attaccanti\" id=\"attaccanti\" width=\"100%\" border=\"1\">
										<tr id=\"\" name=\"\">
											<td>Por</td>
											<td>Dif 1</td>
											<td>Dif 2</td>
											<td>Cen 1</td>
											<td>Cen 2</td>
											<td>Att 1</td>
											<td>Att 2</td>
										</tr>
										<tr id=\"\" name=\"\">
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
											<td><input type=\"\" id=\"\" name=\"\" value=\"\"/></td>
										</tr>
									</table>
								";
								break;
							default:
								echo"
									<h2>
										<center>
											<strong>Effettuare selezione modulo</strong>
										</center>
									</h2>
									";
								break;
						}
					?>
				</div>
			</div>
			<!-- Fine contenitore -->
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