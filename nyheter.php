<?php

session_start();
	$dbc = mysqli_connect("localhost","root","","shop");

  if( isset($_POST['Titel']) && isset($_POST['Content'])){
	
	$titel = $_POST['Titel'];
	$content = $_POST['Content'];
	
	
 $query = "INSERT INTO news (Titel,Content) VALUES ('$titel','$content')";

	mysqli_query($dbc,$query);
 }

?>

<!DOCTYPE HTML>

<html>

<head>


</head>

<body>

<a href ="index.php"> <button> Shop </button><a/>

<?php

$query = "SELECT * FROM news";
	$result = mysqli_query($dbc,$query);
	
	while($row = mysqli_fetch_array($result)){
		
		echo "<b>".$row['titel'] . "</b><br>";
		echo $row['content'] . "<br><br><br>";
	}
		
		?>



<form action = "nyheter.php" method = "POST">
		
		Titel:<input type = "text" name = "Titel" > </input><br>
		Content:<input type = "text" name = "Content" > </input><br>

		<input type="submit" value = "Publicera" />
		
		</form>
		
		</body>
		

</html>