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

    $query = mysqli_query($con, "SELECT * FROM Employee WHERE id=('$_POST[id]')");
    if (mysqli_num_rows($query) == 0)
    {
        die('Error: No such record exists');
    }

        $sql="UPDATE Employee SET years_of_experience= ('$_POST[years_of_experience]') WHERE id = ('$_POST[id]')";
        if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }
    echo "1 record edited";
        mysqli_close($con);
?>
