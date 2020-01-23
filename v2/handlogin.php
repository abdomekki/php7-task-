<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <!-- php Side -->
    <?php
        session_start();
        $username=$_POST["username"];
        $Password=$_POST["password"];
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$Password;

        header( "refresh:2;url=Home.php" );// refresh and redirct to home Page 


        echo "You will Redirect to Home page in 2 sec ".$username . " ,you can go to <a href='Home.php'>Here </a>  to Home page.. ";

    ?>


</body>
</html>