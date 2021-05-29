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

        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $query = mysqli_query($con, "SELECT * FROM Supplier WHERE id=('$_POST[id]')");
        if (mysqli_num_rows($query) == 0)
        {
            die('Error: No such supplier ID exists');
        }
        
        $sql="INSERT INTO Store (store_id, street_address, city, zip)
        VALUES
        ('$_POST[store_id]','$_POST[street_address]','$_POST[city]','$_POST[zip]')";
        if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";

	 $sql2="INSERT INTO supplies (id, store_id)
        VALUES
        ('$_POST[id]','$_POST[store_id]')";
        if (!mysqli_query($con,$sql2))
        {
        die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
?>
