<?php

require_once 'config.php';
require_once 'db-classes.php';

$conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
$cdb = new CompanyDB($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mycss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo"><img id="stockifylogo" src="images/stockify.png" alt="stockify" width="50" height="50">Stockify</label>
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Companies</a></li>
      </ul>
    </nav>

    <h2>COMPANY</h2>
    <ul id="companyInfo">
      <?php
      foreach ($cdb->getAllForSymbol($_GET['symbol']) as $row) {
        echo "<li class='companyItem'>";
        echo "<img src='logos/" . $row['symbol'] . ".svg'>";
        echo "</br>";
        echo $row['symbol'];
        echo "</br>";
        echo $row['name'];
        echo "</br>";
        echo "Sector: " . $row['sector'];
        echo "</br>";
        echo "Subindustry: " . $row['subindustry'];
        echo "</br>";
        echo "Address: " . $row['address'];
        echo "</br>";
        echo "Exchange: " . $row['exchange'];
        echo "</br>";
        echo $row['website'];
        echo "</br>";
        echo "Description: " . $row['description'];
        echo "</li>";
      }

      ?>
    </ul>
  </body>
</html>
