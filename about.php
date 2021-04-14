<!-- https://www.codingnepalweb.com/2020/04/responsive-menu-bar-in-html-css.html -->
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
                  <li><a class='active' href='about.php'>About</a></li>
                  <li><a href='list.php'>Companies</a></li>
                  <li><a href='portfolio.php'>Portfolio</a></li>
                  <li><a href='profile.php'>Profile</a></li>
                  <li><a href='favorites.php'>Favourites</a></li>
                  <li><a href=#>Logout</a></li>";
        }else{
            echo "<li><a href='index.php'>Home</a></li>
                  <li><a class='active' href='about.php'>About</a></li>
                  <li><a href='list.php'>Companies</a></li>
                  <li><a href='login.php'>Login</a></li>";
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
      <span class='label'>Technologies used: </span>

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
