<?php

$cookie = $_POST['kaka'];
$antalPall = (int)$_POST['pall'];

include "connect.php";

for ($i=0;$i<$antalPall;$i++){
	//echo "Loop nr ".($i+1)."<br>";
	$cookieData = mysqli_query($con,"SELECT * FROM cookies WHERE cookiename='$cookie'");
	if (!$cookieData) {
    	printf("Error: %s\n", mysqli_error($con));
    	exit();}
	while ($row = mysqli_fetch_array($cookieData))
		{
			//echo $row['ingredientname']." - "; 
			$ingred = $row['ingredientname'];
			//echo $row['amount']."<br>";
			$amount = (int)$row['amount'];

			//SUBTRACT FROM STORAGE RECEPIE*54/PALLET
				$ingredientData = mysqli_query($con,"SELECT * FROM ingredients WHERE ingredientname='$ingred'");
				if (!$ingredientData) {
    			printf("Error: %s\n", mysqli_error($con));
    			exit();}
    			while ($row2 = mysqli_fetch_array($ingredientData))
					{
					$newQuantity = (int)$row2['storedquantity']-($amount*54);
					//echo (int)$row2['storedquantity']." - ".$ingred." * 54 = ".$newQuantity."<br><br>";
					$sql = "UPDATE ingredients SET storedquantity='$newQuantity' WHERE ingredientname='$ingred'";

					if ($con->query($sql) === TRUE) {
						//echo "Databasen uppdaterades korrekt!";
					} else {
						echo "Fel vid uppdatering av databas: " . $con->error;
						}

					}

		}
	}

for ($i=0;$i<$antalPall;$i++){
	$random =(int)rand(100000, 999999);
	$random2 =(int)rand(1, 8);
	$date=date('Y-m-d');
	$sql3 = "INSERT INTO orders(orderid, deliverydate, customerid) VALUES ('$random','$date','$random2')";
	if ($con->query($sql3) === TRUE) {
		//echo "<br>Databasen uppdaterades korrekt!";
		} else {
				echo "<br>Fel vid uppdatering av databas: " . $con->error;
				}

	$sql2 = "INSERT INTO pallets(productiondate, cookiename, blocked, orderid) VALUES ('$date','$cookie',0,'$random')";
	if ($con->query($sql2) === TRUE) {
		//echo "<br>Databasen uppdaterades korrekt!";
		} else {
				echo "<br>Fel vid uppdatering av databas: " . $con->error;
				}
}

header("location: http://naterman.nu/Databasteknik/producera.php");

