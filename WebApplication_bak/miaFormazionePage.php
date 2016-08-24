<div class="col-md-9">

<div class="panel panel-primary">

	<div class="panel-heading col-md-5 " >Portieri</div>
	<div class="panel-heading col-md-3" >voto</div>
	<div class="panel-heading col-md-4" >Squadra</div>

		<div class="col-md-5" id="nomiPortieri" >
			<div class="panel-body portiere ">p</div>
		</div>

		<div class="col-md-3" id="VotoPagellaPortieri">
			<div class="panel-body VotoPagellaPortiere">Voto-Pagella</div>

		</div>

		<div class="col-md-4" id="squadrePortieri">
			<div class=" panel-body squadraPortiere">Squadra</div>

		</div>
		
	<div class="panel-heading col-md-5 " >Difensori</div>
	<div class="panel-heading col-md-3" >Voto-Pagella</div>
	<div class="panel-heading col-md-4" >Squadra</div>
	
	<?php 
//difensori
	$mod=("343");//$_SESSION['modulo'];

			echo '<div class="col-md-5" id="nomiDifensori">';
			for ($i=0; $i< intval($mod[0]);$i++)
			{
				echo '<div class="panel-body difensore ">difensore</div>';
			}
			echo '</div><div class="col-md-3" id="VotoPagellaDifensori">';

			for ($i=0; $i< intval($mod[0]);$i++)
			{
				echo '<div class="panel-body VotoPagellaDifensore">difensore</div>';
			}
			echo '</div><div class="col-md-4" id="squadreDifensori">';
			for ($i=0; $i< intval($mod[0]);$i++)
			{

				echo '<div class="panel-body squadraDifensore">squadraDifensore </div>';
			}
//Centrocampisti
			echo '</div><div class="panel-heading col-md-5 " >Centrocampisti</div>
			<div class="panel-heading col-md-3" >Voto-Pagella</div>
			<div class="panel-heading col-md-4" >Squadra</div>';
			echo '<div class="col-md-5" id="nomiCentrocampisti">';
			for ($i=0; $i< intval($mod[1]);$i++)
			{
				echo '<div class="panel-body centrocampista ">centrocampista</div>';
			}
			echo '</div><div class="col-md-3" id="VotoPagellaCentrocampisti">';

			for ($i=0; $i< intval($mod[1]);$i++)
			{
				echo '<div class="panel-body VotoPagellaCentrocampista ">Centrocampisti</div>';
			}
			echo '</div><div class="col-md-4" id="squadreCentrocampisti">';
			for ($i=0; $i< intval($mod[1]);$i++)
			{

				echo '<div class="panel-body squadraCentrocampista">squadraCentrocampist </div>';
			}

			//Attaccanti
			echo '</div><div class="panel-heading col-md-5 " >Attaccanti</div>
			<div class="panel-heading col-md-3" >Voto-Pagella</div>
			<div class="panel-heading col-md-4" >Squadra</div>';
			echo '<div class="col-md-5" id="nomiAttaccanti">';
			for ($i=0; $i< intval($mod[2]);$i++)
			{
				echo '<div class="panel-body attaccante ">Attaccante</div>';
			}
			echo '</div><div class="col-md-3" id="VotoPagellaAttaccanti">';

			for ($i=0; $i< intval($mod[2]);$i++)
			{
				echo '<div class="panel-body VotoPagellaAttaccante ">Attaccante</div>';
			}
			echo '</div><div class="col-md-4" id="squadreAttaccanti">';
			for ($i=0; $i< intval($mod[2]);$i++)
			{

				echo '<div class="panel-body squadraAttaccante">squadraAttaccante </div>';
			}
			echo '</div>';
	    ?>

	 <div class="col-md-12"><H2>Panchina</H2></div>
		<div class="panel-heading col-md-5 " >Portieri</div>
		<div class="panel-heading col-md-3" >voto</div>
		<div class="panel-heading col-md-4" >Squadra</div>	 

		<div class="col-md-5" id="nomiPortieriPanchina" >
			<div class="panel-body portierePanchina ">p</div>

		</div>

		<div class="col-md-3" id="VotoPagellaPortieriPanchina">
			<div class=" panel-body VotoPagellaPortierePanchina">Voto-Pagella</div>

		</div>

		<div class="col-md-4" id="squadrePortieriPanchina">
			<div class=" panel-body squadraPortierePanchina">Squadra</div>

		</div>
		<div class="panel-heading col-md-5 " >Difensori</div>
		<div class="panel-heading col-md-3" >Voto-Pagella</div>
		<div class="panel-heading col-md-4" >Squadra</div>
			<?php 
