<!doctype html public>
<html dir="ltr" lang="IT">
	<head>
		<meta charset="UTF-8">
		<link href="styles/style.css" rel="stylesheet" type="text/css">
        <meta name="description" content="UFL - University Fanta League - website application per sfidare i tuoi compagni universitari in una fantalega">
        <meta name="author" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe">
        <meta name="copyright" content="Foresta Stefano, Franzese Gennaro, Paglialonga Giuseppe, UFL">
		<title>UFL - Admin Panel</title>
	</head>
	<body>
		<div id="total">
		<!-- header con titolo e giornte -->
		<header>
			<!--Immagine principale-->
			<img id="logo" src="image/logoLungoSMALL.png" alt="UFL - University Fanta League"/>
		</header>
		<!--Fine header-->

		<!--contenitore-->
		<div id="contenitore">
			<!-- Section per la barra laterale contenente il menù -->
			<section id="sidebar">
				<div id="menù" style="float:left">

					<!--Inserire i collegamenti che modificano la pagina-->
					<a href="admin.php?scelta=load">
						<div id="upload">
							<img src="image/uploadFile.png" width="177,2" height="59,1" alt="UPLOAD"/>
						</div>
					</a>
					<a href="admin.php?scelta=gestione">
						<div id="gestioneLega">
							<img src="image/gestioneLega.png" width="177,2" height="59,1" alt="GESTIONE LEGA"/>
						</div>
					</a>
					<a href="admin.php?scelta=cerca">
						<div id="cerca">
							<img src="image/cerca.png" width="177,2" height="59,1" alt="CERCA">
						</div>
					</a>
				<!--	<a href="">
						<div id="c">
							<img src="" width="177,2" height="59,1" alt="">
						</div>
					</a>-->
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
				<?php
					$scelta = $_GET["scelta"];
					$nome = $_GET["nome"];
					switch ($scelta) {

						/*caso upload file*/
						case 'load':
							echo'
								aaaaaaa
							';
							break;

						/*caso gestione leghe*/
						case'gestione':
							echo'
								bbbbbbbb
							';
							break;

						/*caso cerca*/
						case'cerca':
							echo'
								ccccccccccc
							';
							break;
						case'name':
							echo'
								<h1>
									<strong>
										<center>Benvenuto '.$nome.'</center>
									</strong>
								</h1>
								<br>
								<p>
									<center>
										Questo è il pannello di controllo che ti permetterà di gestire le varie leghe e il caricamento dei file che serviranno ai tuoi iscritti per intraprendere la carriera di Fantallenatore
									</center>
								</p>
								<br>
								<p>
									<center>
										<h2>
											Sul lato sinistro trovi il menù di navigazione.<br>
										</h2>
										- Con <strong>Upload file</strong> potrai caricare i file che permetteranno agli iscritti di avere a disposizione la lista dei giocatori disponibile per il mercato e i file che serviranno per il calcolo del punteggio di ogni giornata.<br>
										- Con <strong>Gestione leghe</strong> potrai gestire la lega principale, ossia la Lega Ateneo, e le varie leghe di facoltà(es. aprire e chiudere il mercato, calcolare le giornate...).<br>
										- Con <strong>Cerca</strong> potrai cercare rapidamente una lega, una squadra o un allenatore.<br>
									</center>
								</p>
							';
						default:
							break;
					}
				?>
			</div>
			<!-- Fine contenitore -->
		</section>
		<!-- Fine section corpoCentrale -->
		

		</div>
		<br>
		<br>
		<br>
		<!-- Inizio footer -->
		<div id="footer" name="footer" bgcolor="#A4E4B9" style="bottom:-1000">
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