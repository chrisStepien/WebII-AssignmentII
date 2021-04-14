<?php

session_start();

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
  <link rel="stylesheet" href="./css/mycss.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <a class="active" href="index.php"><label class="logo"><img id="stockifylogo" src="images/stockify.png" alt="stockify" width="50" height="50"></label></a>
    <ul>
      <?php

      if (isset($_SESSION['loggedin-status'])) {
        echo "<li><a href='index.php'>Home</a></li>
                  <li><a href='about.php'>About</a></li>
                  <li><a class='active' href='list.php'>Companies</a></li>
                  <li><a href='portfolio.php'>Portfolio</a></li>
                  <li><a href='profile.php'>Profile</a></li>
                  <li><a href='favorites.php'>Favourites</a></li>
                  <li>
                  <form method='post'>
                  <button id='hamburgerLogout' type='hidden' name='logout' value='Logout'>Logout</button>
                  </form>
                  </li>";
      } else {
        echo "<li><a href='index.php'>Home</a></li>
                  <li><a href='about.php'>About</a></li>
                  <li><a class='active' href='list.php'>Companies</a></li>
                  <li><a href='login.php'>Login</a></li>";
      }

      if (isset($_POST['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
      }

      ?>
    </ul>
  </nav>

  <h1>COMPANY</h1>
  <section class="mainSection">
    <ul id="companyInfo">
      <?php
      foreach ($cdb->getAllForSymbol($_GET['symbol']) as $row) {
        echo "<li class='companyListItem'>";
        echo "<div><img src='./logos/" . $row['symbol'] . ".svg' id='companyLogo'></div>";
        echo "<div id='companySymbol'>" . $row['symbol'] . "</div>";
        echo "<div id='companyName'>" . $row['name'] . "</div>";
        echo "<div class='content'><a id='companyWebsite' href='" . $row['website'] . "'>" . $row['website'] . "</a></div>";
        echo "</br>";
        echo "<div class='content'><span class='label'>Sector: </span>" . $row['sector'] . "</div>";
        echo "<div class='content'><span class='label'>Subindustry: </span>" . $row['subindustry'] . "</div>";
        echo "<div class='content'><span class='label'>Address: </span>" . $row['address'] . "</div>";
        echo "<div class='content'><span class='label'>Exchange: </span>" . $row['exchange'] . "</div>";
        echo "</br>";
        echo "<div class='content'><span class='label'>Description: </span>" . $row['description'] . "</div>";
        echo "</li>";
        echo "</br>";
        echo "<form method='get' action='favorites.php'>
                <button type='submit' id='addToFavouritesButton' name='fav' value='" . $row['symbol'] . "'>Add to Favourites</button>
                  </form>";
        echo "<button type='button' id='stockHistoryButton' onclick=";
        echo "\"location.href='history.php?symbol=" . $row['symbol'] . "';\">Stock History</button>";
      }


      ?>
    </ul>

  </section>
</body>

</html>