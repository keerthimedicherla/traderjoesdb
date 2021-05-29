
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
        h4 {text-align:center;
        font-size:30px;}
</style>
</head>

<div class="jumbotron">
    <img
    class="background"
    src="https://us.123rf.com/450wm/romastudio/romastudio1411/romastudio141100013/33709969-healthy-food-background-studio-photo-of-different-fruits-and-vegetables-on-wooden-table.jpg?ver=6"
  >
<table class='center'>


<h4>My Supplied Stores </h4>
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
$user = $_SESSION['username'];

$user_query = mysqli_query($con, "SELECT * FROM Users");
$id = 0;
while($u = mysqli_fetch_array($user_query)){
    if ($u[1] == $user){
      $id = $u[0];
    }
}

$sql3 = mysqli_query($con, "SELECT * 
FROM Store 
WHERE store_id IN (SELECT store_id FROM Users NATURAL JOIN supplies NATURAL JOIN Store
WHERE id = $id)");
//$sql3 = mysqli_query($con, "SELECT * FROM Store NATURAL JOIN (SELECT store_id FROM (SELECT id FROM Users WHERE username='$user') T NATURAL JOIN supplies) T2");
echo "<table class='table justify-content-center'>";
echo "<tr><td><b style='color:#000080;'>STORE ID</b ></td><td><b style='color:#000080;'>STREET ADDRESS</b></td><td><b style='color:#000080;'>CITY</b></td><td><b style='color:#000080;'>ZIP</b></td></tr>";

//echo "<table border=1><th>STORE ID</th><th>STREET ADDRESS</th><th>CITY</th><th>ZIP</th>\n";
while($z = mysqli_fetch_array($sql3)){
  echo "<tr><td>$z[0]</td><td>$z[1]</td><td>$z[2]</td><td>$z[3]</td></tr>";
}

echo "</table>";
mysqli_close($con);

?>
</table>
</div>

<table class='center'>
<h4>All Suppliers</h4>
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
 $con1 = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    }

    else if ($_SESSION['role'] == 'employee') {
      $SERVER = 'server';
      $USERNAME = 'username';
      $PASSWORD = 'password';
      $DATABASE = 'database';

        $con1 = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    }

    else if ($_SESSION['role'] == 'supplier') {
      $SERVER = 'server';
      $USERNAME = 'username';
      $PASSWORD = 'password';
      $DATABASE = 'database';


       $con1 = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

}
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql2 = mysqli_query($con1, "SELECT * FROM Supplier");

//echo "<table border=1><th>SUPPLIER ID</th><th>COUNTRY</th>\n";
echo "<table class='table justify-content-center'>";
echo "<tr><td><b style='color:#000080;'>SUPPLIER ID</b ></td><td><b style='color:#000080;'>COUNTRY</b></td></tr>";

while($supplier = mysqli_fetch_array($sql2)){
  echo "<tr><td>$supplier[0]</td><td>$supplier[1]</td></tr>";
}

echo "</table>";

mysqli_close($con1);
?>
</table></div>
</html>

