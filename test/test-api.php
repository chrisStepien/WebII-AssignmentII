<?php
  require_once 'testconfig.inc.php';
  require_once 'test.inc.php';
  // Tell the browser to expect JSON rather than HTML
  header('Content-type: application/json');
  // indicate whether other domains can use this API
  header("Access-Control-Allow-Origin: *");
  try {
    $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
    $gateway = new CompanyDB($conn);
    if ( isCorrectQueryStringInfo("symbol") )
      $paintings = $gateway->getAllForSymbol($_GET["symbol"]);
    else
      $paintings = $gateway->getAll();
    echo json_encode( $paintings, JSON_NUMERIC_CHECK+JSON_PRETTY_PRINT );
  }
  catch (Exception $e) {
    die( $e->getMessage() );
  }

  function isCorrectQueryStringInfo($param) {
    if ( isset($_GET[$param]) && !empty($_GET[$param]) ) {
      return true;
    }
    else {
      return false;
    }
  }
?>
