
<?php 
function getCorpoGiornate()
{
    $corpo='';;
    $giornate = 37;//=getNumeroGiornate();
    for($i=0;$i<$giornate;$i++)
        echo '<td><a href="controller.php">' . $i. '</a></td>';
}



function stampaFormazioniPage(){
	include 'head.php';
include 'bodyFormazionePage.php';
include 'header.php';

include 'sidebar.php';
include 'formazioni.php'; 
include 'footer.php';
}
function stampaHomePage()
{
include 'head.php';
include 'header.php';
include 'corpoBody.php';
include 'sidebar.php';
include 'login.php'; 
include 'footer.php';
}
?>
	



