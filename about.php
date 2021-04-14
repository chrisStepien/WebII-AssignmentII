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
        // Change website layout depending on session status
        if(isset($_SESSION['loggedin-status'])){
            echo "<li><a href='index.php'>Home</a></li>
                  <li><a class='active' href='about.php'>About</a></li>
                  <li><a href='list.php'>Companies</a></li>
                  <li><a href='portfolio.php'>Portfolio</a></li>
                  <li><a href='profile.php'>Profile</a></li>
                  <li><a href='favorites.php'>Favorites</a></li>
                  <li>
                  <form method='post'>
                  <button id='hamburgerLogout' type='hidden' name='logout' value='Logout'>Logout</button>
                  </form>
                  </li>";
        }else{
            echo "<li><a href='index.php'>Home</a></li>
                  <li><a class='active' href='about.php'>About</a></li>
                  <li><a href='list.php'>Companies</a></li>
                  <li><a href='login.php'>Login</a></li>";
        }
        // End the session and clears the session variables
        if (isset($_POST['logout'])){
            $_SESSION = array();
            session_destroy();
            header("Location: index.php");
        }

        ?>
      </ul>
    </nav>

    <h1>About</h1>
    <section class="mainSection">
    <div class='content'><span class='label'>Class name: </span>COMP 3512 - Web II</div>
    <div class='content'><span class='label'>University: </span>Mount Royal University</div>
    <div class='content'><span class='label'>Professor: </span>Randy Connolly</div>
    <div class='content'><span class='label'>Semester: </span>Winter 2021</div>
    </br>
    <div class='content'>
      <span class='label'>Technologies used: </span><br/><br/>
      <p>GitHub, Heroku, MySQL, MySQL WorkBench</p><br/>
      <div class ='links'>
      Links:<br/>
        <a class='link' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">CSS Styles</a><br/>
        <a class='link' href="https://loading.io/css/">CSS Loader</a><br/>
        <a class='link' href="https://www.codingnepalweb.com/2020/04/responsive-menu-bar-in-html-css.html">Navigation Bar Reference</a><br/>
        <a class='link' href="https://www.goldencoreex.com/images/xz_bg.png">Background Image</a><br/>
        <a class='link' href="https://www.itsolutionstuff.com/post/column-sorting-using-php-and-mysqlexample.html">Column Sort Reference</a><br/>
        <a class='link' href="http://clipart-library.com/clip-art/coming-soon-transparent-17.htm">"Coming Soon!" Image</a><br/>
        <a class='link' href="https://www.youtube.com/watch?v=Q_TplfrQlE0&ab_channel=doctorcode">Filter Search Reference</a><br/>
        
      </div>    
    </div>
    </br>
    <div class='content'>
      <span class='label'>Members: </span>
      <div>Jerik Ramos - <a class="gitrepo" href="https://github.com/jramo193">GitHub repo</a></div>
      <div>Chris Stepien - <a class="gitrepo" href="https://github.com/Cstep212">GitHub repo</a></div>
      <div>Yuan Zhou - <a class="gitrepo" href="https://github.com/yuantzhou">GitHub repo</a></div>
    </div>
  </section>
  </body>
</html>
