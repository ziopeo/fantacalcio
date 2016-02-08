<!DOCTYPE html>
<html lang="it">
<?php include 'head.php';?>
<body onload="getSquadre()">
	<div class="jumbotron">
	    <div class="container text-center">
	      <img id="immLogo" src="image/logoLungoSMALL.png" alt="UFL - University Fanta League">
	    </div>
	</div>

	<?php include 'navigator.php'; ?>
	<div class="container-fluid text-center">    
	  <div class="row">
		<?php  include 'sidebar.php';?>
			<?php include 'rosa.php'; ?>
		</div>
	</div>

<?php include 'footer.php';?>
<script ="text/javascript">
fantamilioni();
</script>
</body>
</html>