<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Q8</title>
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

            echo "Q8 -  <br><br>";

            ?>

            <form action="" method="post">
                <input type="number" name="get_num" placeholder="Enter Number between 100 to 5000..." required>
                <br>
                <input type="submit" name="get_n" value="Go">
            </form>
        <?php

                if (isset($_POST["get_n"])) {
                    # code...
                    $keys=$_POST["get_num"];
                    $sql = "SELECT * FROM `products` WHERE quantityInStock > $keys";
                     $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo  $row['productName'] . $row['quantityInStock'] . "<br/>";
                        }
                    } else {
                        echo "0 results";
                    }

                }


            ?>

                <br>
                <br>

                <form action="q9.php" method="post">
                    <input type="submit" name="q9" value="Next">
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