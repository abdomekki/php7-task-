<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Q2</title>
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

            echo "Q2 -  <br>";

            ?>

                <form action="" method="post">
                        <input type="number" name="c_id" placeholder="Enter Customer ID Here.." required>
                        <br>
                        <input type="submit" name="getid" value="Go">
                    </form>
            <?php

                if (isset($_POST["getid"])) {
                    # code...
                    $id=$_POST["c_id"];
                    $sql = "SELECT * FROM customers where customerNumber = $id ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "ID : " . $row["customerNumber"]. "    -  Name : " . $row["customerName"]. "  -  Phone:  " . $row["phone"]. "  -  address:  " . $row["addressLine1"]. "  -  City:  " . $row["city"]. "  -  Couuntry:  " . $row["country"]. "<br>";
                        }
                    } else {
                        echo "0 results";
                    }

                }

            ?>

                <br>
                <br>

                <form action="q3.php" method="post">
                    <input type="submit" name="q3" value="Next">
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