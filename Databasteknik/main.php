<?php session_start();
if (!isset($_SESSION['login_user'])){header("location: index.php");}
include_once "topmeny.php";
show_header('home');?>

<div class="container">
      <div class="row">
        <div class="col-sm-4" style="padding-left:30px;">
         	<h2 class="mt-4">Kunder</h2>
          <?php show_customers();?>
        </div>
        <div class="col-sm-4" style="padding-left:30px;">
         	<h2 class="mt-4">Recept</h2>
          <?php show_recepie();?>
        </div>
        <div class="col-sm-4" style="padding-left:30px;">
        	<h2 class="mt-4">Ingredienslager</h2>
         	<?php show_storage();?>
        </div>
      </div>
</div>

<?php
function show_customers(){
	include "database/connect.php";
	echo '<table>
  <tr>
    <th style="padding-left:10px;">Företag</th>
    <th style="padding-left:10px;">Adress</th>
    <th style="padding-left:10px;">ID</th>
  </tr>';
	$customerData = mysqli_query($con,"SELECT * FROM customers");
	if (!$customerData) {
    	printf("Error: %s\n", mysqli_error($con));
    	exit();}
	while ($row = mysqli_fetch_array($customerData))
		{
			echo "<tr>
    			<td style='padding-left:10px;'>".$row['name']."</td>
    			<td style='padding-left:10px;'>".$row['address']."</td>
    			<td style='padding-left:10px;'>".$row['customerid']."</td>
  			</tr>";
		}
	echo "</table>";
}

function show_storage(){
	include "database/connect.php";
	echo '<table>
  	<tr>
    	<th style="padding-left:10px;">Ingrediens</th>
    	<th style="padding-left:10px;">Mängd</th>
    	<!--<th style="padding-left:10px;">Senaste Leverans</th>-->
  	</tr>';
	$ingredientData = mysqli_query($con,"SELECT * FROM ingredients");
	if (!$ingredientData) {
    	printf("Error: %s\n", mysqli_error($con));
    	exit();}
	while ($row = mysqli_fetch_array($ingredientData))
		{
			echo "<tr>
	    			<td style='padding-left:10px;'>".$row['ingredientname']."</td>
	    			<td style='padding-left:10px;'>".$row['storedquantity']."</td>	    			
	    			<!--<td style='padding-left:10px;'>".$row['lastdeliverydate']."</td>-->
  				</tr>";
		}		

	echo "</table>";
}

function show_recepie(){
	include "database/connect.php";
	$cookies = array();
	echo '<table>
  	<tr>
    	<th style="padding-left:10px;">Kaknamn</th>
    	<th style="padding-left:10px;">Ingrediens</th>
  	</tr>';
	$cookieData = mysqli_query($con,"SELECT cookiename, ingredientname FROM cookies");
	if (!$cookieData) {
    	printf("Error: %s\n", mysqli_error($con));
    	exit();}
	while ($row = mysqli_fetch_array($cookieData))
		{
			if (!in_array($row['cookiename'], $cookies)){echo "<tr><td style='padding-left:10px;'>------------</td>
			<td style='padding-left:10px;'>------------</td>";}
			echo "<tr><td style='padding-left:10px;'>";
			if (!in_array($row['cookiename'], $cookies)){
			echo $row['cookiename'];  				
  			}
  			echo "</td>";
  			echo "<td style='padding-left:10px;'>".$row['ingredientname']."</td></tr>";
  			$cookies[]=$row['cookiename'];
		}		

	echo "</table>";
}