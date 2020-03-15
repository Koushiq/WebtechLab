
<?php
    session_start();
    $username="";
    $password="";
    $conn = new mysqli("localhost", "root", "","shop");
    $query="";
    $err="";
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    if(isset($_POST['login']))
    {
       
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $username=htmlspecialchars($_POST['username']);
            $password=htmlspecialchars($_POST['password']);
            
            $query="select username, password from users where username= '".$username."' and password = '".$password."' ;";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            if ($result->num_rows > 0)
            {
                if($username==$row['username'] && $password==$row['password'])
                {
                    $_SESSION['username']=$username;
                    header("location:dashboardAddProduct.php");
                }
                else
                {
                    $err="incorrect credentials";
                   
                }
            } 
            else 
            {
               $err="username not found";
            }
        }
        else
        {
            $err="Field can't be empty";
        }

    }


?>


<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="">
            <table>
                <tr>
                    <td>
                        <label>Username</label>
                    </td>
                    <td><input type=" text" name="username"></td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>

                <tr >
                    <td>  
                        <input type="submit" name="login" value="login">
                    </td>
                </tr>
                <tr>
                    <?php echo $err?>
                </tr>
            </table>
        </form>
    </body>
</html>