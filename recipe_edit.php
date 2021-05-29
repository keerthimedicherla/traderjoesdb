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

        $sql2="UPDATE Recipe SET cuisine= ('$_POST[cuisine]') WHERE name = ('$_POST[name]')";
        if (!mysqli_query($con,$sql2))
        {
            die('Error: ' . mysqli_error($con));
        }
    echo "1 record edited";


    $sql4="DELETE FROM Recipe_Ingredients WHERE name = ('$_POST[name]')";
    if (!mysqli_query($con,$sql4))
    {
        die('Error:sql4' . mysqli_error($con));
    }

    $str = $_POST['ingredients'];
    $piece = explode(',',$str);
    foreach($piece as $substr){
        $sql5 = "INSERT INTO Recipe_Ingredients (name, ingredients) VALUES ('$_POST[name]','$substr')";
        if (!mysqli_query($con,$sql5))
        {
        die('Error:sql5' . mysqli_error($con));
        }
    }

    mysqli_close($con);
       
?>
