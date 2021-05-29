<?php
    require "dbutil.php";
    $conn = DbUtil::loginConnection();

    $stmt = $conn->stmt_init();

    if($stmt->prepare("select * from Store where city like ?") or die(mysqli_error($conn))) {
        $param = $_GET['store_search'] . '%';
        $stmt->bind_param(s, $param);
        $stmt->execute();
        $stmt->bind_result($store_id, $street_address, $city, $zip);
        echo "<table class='table justify-content-center'>";
        echo "<tr><td><b style='color:#000080;'>STORE ID</b ></td><td><b style='color:#000080;'>ADDRESS</b></td><td><b style='color:#000080;'>CITY</b></td><td><b style='color:#000080;'>ZIP CODE</b></td></tr>";
        while($stmt->fetch()){
            echo "<tr><td>$store_id</td><td>$street_address</td><td>$city</td><td>$zip</td></tr>";
        }
        echo "</table>";

        $stmt->close();
    }
    $conn->close();
?>
