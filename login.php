<?php
// Initialize session
session_start();

// Required files
require_once "config.php";
require_once "db-classes.php";

//Connection to database
$conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
$gateway = new UserDB($conn);

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
                  <li><a class='active' href='login.php'>Login</a></li>";
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

  <h1>LOG IN</h1>
  <section class="mainSection">
    <div id="loginParentDiv">
      <form method="POST" action="">
        <div>
          <input type="text" class="loginInfo" name="email" id="loginEmail" placeholder="Email address">
        </div>
        <div>
          <input type="password" class="loginInfo" name="password" id="loginPassword" placeholder="Password">
        </div>
        <div>
          <button type="submit" id="login" value="submit" name="login">Login</button><br /><br />

          <?php
          // Error message for incorrect login credentials 
          if ($errorCheck == false && isset($_POST['login'])) {
            echo "<div id=errMessage>The Email and/or Password you provided is incorrect. Please try again.</div><br/>";
          }
          ?>
          No account? <a href='registration.php' id='linkSignUp'>Click here to sign up</a><br />
        </div>
      </form>
    </div>
  </section>

</body>

</html>
<?php


// Login check
if (isset($_POST['login'])) {

  $email = $_POST['email'];
  $pass = $_POST['password'];
  $errorCheck = false;
// Try catch for error handling  
  try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from users";
    $result = $pdo->query($sql);
    // Loop through the data
    while ($row = $result->fetch()) {
      // Check if email equals an email in the database
      if ($row['email'] == $email) {
        // Check if password for the specific email is correct, then logs the user in if is correct
        if (password_verify($pass, $row['password'])) {
          $errorCheck = true;
          $_SESSION['loggedin-status'] = true;
          $_SESSION['user-id'] = $row['id'];
          header('Location: index.php');
        }
      }
    }
    $pdo = null;
  } catch (PDOException $e) {
    die($e->getMessage());
  }
}

?>