//difensoriPanchian
	$mod=("222");//$_SESSION['modulo'];

			echo '<div class="col-md-5" id="nomiDifensoriPanchina">';
			for ($i=0; $i< intval($mod[0]);$i++)
			{
				echo '<div class="panel-body difensorePanchina ">difensore</div>';
			}
			echo '</div><div class="col-md-3" id="VotoPagellaDifensoriPanchina">';

			for ($i=0; $i< intval($mod[0]);$i++)
			{
				echo '<div class="panel-body VotoPagellaDifensorePanchina ">difensore</div>';
			}
			echo '</div><div class="col-md-4" id="squadreDifensoriPanchina">';
			for ($i=0; $i< intval($mod[0]);$i++)
			{

				echo '<div class="panel-body squadraDifensorePanchina">squadraDifensore </div>';
			}
//CentrocampistiPanchina
			echo '</div><div class="panel-heading col-md-5 " >Centrocampisti</div>
			<div class="panel-heading col-md-3" >Voto-Pagella</div>
			<div class="panel-heading col-md-4" >Squadra</div>';
			echo '<div class="col-md-5" id="nomiCentrocampistiPanchina">';
			for ($i=0; $i< intval($mod[1]);$i++)
			{
				echo '<div class="panel-body centrocampistaPanchina ">centrocampista</div>';
			}
			echo '</div><div class="col-md-3" id="VotoPagellaCentrocampistiPanchina">';

			for ($i=0; $i< intval($mod[1]);$i++)
			{
				echo '<div class="panel-body VotoPagellaCentrocampistaPanchina ">Centrocampisti</div>';
			}
			echo '</div><div class="col-md-4" id="squadreCentrocampistiPanchina">';
			for ($i=0; $i< intval($mod[1]);$i++)
			{

				echo '<div class="panel-body squadraCentrocampistaPanchina">squadraCentrocampist </div>';
			}

//AttaccantiPanchina
			echo '</div><div class="panel-heading col-md-5 " >Attaccanti</div>
			<div class="panel-heading col-md-3" >Voto-Pagella</div>
			<div class="panel-heading col-md-4" >Squadra</div>';
			echo '<div class="col-md-5" id="nomiAttaccantiPanchina">';
			for ($i=0; $i< intval($mod[2]);$i++)
			{
				echo '<div class="panel-body attaccantePanchina ">Attaccante</div>';
			}
			echo '</div><div class="col-md-3" id="VotoPagellaAttaccantiPanchina">';

			for ($i=0; $i< intval($mod[2]);$i++)
			{
				echo '<div class="panel-body VotoPagellaAttaccantePanchina ">Attaccante</div>';
			}
			echo '</div><div class="col-md-4" id="squadreAttaccantiPanchina">';
			for ($i=0; $i< intval($mod[2]);$i++)
			{

				echo '<div class="panel-body squadraAttaccantePanchina">squadraAttaccante </div>';
			}
			echo '</div>';
	    ?>



		<div class=" col-md-5 " ></div>
		<div class="panel-heading col-md-3" id="headVotoPagellaTotale" >Somma Voti:</div>
		<div class="col-md-4" ></div>
		<div class="col-md-5" ></div>
		<div class="col-md-3" id="VotoPagellaTotale">voto totale</div>
		<div class="col-md-4"></div>

<script type="text/javascript"> caricaFormazionePage();</script>
</div>
</div>
