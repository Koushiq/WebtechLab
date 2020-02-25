<?php
    session_start();
?>


<Doctype html>

<html>
    <head>
    </head>

    <body>
            <?php
                $username="";
                $password="";
                $errusername="";
                $errpassword="";
                $loc="";
                $usernameSet=false;
                $passwordSet=false;
                $xml=simplexml_load_file("cred.xml");
                if(isset($_POST['process']))
                {
                    
                    if(!empty($_POST['username']))
                    {
                        $username=$_POST['username'];
                        $_SESSION['username']=$username;
                        $usernameSet=true;
                    }
                    else
                    {
                        $errusername="Enter Username";
                        
                    }
                    if(!empty($_POST['password']))
                    {
                        $password=$_POST['password'];
                        $passwordSet=true;
                    }
                    else
                    {  
                        $errpassword="Enter Password";
                    }
                }
                if($usernameSet && $passwordSet)
                {
                    for ($i=0;$i<count($xml->admin->username);$i++)
                    {
                        if($username==$xml->admin->username[$i] && $password==$xml->admin->password[$i])
                        {
                            $loc="dashboard.php";
                            break;
                        }
                    }
                }

            ?>


            <form method="post" action=<?php echo $loc; ?>>
                    <h3>Login!</h3>
                    <input type="text" placeholer="username" name="username">
                    <br>
                    <?php echo $errusername; ?>
                    <br>
                    <input type="password" placeholer="password" name="password">
                    <br>
                    <?php echo $errpassword; ?>
                    <br>
                    <input type="submit" value="goto dashboard" name="process">
            </form>
    </body>
</html>