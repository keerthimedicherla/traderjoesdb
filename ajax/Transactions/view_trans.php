<?php
        require "dbutil.php";
        $db = DbUtil::loginConnection();

        $stmt = $db->stmt_init();

        if($stmt->prepare("select * from Transaction where transaction_id like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['searchTransaction_ID'] . '%';
                $stmt->bind_param(s, $searchString);
                $stmt->execute();
                $stmt->bind_result($transaction_id, $id, $amount);
                echo "<table border=1><th>transaction_id</th><th>id</th><th>amount</th>\n";
                while($stmt->fetch()) {
                        echo "<tr><td>$transaction_id</td><td>$id</td><td>$amount</td></tr>";
                }
                echo "</table>";

                $stmt->close();
        }

        $db->close();


?>
