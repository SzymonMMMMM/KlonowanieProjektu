<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link type="text/css" rel="stylesheet" href="stylowosc.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
</head>
<body style="background-color: #F5F5F5;">

<div class="container" >

		<div class="sheet" style="background-color: white; box-shadow: 2px 2px 4px #555555;">
		
		<form method="post" action="login.php";
>
  <?php include('errors.php'); ?>
			<p> Login: </p>

			 <input type="text" name="username" >
			<p> Hasło: </p> 

			<input type="password" name="password">
			
			<button type="submit" class="btn" name="login_user"> Zaloguj </button>
			
		</form>
		
		</div>
	</div>
	
	<?php $row = mysql_fetch_array($login_record);
$_SESSION["userid"] = trim($row["id"]); ?>
  	<p style="text-align: center;">
  		<a >Nie masz jeszcze konta? <a href="register.php">Zarejestruj sie!</a>
  	</p>
  </form>
</body>
</html>