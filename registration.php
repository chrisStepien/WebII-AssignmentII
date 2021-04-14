<!-- http://clipart-library.com/clip-art/coming-soon-transparent-17.htm -->

<?php
// Initialize session
session_start();
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
                  <li><a href='portfolio.php'>Portfolio</a></li>
                  <li><a href='profile.php'>Profile</a></li>
                  <li><a href='favorites.php'>Favorites</a></li>
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

  <h1>SIGN UP</h1>
  <section class="mainSection">
    <img id="comingsoon" src="./images/comingsoon.png" alt="comingsoon">
  </section>
</body>

</html>