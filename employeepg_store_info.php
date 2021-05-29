
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .background {
        opacity: 0.2;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: auto;
    }

    .header {
        position: relative;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
    <img
    class="background"
    src="https://us.123rf.com/450wm/romastudio/romastudio1411/romastudio141100013/33709969-healthy-food-background-studio-photo-of-different-fruits-and-vegetables-on-wooden-table.jpg?ver=6"
  >
</div>


<div class="container text-center">
  <h3>Store Information</h3>
  <div class="row">

<div class="col-sm-4">
    <div class="well">
        <div align="left">
        <h4>Add Store</h4>
        </div>
<div align="left";>
<form action="store_insert.php" method="post">
Store ID:  <input type="text" name="store_id"><BR><br>
Street Address:  <input type="text" name="street_address"><BR><br>
City: <input type="text" name="city"><br><br>
Zip: <input type="text" name="zip"><br><br>
Store Supplier: <input type="text" name="id"><br><br>
<input type="Submit">
</form>
</div>
</div>
</div>

  <div class="col-sm-4">
<div class="well">
        <div align="left";>
<h4>Delete Store</h4>
<form action="store_delete.php" method="post">
Store ID:  <input type="text" name="store_id"><BR><br>
<input type="Submit">
</form>
</div>
    </div>
  </div>
  <div class="col-sm-4">
<div class="well">
        <div align="left";>
<h4>Edit Item</h4>
<form action="store_edit.php" method="post">
ID of Store to Edit:  <input type="text" name="store_id"><BR><br>
New Street Address:  <input type="text" name="street_address"><BR><br>
New City: <input type="text" name="city"><br><br>
New Zip: <input type="text" name="zip"><br><br>
<input type="Submit">
</form>
    </div>
    </div>
  </div>
<br>
</body>
<br>
</div>
<div class="row">
<div align="center">
<h4>All Stores</h4>
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

$sql = mysqli_query($con, "SELECT * FROM Store");
echo "<table class='table justify-content-center'>";
echo "<tr><td><b style='color:#000080;'>STORE ID</b ></td><td><b style='color:#000080;'>STREET ADDRESS</b></td><td><b style='color:#000080;'>CITY</b></td><td><b style='color:#000080;'>ZIP</b></td></tr>";

//echo "<table border=1><th>STORE ID</th><th>STREET ADDRESS</th><th>CITY</th><th>ZIP</th>\n";
	while($row = mysqli_fetch_array($sql)) {
		echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
	}
echo "</table>";
mysqli_close($con);
?>
</div>
</table>
</div>
</div>
</body>
</html>

