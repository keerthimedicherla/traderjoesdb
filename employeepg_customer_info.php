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
  <h3>Customer Information</h3>

    <div class="row">


           <div class="col-sm-6">
	    <div class="well">
                <div align="left";>
		<h4>Delete Customer</h4>
		<form action="customer_delete.php" method="post">
		ID:  <input type="text" name="id"><BR><br>
		<input type="Submit">
		</form>
		</div>
            </div>
          </div>
          <div class="col-sm-6">
	    <div class="well">
                <div align="left";>
		<h4>Edit Customer</h4>
		<form action="customer_edit.php" method="post">
		ID of Customer to Edit:  <input type="text" name="id"><BR><br>
                New Name:  <input type="text" name="name"><BR><br>
                New Is_Member Value:  <input type="text" name="is_member"><BR><br>
		<input type="Submit">
		</form>
		</div>
            </div>
          </div>
	
  <br>
</body>

<br>
<div align="center">
<h4>All Customers</h4>
<table>
<?php
        require_once('./library.php');
        $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        if (mysqli_connect_errno()) {
                echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
                return null;
        }
        $sql="SELECT * FROM Customer";
        $result = mysqli_query($con,$sql);
	echo "<table class='table justify-content-center'>";
	echo "<tr><td><b style='color:#000080;'>ID</b ></td><td><b style='color:#000080;'>NAME</b></td><td><b style='color:#000080;'>IS_MEMBER</b></td></tr>";

        //echo "<table border=1><th>ID</th><th>NAME</th><th>IS_MEMBER</th>\n";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
	}
	echo "</table>";
        mysqli_close($con);
?>
</div>
</table>
</div>
</body>
</html>

