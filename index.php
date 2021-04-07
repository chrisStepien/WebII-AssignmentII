<!-- https://www.codingnepalweb.com/2020/04/responsive-menu-bar-in-html-css.html -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mycss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo"><img id="stockifylogo" src="images/stockify.png" alt="stockify" width="50" height="50">Stockify</label>
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Companies</a></li>
      </ul>
    </nav>

    <div class="container-1">
      <div class="box box-1">
        <h3><a href="#">About</a></h3>
      </div>
      <div class="box box-2">
        <h3><a href="#">Companies</a></h3>
      </div>
    </div>

    <div class="container-2">
      <div class="box box-3">
        <h3><a href="#">Log In</a></h3>
      </div>
      <div class="box box-4">
        <h3><a href="#">Sign Up</a></h3>
      </div>
    </div>


  </body>
</html>
