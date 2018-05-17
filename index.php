<!DOCTYPE html>
<html>

	<head>

		<title> Shop </title>
		<link href="css.css" rel="stylesheet"/>
		
	</head>


	<body>
	
	<a href ="logout.php"> <button> Logga ut </button></a>
    <a href ="?"> <button> Bekräfta </button></a>
	
	
	
	

	<?php
	
        if(isset($_GET['buy'])){
         
            
            
            echo "DU KÖPTE PRODUKT" . $_GET['buy'];
            
            
        }
        else{
	$dbc = mysqli_connect("localhost","root","","shop");
	
	$query = "SELECT * FROM produkter";
	mysqli_query($dbc,"SET names 'utf8'");
	$result = mysqli_query($dbc,$query);
	
	while($row = mysqli_fetch_array($result)){
		
		
		?>
		
		<div class="itemContainer">
	
			<img class="itemImage" src="bilder/<?php echo $row['bild']; ?>" />
			
			<p class="itemName"> <?php echo $row['namn']; ?> </p>
			<p class="itemDesc"> <?php echo $row['beskrivning']; ?> </p>
			
			<div class="itemPriceContainer">
			
				<p class="itemPrice"><?php echo $row['pris']; ?> kr</p>
                <a href="?buy=<?php echo $row['namn']; ?>"><p class="itemBuy"> Köp </p></a>
			
			</div>
		
		</div>
	
	<?php
		
	}
        }
	
	?>
	
	
	</body>

</html>