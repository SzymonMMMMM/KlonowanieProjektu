<?php

include 'autoryzacja.php';
 
class Stars {

  private $pdo;
  private $stmt;
  public $error;
  function __construct () {
    try {
      $this->pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_USER, DB_PASSWORD, [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
        ]
      );
    } catch (Exception $ex) { exit($ex->getMessage()); }
  }


  function __destruct () {
    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  function save ($pid, $uid, $stars) {
    try {
      $this->stmt = $this->pdo->prepare(
        "REPLACE INTO `star_rating` (`product_id`, `user_id`, `rating`) VALUES (?,?,?)"
      );
      $this->stmt->execute([$pid, $uid, $stars]);
      return true;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }
  }

  function get ($uid) {
    $this->stmt = $this->pdo->prepare(
      "SELECT * FROM `star_rating` WHERE `user_id`=?"
    );
    $this->stmt->execute([$uid]);
    $ratings = [];
    while ($row = $this->stmt->fetch()) {
      $ratings[$row['product_id']] = $row['rating'];
    }
    return $ratings;
  }

  function avg () {
    $this->stmt = $this->pdo->prepare(
      "SELECT `product_id`, ROUND(AVG(`rating`), 2) `avg`, COUNT(`user_id`) `num`
      FROM `star_rating`
      GROUP BY `product_id`"
    );
    $this->stmt->execute();
    $average = [];
    while ($row = $this->stmt->fetch()) {
      $average[$row["product_id"]] = [
        "avg" => $row["avg"],
        "num" => $row["num"] 
      ];
    }
    return $average;
  }
}

define("DB_HOST", $dbhost);
define("DB_NAME", $dbname);
define("DB_CHARSET", "utf8");
define("DB_USER", $dbuser);
define("DB_PASSWORD", $dbpass);

$_STARS = new Stars();
$_SESSION['user_id'] = $userid;