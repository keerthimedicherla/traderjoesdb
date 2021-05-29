<!DOCTYPE html>
<html>
<head>
  <title>Great Deals</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="jumbotron">
    <img
    class="background"
    src="https://us.123rf.com/450wm/romastudio/romastudio1411/romastudio141100013/33709969-healthy-food-background-studio-photo-of-different-fruits-and-vegetables-on-wooden-table.jpg?ver=6"
  >
  <div class="container text-center header">
    <h1>Great Deals</h1>
  </div>
</div>
</html>
<?php
include_once("./server.php");
 
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
   }
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

if ($_SESSION['role'] == 'customer') {
    $SERVER = 'server';
    $USERNAME = 'username';
    $PASSWORD = 'password';
    $DATABASE = 'database';

    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
}
else if ($_SESSION['role'] == 'employee') {
    $SERVER = 'server';
    $USERNAME = 'username';
    $PASSWORD = 'password';
    $DATABASE = 'database';
  $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
}

else if ($_SESSION['role'] == 'supplier') {
    $SERVER = 'server';
    $USERNAME = 'username';
    $PASSWORD = 'password';
    $DATABASE = 'database';

    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
}

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = mysqli_query($con, "SELECT * FROM CheapestPrice");

echo "<table class='table justify-content-center'>";
echo "<tr><td><b style='color:#000080;'>BARCODE</b ></td><td><b style='color:#000080;'>NAME</b></td><td><b style='color:#000080;'>PRICE</b></td><td><b style='color:#000080;'>WEIGHT</b></td></tr>";
//echo "<table class='table' style='font-size:1vw'><th>BARCODE</th><th>NAME</th><th>PRICE</th><th>WEIGHT</th>\n";
while($item = mysqli_fetch_array($sql)){
  echo "<tr><td>$item[0]</td><td>$item[1]</td><td>$item[2]</td><td>$item[3]</td></tr>";
}
echo "</table>";

mysqli_close($con);
?>

