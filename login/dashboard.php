<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
?>


<Doctype html>

<html>
    <head>

    </head>

    <body>

            <h1>Welcome to Dashboard</h1>
            <?php echo "user".$_SESSION['username']?>

            <form method="post" action="logout.php">

                <input type="submit" value="logout" >

            </form>

    </body>
</html>