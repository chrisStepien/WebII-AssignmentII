<!-- http://clipart-library.com/clip-art/coming-soon-transparent-17.htm -->

<?php
// Initialize session
session_start();

// Require files
require_once 'config.php';
require_once 'db-classes.php';

// Connection to databases
$conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
$hdb = new HistoryDB($conn);
$pdb = new PortfolioDB($conn);
$phcdb = new PortfolioHistoryCompanyDB($conn);
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
      // Change website layout depending on session status
      if (isset($_SESSION['loggedin-status'])) {
        echo "<li><a href='index.php'>Home</a></li>
                  <li><a href='about.php'>About</a></li>
                  <li><a href='list.php'>Companies</a></li>
                  <li><a class='active' href='portfolio.php'>Portfolio</a></li>
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
                  <li><a href='list.php'>Companies</a></li>
                  <li><a href='login.php'>Login</a></li>";
      }
      // End the session and clears the session variables
      if (isset($_POST['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
      }

      ?>
    </ul>
  </nav>

  <h1>PORTFOLIO</h1>
  <section class="mainSection">
    <table id='stockDataTableHeader'>
      <?php
      // Markup for portfolio
      echo "<tr>";
      echo "<th></th>";
      echo "<th class='PortHeader' id='symbol'>Symbol</th>";
      echo "<th class='PortHeader' id='name'>Name</th>";
      echo "<th class='PortHeader' id='shares'>Number of Shares</th>";
      echo "<th class='PortHeader' id='close'>Close Value</th>";
      echo "<th class='PortHeader' id='value'>Value of Shares</th>";
      echo "<th class='PortHeader' id='total'>Total Portfolio Value</th>";
      echo "</tr>";

      // Fills portfolio with user specific information
      if (isset($_SESSION['user-id'])) {
        $uID = $_SESSION['user-id'];
        $port = $pdb->getAllForUser($uID);
        $portfolioValue = 0;

        $errorCheck = false;

        foreach ($phcdb->getAllForUser($uID) as $row) {
          if ($row['userId'] == $uID) {
            $highest = $hdb->getLatestForSymbol($row['symbol']);
            echo "<tr>";
            echo "<td><img src='./logos/" . $row['symbol'] . ".svg' width='37px' height='50px'></td>";
            echo "<td >" . $row['symbol'] . "</td>";
            echo "<td >" . $row['name'] . "</td>";
            echo "<td >" . $row['amount'] . "</td>";
            $x = number_format($highest[0]['close'], 2, '.', ',');
            echo "<td >" . $x . "</td>";
            $value = $row['amount'] * $highest[0]['close'];
            echo "<td >" . number_format($value) . "</td>";
            echo "<td ></td>";
            echo "<td ></td>";
            echo "</tr>";
            

            $portfolioValue += $value;
          }
          
        }
      }

      $pdo = null;
      echo  "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td>" . number_format($portfolioValue, 2, '.', ',') . "</td></tr>";
      echo "</table>";
      
      ?>
  </section>
</body>

</html>