<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Q4</title>
</head>
<body>
    
    <!-- php side -->
    <?php

        session_start();
        include "connect_db.php";
        

        if(isset($_SESSION["username"]))
        {
            $user=$_SESSION["username"];
            $pass=$_SESSION["password"];

        $sql_check = "select customerName FROM customers WHERE customerName='$user' AND password=$pass";
        $result_c = $conn->query($sql_check);
        if ($result_c->num_rows > 0) {
            // output data of each row

            echo "Q4 -  <br><br>";


                    $sql = "SELECT customers.customerName , COUNT(orders.orderNumber) FROM customers JOIN orders on customers.customerNumber = orders.customerNumber GROUP BY customers.customerName ORDER by customers.customerName ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo "Name : " . $row["customerName"]. "  -  Orders:  " . $row["COUNT(orders.orderNumber)"]. "<br>";
                    }
                    } else {
                    echo "0 results";
                    }

            ?>

                <br>
                <br>

                <form action="q5.php" method="post">
                    <input type="submit" name="q5" value="Next">
                </form>

                <br>
                <br>

                <form action="logout.php" method="post">
                    <input type="submit" name="logout" value="LogOut">
                </form>

            <?php
            
        } else {
            echo "Try again please....<br>";
        }

    }

    else {
        # code...


        echo "Go to <a href='index.php'>login </a> page ";
    }

        

    ?>




</body>
</html>