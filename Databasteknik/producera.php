<?php session_start();
if (!isset($_SESSION['login_user'])){header("location: index.php");}
include_once "topmeny.php";
show_header('producera');?>

<div class="container">
      <div class="row">
        <div class="col-sm-4" style="padding-left:30px;">
         	<h2 class="mt-4">Producera Pall</h2>
         	<p>Varje pall kommer tilldelas ett randomiserat orderID under prototypfasen</p>
         	<form action="database/add_pallet.php" method="post">
			  <div class="form-group">
			    <label for="kaka">Vilken Kaka</label>
			    <select class="form-control" name="kaka" id="kaka">
			      <?php show_recepie();?>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="pall">Antal Pall</label>
			    <select class="form-control" name="pall" id="pall">
			      <option>1</option>
			      <option>2</option>
			      <option>3</option>
			      <option>4</option>
			      <option>5</option>
			    </select>
			  </div>
			 <button type="submit" class="btn btn-primary">Skapa Pall(ar)</button>
			</form>
        </div>
        <div class="col-sm-8" style="padding-left:30px;">
        	<h2 class="mt-4">Färdigproducerade</h2>
        		<?php show_produced();?>
        </div>
      </div>
</div>


<?php
function show_recepie(){
	include "database/connect.php";
	$cookies = array();
	$cookieData = mysqli_query($con,"SELECT cookiename FROM cookies");
	while ($row = mysqli_fetch_array($cookieData))
		{
			if (!in_array($row['cookiename'], $cookies)){
				echo '<option>';
				echo $row['cookiename'];
				echo '</option>';
			$cookies[]=$row['cookiename'];
  			}
		}
}

function show_produced(){
	include "database/connect.php";
	echo '<table>
  	<tr>
    	<th style="padding-left:10px;">Kaknamn</th>
    	<th style="padding-left:10px;">PallID</th>
    	<th style="padding-left:10px;">OrderID</th>
    	<th style="padding-left:10px;">Producerad</th>
    	<th style="padding-left:10px;">Blockerad</th>
  	</tr>';
	$palletData = mysqli_query($con,"SELECT * FROM pallets order by palletid DESC");
	if (!$palletData) {
    			printf("Error: %s\n", mysqli_error($con));
    			exit();}
	while ($row = mysqli_fetch_array($palletData))
		{
			echo "<tr>
	    			<td style='padding-left:10px;'>".$row['cookiename']."</td>
	    			<td style='padding-left:10px;'>".$row['palletid']."</td>	    			
	    			<td style='padding-left:10px;'>".$row['orderid']."</td>
	    			<td style='padding-left:10px;'>".$row['productiondate']."</td>
	    			<td style='padding-left:10px;'>".$row['blocked']."</td>
  				</tr>";
		}
}

?>