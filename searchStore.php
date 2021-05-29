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

    $stmt = $conn->stmt_init();

    if($stmt->prepare("select * from Store where city like ?") or die(mysqli_error($conn))) {
        $param = $_GET['store_search'] . '%';
        $stmt->bind_param(s, $param);
        $stmt->execute();
        $stmt->bind_result($store_id, $street_address, $city, $zip);
        echo "<table border=1><th>Store ID</th><th>Address</th><th>City</th><th>Zip</th>\n";
        while($stmt->fetch()){
            echo "<tr><td>$store_id</td><td>$street_address</td><td>$city</td><td>$zip</td></tr>";
        }
        echo "</table>";

        $stmt->close();
    }
    $conn->close();
?>
