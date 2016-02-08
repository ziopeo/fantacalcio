
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <img id="immGiornate" src="image/giornate.png" width="100" height="16">
       
      <ul class="nav navbar-nav">
         <?php getCorpoGiornate();?>
      </ul>
    </div>
   
  </div>
</nav>
<?php
function getCorpoGiornate()
{
    $giornate = 37;//=getNumeroGiornate();
    for($i=1;$i<=$giornate;$i++)
        echo '<li><a href="controller.php?giornata='. $i.'">'.$i.'</a></li>';
}
?>