<?php 


function stampaRosaPage(){
include 'preBody.php';
include 'bodyRosa.php';
include 'postBody.php';

}
function stampaHomePage()
{
include 'preBody.php';
include 'aprirow.php';
include 'sidebarHome.php';
include 'login.php';
include 'chiudiRow.php';
include 'postBody.php';
}

function stampaRegistrazione($para){
	include 'preBody.php';
	include 'registrazione.php';
	if ($para==1)
	{
		echo '<div  class="alert alert-success">
    <strong>Success!</strong> <strong>Registrazione avvenuta!</strong></div>';
	}
	include 'postBody.php';
}

function creaGraficaAdmin($avviso, $str)
{
include 'preBody.php';
include 'apriRow.php';
include 'sidebarAdmin.php';
include 'admi.php';

if ($avviso)
	echo '<div  class="col-md-3 alert alert-success">
    <strong>Success!</strong> <strong>'. $str.'</strong></div>';
include 'chiudiRow.php';
include 'postBody.php';


}
function calendarioCaricato()
{
include 'preBody.php';
include 'apriRow.php';
include 'sidebarAdmin.php';

echo '<div class="col-md-6"><div class="alert alert-success">
    <strong>Success!</strong> This alert box could indicate a successful or positive action.
  </div></div>';

include 'chiudiRow.php';
include 'postBody.php';


}
function stampaFormazionePage(){
include 'preBody.php';
include 'aprirow.php';
include 'sidebar.php';
include 'miaFormazionePage.php';
include 'chiudiRow.php';
include 'postBody.php';
}
function stampaCreaFormazione()
{
include 'preBody.php';
include 'bodyFormazione.php';
include 'postBody.php';

}
function stampaMiaRosaPage(){
include 'preBody.php';
include 'aprirow.php';
include 'sidebar.php';
include 'rosaPage.php';
include 'chiudiRow.php';
include 'postBody.php';

}
?>