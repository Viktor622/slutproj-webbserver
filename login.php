<?php

session_start();

if(!isset($_SESSION['loggedIn'])){
	$_SESSION['loggedIn'] = false;
}

if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	$_SESSION['loggedIn'] = false;
}
if( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['adress'])){
	// användare vill registrera sig
	echo "Hej";
	$dbc = mysqli_connect("localhost","root","","shop");
	
	// Hämta data
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$adress = htmlspecialchars ($_POST ['adress']);
	
	// Formulera fråga
	$query = "INSERT INTO users (Username,Mail,Password,Adress) VALUES ('$username','$email','$password','$adress')";

	// Kolla om frågan fungerar
	if(mysqli_query($dbc,$query)){
		echo "Du är nu registrerad! Logga in nedan:<br>";
	}
	else{
		echo "Något gick fel...";
	}
	
}
else if( isset($_POST['username']) && isset($_POST['password'])){
	// användare vill logga in
	
	$dbc = mysqli_connect("localhost","root","","shop");
	
	// Hämta data
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	
	// Formulera fråga
	$query = "SELECT * FROM users WHERE Username = '$username' AND Password = '$password'";
	
	// Ställ frågan
	$result = mysqli_query($dbc,$query);
	
	// Finns en rad med resultat så har användaren skrivit rätt information
	if(mysqli_fetch_array($result)){
		//echo "Du är nu inloggad!";
		$_SESSION['loggedIn'] = true;
		$_SESSION['username'] = $username;
	}
	else{
		echo "Fel uppgifter, försök igen...";
		$_SESSION['loggedIn'] = false;
	}

}

?>

<!DOCTYPE html>
<html>

<head>
	<title> Min sida </title>
	<link rel="stylesheet" href="css.css">
</head>


<body>

<?php 

if(!$_SESSION['loggedIn']){ // Om man inte är inloggad, visa formulär

?>
	
	Registreringsformulär:
	<form action = "login.php" method = "POST">
		
		Användarnamn:<input type = "text" name = "username" > </input><br>
		Mail:<input type = "email" name = "email" > </input><br>
		Lösenord:<input type = "password" name = "password" > </input><br>
        Adress:<input type = "text" name = "adress" > </input><br>
		
		<input type="submit" value = "Registrera" />

	</form>
	
	<br><br><br>
	
	Loginformulär:
	<form action = "login.php" method = "POST">
		
		Användarnamn:<input type = "text" name = "username" > </input><br>
		Lösenord:<input type = "password" name = "password" > </input><br>

		<input type="submit" value = "Logga in" />

	</form>
	
<?php
}
else{ // Om man redan är inloggad, visa den riktiga sidan

header("Location: /shop/");

}
?>
	

</body>

</html>