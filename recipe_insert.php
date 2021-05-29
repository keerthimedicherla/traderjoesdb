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
    die('Error sql1: ' . $_SESSION['role'].  mysqli_error($con));
    }
    echo "1 record added";

    $str = $_POST['ingredients'];
    $piece = explode(',',$str);
    foreach($piece as $substr){
        $sql2 = "INSERT INTO Recipe_Ingredients (name, ingredients) VALUES ('$_POST[name]','$substr\
    ')";
            if (!mysqli_query($con,$sql2))
            {
            die('Error:sql2' . mysqli_error($con));
            }
    }

    $sql3="INSERT INTO makes (name, id)
    VALUES
    ('$_POST[name]','$_POST[id]')";

    if (!mysqli_query($con,$sql3))
    {
    die('Error:sql3' . mysqli_error($con));
    }
?>
