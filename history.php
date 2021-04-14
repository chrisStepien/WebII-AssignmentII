<!-- https://www.itsolutionstuff.com/post/column-sorting-using-php-and-mysqlexample.html -->

<?php

require_once 'config.php';
require_once 'db-classes.php';
require_once 'helper.php';

$conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
$hdb = new HistoryDB($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mycss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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

        if(isset($_SESSION['loggedin-status'])){
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
        }else{
            echo "<li><a href='index.php'>Home</a></li>
                  <li><a href='about.php'>About</a></li>
                  <li><a class='active' href='list.php'>Companies</a></li>
                  <li><a href='login.php'>Login</a></li>";
        }

        ?>
      </ul>
    </nav>

    <h1>MONTHLY DATA</h1>
    <section class="mainSection">
        <table id='stockDataTableHeader'>

        <?php
        $orderBy = !empty($_GET["sort"]) ? $_GET["sort"] : "date";
        $order = !empty($_GET["order"]) ? $_GET["order"] : "desc";

        $dateOrder = "asc";
        $openOrder = "asc";
        $closeOrder = "asc";
        $lowOrder = "asc";
        $highOrder = "asc";
        $volumeOrder = "asc";

        if($orderBy == "date" && $order == "asc") {
          $dateOrder = "desc";
        }
        if($orderBy == "open" && $order == "asc") {
          $openOrder = "desc";
        }
        if($orderBy == "close" && $order == "asc") {
          $closeOrder = "desc";
        }
        if($orderBy == "low" && $order == "asc") {
          $lowOrder = "desc";
        }
        if($orderBy == "high" && $order == "asc") {
          $highOrder = "desc";
        }
        if($orderBy == "volume" && $order == "asc") {
          $volumeOrder = "desc";
        }

        echo "<tr>";
        echo "<th class='stockHeader' id='date'><a href='history.php?symbol=" . $_GET['symbol'] . "&sort=date&order=" . $dateOrder . "'>Date</a></th>";
        echo "<th class='stockHeader' id='open'><a href='history.php?symbol=" . $_GET['symbol'] . "&sort=open&order=" . $openOrder . "'>Open</a></th>";
        echo "<th class='stockHeader' id='close'><a href='history.php?symbol=" . $_GET['symbol'] . "&sort=close&order=" . $closeOrder . "'>Close</a></th>";
        echo "<th class='stockHeader' id='low'><a href='history.php?symbol=" . $_GET['symbol'] . "&sort=low&order=" . $lowOrder . "'>Low</a></th>";
        echo "<th class='stockHeader' id='high'><a href='history.php?symbol=" . $_GET['symbol'] . "&sort=high&order=" . $highOrder . "'>High</a></th>";
        echo "<th class='stockHeader' id='volume'><a href='history.php?symbol=" . $_GET['symbol'] . "&sort=volume&order=" . $volumeOrder . "'>Volume</a></th>";
        echo "</tr>";
        echo "</table>";
        echo "<div id='stockDataDiv'>";
        echo "<table id='stockDataTableRow'>";

        if(isset($_GET['sort'])) {
          if ($_GET['sort'] == 'date') {
            foreach ($hdb->getAllForSymbolSort($_GET['symbol'], $orderBy, $order) as $row) {
              outputTableRow($row);
            }
          }
          elseif ($_GET['sort'] == 'open') {
            foreach ($hdb->getAllForSymbolSort($_GET['symbol'], $orderBy, $order) as $row) {
              outputTableRow($row);
            }
          }
          elseif ($_GET['sort'] == 'close') {
            foreach ($hdb->getAllForSymbolSort($_GET['symbol'], $orderBy, $order) as $row) {
              outputTableRow($row);
            }
          }
          elseif ($_GET['sort'] == 'low') {
            foreach ($hdb->getAllForSymbolSort($_GET['symbol'], $orderBy, $order) as $row) {
              outputTableRow($row);
            }
          }
          elseif ($_GET['sort'] == 'high') {
            foreach ($hdb->getAllForSymbolSort($_GET['symbol'], $orderBy, $order) as $row) {
              outputTableRow($row);
            }
          }
          elseif ($_GET['sort'] == 'volume') {
            foreach ($hdb->getAllForSymbolSort($_GET['symbol'], $orderBy, $order) as $row) {
              outputTableRow($row);
            }
          }
        }

        else {
          foreach ($hdb->getAllForSymbolSort($_GET['symbol'], $orderBy, $order) as $row) {
            outputTableRow($row);
          }
        }

      ?>

        </table>
    </div>
  </section>

  </body>
</html>
