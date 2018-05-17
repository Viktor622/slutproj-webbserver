<?php

session_start();

  if( isset($_POST['Titel']) && isset($_POST['Content'])){
	
	$titel = $_POST['Titel'];
	$content = $_POST['Content'];
	
	$dbc = mysqli_connect("localhost","root","","shop");
	
 $query = "INSERT INTO news (Titel,Content) VALUES ('$titel','$content')";

	mysqli_query($dbc,$query);
 }

?>

<!DOCTYPE HTML>

<html>

<head>


</head>

<body>

<p> Hor choklad kommer inom kort jaok ge oss  betyg bitch </p>

<form action = "nyheter.php" method = "POST">
		
		Titel:<input type = "text" name = "Titel" > </input><br>
		Content:<input type = "text" name = "Content" > </input><br>

		<input type="submit" value = "Publicera" />
		
		</form>
		
		</body>
		

</html>