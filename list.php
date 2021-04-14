<!-- https://github.com/malaman/js-image-zoom -->

<?php

session_start();
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

        if (isset($_POST['logout'])){
            $_SESSION = array();
            session_destroy();
            header("Location: index.php");
        }

        ?>
      </ul>
    </nav>

    <h1>COMPANIES</h1>
    <section class="mainSection">
      <label>Filter:</label>
      <input type="text" id="filterCompany" placeholder="Filter out companies...">
      <button type="button" id="clear" class="filterButton">Clear</button><br/>
      <ul id="listOfCompanies"></ul>
      <div id="zoomed"><img id='zoomedImage'></div>
    </section>


    <script src="./js/list.js"></script>
  </body>
</html>
