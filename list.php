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

    <h2>COMPANIES</h2>

    <label>Filter:</label>
    <input type="text" id="filterCompany" placeholder="Filter out companies...">
    <button type="button" id="clear" class="filterButton">Clear</button><br/>
    <ul id="listOfCompanies"></ul>



    <script src="js/myjs.js"></script>
  </body>
</html>
