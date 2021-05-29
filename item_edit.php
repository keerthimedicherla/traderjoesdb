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

    $query = mysqli_query($con, "SELECT * FROM Item WHERE barcode=('$_POST[barcode]')");
    if (mysqli_num_rows($query) == 0)
    {
        die('Error: No such record exists');
    }

        $sql="UPDATE Item SET price= ('$_POST[price]') WHERE barcode = ('$_POST[barcode]')";
        $sql2="UPDATE Item SET name= ('$_POST[name]') WHERE barcode = ('$_POST[barcode]')";
        $sql3="UPDATE Item SET weight= ('$_POST[weight]') WHERE barcode = ('$_POST[barcode]')";

        if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }
        if (!mysqli_query($con,$sql2))
        {
            die('Error: ' . mysqli_error($con));
        }
        if (!mysqli_query($con,$sql3))
        {
            die('Error: ' . mysqli_error($con));
        }

    echo "1 record edited";
        mysqli_close($con);
?>
