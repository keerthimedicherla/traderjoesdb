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
  <h3>Recipe Information</h3>
</div>

<div class="row">
<body>

      <div class="col-sm-6">
        <div class="well">
        <div align="left";>
          <h4>Delete Recipe</h4>
<form action="recipe_delete.php" method="post">
Name of Recipe to Delete: <input type="text" name="name"><br><br>
<input type="Submit">
</form>
        </div>
        </form>
        </div>
        </div>

<br>


      <div class="col-sm-6">
        <div class="well">
        <div align="left";>
          	<h4>Edit Recipe</h4>
<form action="recipe_edit.php" method="post">
Name of Recipe to Edit:  <input type="text" name="name"><BR><br>
New Cuisine: <input type="text" name="cuisine"><br><br>
New Ingredients: <input type="text" name="ingredients"><br><br>
<input type="Submit">
</form>
        </div>
        </form>
        </div>
        </div>
  
</body>
</div>


<br>

<div align="center">
<div class ="row">
<h4>All Recipes</h4>
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

$sql = mysqli_query($con, "SELECT * FROM Recipe NATURAL JOIN Recipe_Ingredients");
echo "<table class='table justify-content-center'>";
echo "<tr><td><b style='color:#000080;'>_ NAME</b ></td><td><b style='color:#000080;'>CUISINE</b></td><td><b style='color:#000080;'>INGREDIENTS</b></td></tr>";

//echo "<table border=1><th>NAME</th><th>CUISINE</th><th>INGREDIENTS</th>\n";
	while($row = mysqli_fetch_array($sql)) {
		echo "<tr><td>_ $row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
	}
echo "</table>";
mysqli_close($con);
?>
</table>
</div>
</div>
</html>
