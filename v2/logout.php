<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <?php
        session_start();

        session_destroy();
        
        header( "refresh:2;url=index.php" );
        
        echo "You will Redirect to Home page in 2 sec , you can go to <a href='index.php'>Here </a> to login page ";
    
    ?>


</body>
</html>