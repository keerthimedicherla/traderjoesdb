<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = mysqli_query($con, "SELECT * FROM Recipe");

echo "<table border=1><th>NAME</th><th>CUISINE</th>\n";
while($recipe = mysqli_fetch_array($sql)){
  echo "<tr><td>$recipe[0]</td><td>$recipe[1]</td></tr>";
}

mysqli_close($con);
?>


