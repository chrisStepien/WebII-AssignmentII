<?php
// Initialize session
session_start();



if ( !isset($_POST['submit'])){
  $email = $_POST['email'];
  $pass = $_POST['password'];

  require_once "config.php";
  require_once "db-classes.php";

  echo $email;
}



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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="list.php">Companies</a></li>
      </ul>
    </nav>

    <h1>LOG IN</h1>
    <section class="mainSection">
      <div id="loginParentDiv">
      <form method="POST" action="#">
      <div>
        <!-- <label id="labelEmail">Email: </label> -->
        <input type="text" class="loginInfo" name="email" id="loginEmail" placeholder="Email address">
      </div>
      <div>
        <!-- <label id="labelPassword">Password: </label> -->
        <input type="password" class="loginInfo" name="password" id="loginPassword" placeholder="Password">
      </div>
      <div>
      <button type="submit" id="login" value="Submit">Login</button><br/><br/>
      No account? <a href='registration.php' id='linkSignUp'>Click here to sign up</a><br/>
      </div>
      </form>
        </div>
    </section>

  </body>
</html>
