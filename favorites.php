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
                  <li><a href='list.php'>Companies</a></li>
                  <li><a href='portfolio.php'>Portfolio</a></li>
                  <li><a href='profile.php'>Profile</a></li>
                  <li><a class='active' href='favorites.php'>Favourites</a></li>
                  <li>
                  <form method='post'>
                  <button id='hamburgerLogout' type='hidden' name='logout' value='Logout'>Logout</button>
                  </form>
                  </li>";
        }else{
            echo "<li><a href='index.php'>Home</a></li>
                  <li><a href='about.php'>About</a></li>
                  <li><a href='list.php'>Companies</a></li>
                  <li><a href='login.php'>Login</a></li>";
        }

        if (isset($_POST['logout'])){
            $_SESSION = array();
            session_destroy();
            header("Location: index.php");
        }

        ?>
      </ul>
    </nav>

    <h1>FAVOURITES</h1>
    <section class="mainSection">

      <?php
     if(isset($_GET['fav'])){
        $sybo = isset($_SESSION['sy']) ? $_SESSION['sy'] : array();
        $sybo[] = $_GET['fav'];
        $_SESSION['sy'] = $sybo;
        $symbo=array_unique($_SESSION['sy']);
      }

      if (sizeof($_SESSION['sy'])>0){$sybo = isset($_SESSION['sy']) ? $_SESSION['sy'] : array();

        $_SESSION['sy'] = $sybo;
        $symbo=array_unique($_SESSION['sy']);
        foreach($symbo as $i=>$s){
          foreach ($cdb->getAllForSymbol($s) as $row){
          $index=0;
          echo "<li class='companyListItem'>";
          echo "<div><img src='./logos/" . $row['symbol'] . ".svg' id='favouritesCompanyLogo'></div>";
          echo "<div id='favouritesCompanySymbol'><a href='single-company.php?symbol=" . $row['symbol'] . "'>" . $row['symbol'] . "</a></div>";
          echo "<div id='favouritesCompanyName'><a href='single-company.php?symbol=" . $row['symbol'] . "'>" . $row['name'] . "</a></div>";
          echo "</br>";
          echo "<form action='favorites.php'>
                <button class='removeButton' name='re' value='" . $row['symbol'] . "' type='submit'>Remove</button>
                </form>";
          echo "</li>";
          echo "</br>";
          }
          }

          echo "<form action='favorites.php'>
                <input id='removeAllButton' type='submit' name='submit' value='Remove All'>
                </form>";

          if(isset($_GET['re'])){
            foreach($_SESSION['sy'] as $i=>$s){
            if ($_GET['re'] == $s){
              unset($_SESSION['sy'][$i]);
          }
        }
          print_r($symbo);
          header('Location: favorites.php');
        }

        }
        else{
          echo "No Favourites yet!";
        }

      if(isset($_GET['submit']))
      {
        $_SESSION['sy'] =[];
        header('Location: favorites.php');
      }

      ?>

    </section>

  </body>
</html>
