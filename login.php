<?php
// Initialize session
session_start();


require_once "config.php";
require_once "db-classes.php";  

   
  $conn = DatabaseHelper::createConnection(array(DBCONNSTRING,
  DBUSER, DBPASS));
  $gateway = new UserDB($conn);



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
                  <li><a href='favorites.php'>Favourites</a></li>
                  <li>
                  <form method='post'>
                  <button id='hamburgerLogout' type='hidden' name='logout' value='Logout'>Logout</button>
                  </form>
                  </li>";
        }else{
            echo "<li><a href='index.php'>Home</a></li>
                  <li><a href='about.php'>About</a></li>
                  <li><a href='list.php'>Companies</a></li>
                  <li><a class='active' href='login.php'>Login</a></li>";
        }

        if (isset($_POST['logout'])){
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
        <!-- <label id="labelEmail">Email: </label> -->
        <input type="text" class="loginInfo" name="email" id="loginEmail" placeholder="Email address">
      </div>
      <div>
        <!-- <label id="labelPassword">Password: </label> -->
        <input type="password" class="loginInfo" name="password" id="loginPassword" placeholder="Password">
      </div>
      <div>
      <button type="submit" id="login" value="submit" name="login">Login</button><br/><br/>
      No account? <a href='registration.php' id='linkSignUp'>Click here to sign up</a><br/>
      </div>
      </form>
        </div>
    </section>

  </body>
</html>
 <?php



        if (isset($_POST['login'])){

            $email = $_POST['email'];
            $pass = $_POST['password'];

            try {
                $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "select * from users";
                $result = $pdo->query($sql);
                // loop through the data
        while ($row = $result->fetch()) {


        if($row['email'] == $email){

            if(password_verify($pass, $row['password'])){

               $_SESSION['loggedin-status'] = true;
               $_SESSION['user-id'] = $row['id'];
                header('Location: index.php');
            }
                
                
        }
            if(!next($row) && $_SESSION['loggedin-status'] != true){
                
                
                echo "ERROR";
                
                
            }


        }
                $pdo = null;
                }
        
                
                }
                catch (PDOException $e) {
                    die( $e->getMessage() );
                }

                

    ?>

