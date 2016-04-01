
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     
       
      <ul class="nav navbar-nav">
      <li><img id="immGiornate" src="image/giornate.png" width="100" height="16"></li>
         <?php $giornate =getNumeroGiornate();
          for($i=1;$i<=$giornate;$i++)
            echo '<li><a href="controller.php?giornata='. $i.'">'.$i.'</a></li>';?>
      </ul>
    </div>
   
  </div>
</nav>

