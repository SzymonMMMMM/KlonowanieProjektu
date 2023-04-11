<?php

        include('server.php')
   ?>


<!DOCTYPE html>
<html>
<head>	
  <title>Registration system PHP and MySQL</title>
  <link type="text/css" rel="stylesheet" href="stylowosc.css">
</head>
<body>
<div class="container"  style="background-color: white;">
		<div class="sheet" style="background-color: #F5F5F5;box-shadow: 2px 2px 4px #555555; color:#343434;font-family:Karma;">
		

  <form method="post" action="register.php">
  <?php include('errors.php'); ?>
		<p style="background-color: #555555;"> Podaj nazwę użytkowniku: </p>

        <input name="username" value="<?php echo $email; ?>"> <br>

        <p style="background-color: #555555;"> Podaj email: </p> 

        <input type="email" name="email" value="<?php echo $email; ?>"> <br>

		<p style="background-color: #555555;"> Podaj hasło: </p>
        <label>haslo</label>
        <input type="password" name="password_1"> <br>

        <label>potwierdz haslo</label>
        <input type="password" name="password_2"> <br>
        <input type="submit" class="duzyprzycisk" name="reg_user" value="ZAREJESTRUJ SIĘ"> <br>
	</form>

        <a>
  		Masz juz konto? <a href="login.php">Zaloguj sie!</a>
</a>
		</div>
		</div>




</body>
</html>