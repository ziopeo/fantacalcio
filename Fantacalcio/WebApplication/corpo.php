<?
echo '<html>
<script>
function myFunction() {
    document.getElementById("demo").innerHTML = "Paragraph changed.";
}
</script>
<body>
	<div id="corpoPrincipale">
		<form action="controller.php" method="post">
		<input type="hidden" name="metodo" value="getGiocatori"> 
	Matricola 
		<input type="text" name="user_log">
	Pass: 
		<input type="text" name="pass_log"> 
		</br>
		<input type="submit"></form>
		<div id="demo"> demo</div>
	<button type="button" onclick="myFunction()">Try it</button>
	</DIV>
</body>
</html>';

?>