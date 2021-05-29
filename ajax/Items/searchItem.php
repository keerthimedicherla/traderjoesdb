<?php
    require "dbutil.php";
    $conn = DbUtil::loginConnection();

    $stmt = $conn->stmt_init();

    if($stmt->prepare("select * from Item where name like ?") or die(mysqli_error($conn))) {
        $param = $_GET['item_search'] . '%';
        $stmt->bind_param(s, $param);
        $stmt->execute();
        $stmt->bind_result($barcode, $name, $price, $weight);
        echo "<table border=1><th>Barcode</th><th>Name</th><th>Price</th><th>Weight</th>\n";
        while($stmt->fetch()){
            echo "<tr><td>$barcode</td><td>$name</td><td>$price</td><td>$weight</td></tr>";
        }
        echo "</table>";

        $stmt->close();
    }
    $conn->close();
?>
