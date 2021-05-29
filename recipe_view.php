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

?>
<!DoCTYPE html>
<html lang="en">
<head>
    <style>
        table {class="center"}
        .center {
        margin-left: auto;
        margin-right: auto;
      }
    </style>
<title>Recipe View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<div class="jumbotron">
    <img
    class="background"
    src="https://us.123rf.com/450wm/romastudio/romastudio1411/romastudio141100013/33709969-healthy-food-background-studio-photo-of-different-fruits-and-vegetables-on-wooden-table.jpg?ver=6"
  >
  <div class="container text-center header">
    <h3>My Recipes</h3>
  </div>
</div>
<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
$user = $_SESSION['username'];
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql3 = mysqli_query($con, "SELECT * FROM Recipe NATURAL JOIN Recipe_Ingredients NATURAL JOIN (SELECT name FROM (SELECT id FROM Users WHERE username='$user') T NATURAL JOIN makes) T2");

echo "<table class='table justify-content-center'>";
echo "<tr><td><b style='color:#000080;'>NAME</b ></td><td><b style='color:#000080;'>CUISINE</b></td><td><b style='color:#000080;'>INGREDIENTS</b></td></tr>";
       
//echo "<table border=1><th>NAME</th><th>CUISINE</th><th>INGREDIENTS</th>\n";
while($z = mysqli_fetch_array($sql3)){
  echo "<tr><td>$z[0]</td><td>$z[1]</td><td>$z[2]</td></tr>";
}

echo "</table>";

mysqli_close($con);

?>
</table>
</div>

<div class='table-holder2'><table class="center">
<div class="jumbotron">
    <img
    class="background"
    src="https://us.123rf.com/450wm/romastudio/romastudio1411/romastudio141100013/33709969-healthy-food-background-studio-photo-of-different-fruits-and-vegetables-on-wooden-table.jpg?ver=6"
  >
  <div class="container text-center header">
    <h3>All Recipes</h>
  </div>
</div>
<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql2 = mysqli_query($con, "SELECT * FROM Recipe NATURAL JOIN Recipe_Ingredients");

echo "<table class='table justify-content-center'>";
echo "<tr><td><b style='color:#000080;'>NAME</b ></td><td><b style='color:#000080;'>CUISINE</b></td><td><b style='color:#000080;'>INGREDIENTS</b></td></tr>";
       
//echo "<table border=1><th>NAME</th><th>CUISINE</th><th>INGREDIENTS</th>\n";

while($recipe = mysqli_fetch_array($sql2)){
  echo "<tr><td>$recipe[0]</td><td>$recipe[1]</td><td>$recipe[2]</td></tr>";
}

echo "</table>";

mysqli_close($con);
?>
</table></div>
</html>

