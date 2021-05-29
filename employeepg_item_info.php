

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
  <h3>Item Information</h3>
  <div class="row">

  <div class="col-sm-4">
      <div class="well">
          <div align="left">
          <h4>Add Item</h4>
          </div>
  <div align="left";>
  <form action="item_insert.php" method="post">
  Barcode:  <input type="text" name="barcode"><BR><br>
Price:  <input type="text" name="price"><BR><br>
Name: <input type="text" name="name"><br><br>
Weight: <input type="text" name="weight"><br><br>
Store ID (item location): <input type="text" name="store_id"><br><br>
  <input type="Submit">
  </form>
  </div>
  </div>
  </div>

    <div class="col-sm-4">
  <div class="well">
          <div align="left";>
  <h4>Delete Item</h4>
  <form action="item_delete.php" method="post">
  Barcode:  <input type="text" name="barcode"><BR><br>
  <input type="Submit">
  </form>
  </div>
      </div>
    </div>
    <div class="col-sm-4">
  <div class="well">
          <div align="left";>
  <h4>Edit Item</h4>
  <form action="item_edit.php" method="post">
    Barcode of Item to Edit:  <input type="text" name="barcode"><BR><br>
  New Price:  <input type="text" name="price"><BR><br>
  New Name: <input type="text" name="name"><br><br>
  New Weight: <input type="text" name="weight"><br><br>
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
<h4>All Items</h4>
<table>
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

$sql = mysqli_query($con, "SELECT * FROM Item");

echo "<table class='table justify-content-center'>";
echo "<tr><td><b style='color:#000080;'>BARCODE</b ></td><td><b style='color:#000080;'>PRICE</b></td><td><b style='color:#000080;'>NAME</b></td><td><b style='color:#000080;'>WEIGHT</b></td></tr>";

//echo "<table border=1><th>BARCODE</th><th>PRICE</th><th>NAME</th><th>WEIGHT</th>\n";
	while($row = mysqli_fetch_array($sql)) {
		echo "<tr><td>$row[0]</td><td>$row[2]</td><td>$row[1]</td><td>$row[3]</td></tr>";
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
