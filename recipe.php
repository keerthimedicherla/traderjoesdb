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
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $sql="INSERT INTO Recipe (name, cuisine)
 VALUES
 ('$_POST[name]','$_POST[cuisine]')";
 
if (!mysqli_query($con,$sql))
 {
 die('Error: ' . mysqli_error($con));
}
echo "1 record added";

 $sql2="INSERT INTO Recipe_Ingredients (name, ingredients)
 VALUES
('$_POST[name]','$_POST[ingredients]')"; 

if (!mysqli_query($con,$sql2))
 {  
 die('Error: ' . mysqli_error($con));
 }  
 echo "1 record added"; // Output to user
?>
