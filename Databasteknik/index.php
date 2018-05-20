<?php
include('loggOn.php'); // Includes Login Script

//Kollar session variable om där finns en aktiv användare inloggad
if(isset($_SESSION['login_user'])){
	header("location: main.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Produktionsplanering</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/login.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="column_middle">
<div class="column_right_grid sign-in">
				 	<div class="sign_in">
				       <h3>Logga in på Krusty</h3>
					    <form action="" method="post">
					    	<span>
					 	    <i><img src="images/mail.png" alt=""></i><input type="text" name="username" value="Användarnamn" onfocus="if (this.value == 'Användarnamn'){this.value='';}" onblur="if (this.value == '') {this.value = 'Användarnamn';}">
					 	    </span>
					 	    <span>
					 	     <i><img src="images/lock.png" alt=""></i>
					 	     <input type="password" name="password" placeholder="password">
					 	    </span>
					 		<input style="width:40%" name="submit" type="submit" class="my-button" value="Logga in">
					 	</form>				   
          		       </div>
				   </div></div>
</body>
</html>