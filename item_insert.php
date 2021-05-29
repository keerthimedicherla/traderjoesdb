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
        $query = mysqli_query($con, "SELECT * FROM Store WHERE store_id=('$_POST[store_id]')");
        if (mysqli_num_rows($query) == 0)
        {
            die('Error: No such store ID exists');
        }
        $sql="INSERT INTO Item (barcode, name, price, weight)
        VALUES
        ('$_POST[barcode]','$_POST[name]','$_POST[price]','$_POST[weight]')";
        if (!mysqli_query($con,$sql))
        {
        die('Error: ' . mysqli_error($con));
        }
        echo "1 record added";

	$sql2="INSERT INTO contains (store_id, barcode)
        VALUES
        ('$_POST[store_id]','$_POST[barcode]')";
        if (!mysqli_query($con,$sql2))
        {
        die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
?>
