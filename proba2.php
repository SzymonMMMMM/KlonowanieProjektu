<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Musisz sie najpierw zalogowac!";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>VINYL BUSTERS</title>
<script src="3b-products.js"></script>
<link rel="stylesheet" href="3podukty.css"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
#logowanieudane{
  background-color: #F5F5F5;
  border-color: white;
  padding: 1em, 0.5em;
  border-radius: 4px;
  width: 250px;
  text-align: center;
  border-style: solid;
  border-width: 1px;
}

#logowanieudane2{
   margin: 0px;
}
}
</style>
</head>
<body>

<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16"> 


  <div id="logowanieudane">

  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" id="logowanieudane2">
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

 
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Witam <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">wyloguj</a> </p>
    <?php endif ?>
</div>  </div>
    <div class="w3-center w3-padding-16">VINYL BUSTERS</div>
  </div>
</div>








<div id="proba">
  <?php

    require "zrodlo.php";
    $uid = getmyuid();
    echo $uid; 
    if (isset($_POST["pid"]) && isset($_POST["stars"])) {
      if ($_STARS->save($_POST["pid"], $uid, $_POST["stars"])) {
        echo "<div class='note'>Rating Updated</div>";
      } else { echo "<div class='note'>$_STARS->error</div>"; }
    }

    $average = $_STARS->avg();
    $ratings = $_STARS->get($uid);
 
    $artysci = [
      "1" => ["name" => "Endless", "artysta" => 'Frank Ocean', "zdjecie" => '<img src="endless.jpg" style="width:500px;height:500px;">'],
      "2" => ["name" => "Wish You Were Here", "artysta" => 'Pink Floyd', "zdjecie" => '<img src="wish_you_were_here.jpg" style="width:500px;height:500px;">'],
      "3" => ["name" => "Bad Brains", "artysta" => 'Bad Brains', "zdjecie" => '<img src="bad_brains.jpg" style="width:500px;height:500px;">'],
      "4" => ["name" => "Plastic Anniversary", "artysta" => 'Matmos', "zdjecie" => '<img src="matmos_plastic.jpg" style="width:500px;height:500px;">'],
    ];
    foreach ($artysci as $pid=>$pdt) { ?>



<div class="pRow" class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
  




      <div class="pName"><?=$pdt["name"]?></div>
      <div class="partysta"><?=$pdt["artysta"]?></div>
      <div class="pZdjecie"><?=$pdt["zdjecie"]?></div>
      <div class="pStar" data-pid="<?=$pid?>"><?php
        $rate = isset($ratings[$pid]) ? $ratings[$pid] : 0 ;
        for ($i=1; $i<=5; $i++) {
          $css = $i<=$rate ? "star" : "star blank" ;
          echo "<div class='$css' data-i='$i'></div>";
        }
      ?></div>
      <div class="pStat">
        <?=$average[$pid]["avg"]?> out of 5 stars.
      </div>
      <div class="pStat">
        <?=$average[$pid]["num"]?> customer ratings.
      </div>
    </div>
    <?php }
    ?></div>

    <!-- (E) HIDDEN FORM TO UPDATE STAR RATING -->
    <form id="ninForm" method="post" target="_self">
      <input id="ninPdt" type="hidden" name="pid"/>
      <input id="ninStar" type="hidden" name="stars"/>
    </form>













<!-- End page content -->
</div>
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>STOPA</h3>


      <div>
        <?php
	include 'autoryzacja.php';
	
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('Bład połączenia z serwerem: '.mysqli_connect_error());
echo 'WSZYSTKIE ALBUMY STRONY'.'<br>';

$sql = "SELECT product_id , nazwa_albumu, artysta FROM albumy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["product_id"]. " - Name: " . $row["nazwa_albumu"]. " " . $row["artysta"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
      </div>
      <div>
      <p>Zrobione przez: <a href="https://c.tenor.com/e-LsbnNHQ5cAAAAd/catjam-cat-dancing.gif" target="_blank">Szmirson Productions</a></p>
    </div>
  
    <div class="w3-third">
      <h3>POSTY BLOGOOWE</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <span class="w3-large">Ipsum</span><br>
          <span>Praes tinci sed</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third w3-serif">
      <h3>POPULARNE TAGI</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
      </p>
    </div>
  </footer>
<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>
