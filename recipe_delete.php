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

        $query = mysqli_query($con, "SELECT * FROM Recipe WHERE name=('$_POST[name]')");
    if (mysqli_num_rows($query) == 0)
    {
        die('Error: No such record exists');
    }

        $sql="DELETE FROM Recipe WHERE name = ('$_POST[name]')";
        if (!mysqli_query($con,$sql))
        {
            die('Error: ' . mysqli_error($con));
        }
    echo "1 record deleted";

        $query3 = mysqli_query($con, "SELECT * FROM makes WHERE name=('$_POST[name]'\
)");
        $sql3="DELETE FROM makes WHERE name = ('$_POST[name]')";
        if (!mysqli_query($con,$sql3))
        {
            die('Error: ' . mysqli_error($con));
        }


     $query2 = mysqli_query($con, "SELECT * FROM Recipe_Ingredients WHERE name=('$_P\
OST[name]')");
        $sql2="DELETE FROM Recipe_Ingredients WHERE name = ('$_POST[name]')";
        if (!mysqli_query($con,$sql2))
        {
            die('Error: ' . mysqli_error($con));
        }

    
        mysqli_close($con);


?>
