<!-- https://www.codingnepalweb.com/2020/04/responsive-menu-bar-in-html-css.html -->
<!-- https://www.goldencoreex.com/images/xz_bg.png -->
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
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="list.php">Companies</a></li>
      </ul>
    </nav>

    <h1>STOCKIFY</h1>
    <section class="mainSection">
      <div id="homeButtonsParentDiv">
        <form action="about.php">
          <input type="submit" class="homeButtons" id="homeAbout" value="About" />
        </form>
        <form action="list.php">
          <input type="submit" class="homeButtons" id="homeCompanies" value="Companies" />
        </form>
            <?php 
          
          if($_SESSION['loggedin-status'] == false){
                
              echo "<form action=login.php>
                    <input type=submit class=homeButtons id=homeLogin value=Login />
                    </form>";
                echo "<form action=registration.php>
                    <input type=submit class=homeButtons id=homeSignUp value=SignUp />
                    </form>";
              
          }
          
          
          if($_SESSION['loggedin-status'] == true){
              
              echo "<form action=portfolio.php>
                    <input type=submit class=homeButtons id=homePortfolio value=Portfolio />
                    </form>";
              echo "<form action=favorites.php>
                    <input type=submit class=homeButtons id=homeFavorites value=Favorites />
                    </form>";
              echo "<form action=profile.php>
                    <input type=submit class=homeButtons id=homeProfile value=Profile />
                    </form>";
              echo "<form action=index.php>
                    <input type=submit class=homeButtons id=homeLogout value=Logout name=logout />
                    </form>";
          }
          
          if (isset($_POST['logout'])){
            
              session_unset();
              
              session_destroy();
              
            }
          ?>
        
      </div>
    </section>
  </body>
</html>
