<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Q5</title>
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

            echo "Q5 -  <br><br>";


                $sql = "SELECT products.productName , SUM(orderdetails.quantityOrdered),SUM(orderdetails.quantityOrdered*orderdetails.priceEach) FROM products JOIN orderdetails on products.productCode = orderdetails.productCode GROUP BY products.productName ORDER BY SUM(orderdetails.quantityOrdered) DESC limit 20";
                $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Product Name  : " . $row["productName"]. "  -  Quantity :  " . $row["SUM(orderdetails.quantityOrdered)"]. "  -  Gaining :  " . $row["SUM(orderdetails.quantityOrdered*orderdetails.priceEach)"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }

            ?>

                <br>
                <br>

                <form action="q6.php" method="post">
                    <input type="submit" name="q6" value="Next">
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