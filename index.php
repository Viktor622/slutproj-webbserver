<!DOCTYPE html>
<html>

	<head>

		<title> Shop </title>
		<link href="css.css" rel="stylesheet"/>
		
	</head>


	<body>
	
	
	
	
	

	<?php
	
	session_start();
		$dbc = mysqli_connect("localhost","root","","shop");
		mysqli_query($dbc,"SET names 'utf8'");
			
        if(isset($_GET['buy']) && isset($_SESSION['id'])){
         
            
			$query = "SELECT * FROM produkter WHERE id = "  . $_GET['buy'];
			$result = mysqli_query($dbc,$query);
			$row = mysqli_fetch_array($result);
            echo "VILL DU KÖPA " . $row['namn'];
			?>
			<a href ="?confirm=<?php echo $row['id']; ?>"> <button> JA </button></a>

			<?php
            
        }
		else if(isset($_GET['confirm']) && isset($_SESSION['id'])){
			$id = $_GET['confirm'];
			$kund = $_SESSION['id'];
			$query = "INSERT INTO orders (produkt_id,quantity,kund) VALUES ($id,1,$kund);";
			$result = mysqli_query($dbc,$query);
			  header("Location: /shop/");
			
			
		}
        else{
	?>
		<a href ="logout.php"> <button> Logga ut </button></a>	
		<a href ="omoss.html"> <button> Om oss </button></a>	
	<?php
	$query = "SELECT * FROM produkter";
	$result = mysqli_query($dbc,$query);
	
	while($row = mysqli_fetch_array($result)){
		
		
		?>
		
		<div class="itemContainer">
	
			<img class="itemImage" src="bilder/<?php echo $row['bild']; ?>" />
			
			<p class="itemName"> <?php echo $row['namn']; ?> </p>
			<p class="itemDesc"> <?php echo $row['beskrivning']; ?> </p>
			
			<div class="itemPriceContainer">
			
				<p class="itemPrice"><?php echo $row['pris']; ?> kr</p>
                <a href="?buy=<?php echo $row['id']; ?>"><p class="itemBuy"> Köp </p></a>
			
			</div>
		
		</div>
	
	<?php
		
	}
        }
	
	?>
	
	
	</body>

</html>