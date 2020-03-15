<?php
    session_start();
    $username="";
    if(isset($_SESSION['username']))
    {
        $username=$_SESSION['username'];
    }
    else
    {
        header("location:logout.php");
    }

    if(isset($_POST['logout']))
    {
        header("location:logout.php");
    }
    if(isset($_POST['allProduct']))
    {
        header("location:dashboard.php");
    }
    if(isset($_POST['addProduct']))
    {
        header("location:dashboardAddProduct.php");
    }
    $conn = new mysqli("localhost", "root", "","shop");
    $query="";
    $err="";
    $query="select * from product order by id;";
    $row="";
    $result = $conn->query($query);
    $id="";
    $name="";
    $price="";
    $quantity="";
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
?>



<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h2>Welcome <?php echo $username; ?></h2>
        <form method="post" action="">
            <table>
                <tr>
                    <td>
                        <input type="submit" value="All Product" name="allProduct">
                    </td>
                    <td>
                            <input type="submit" value="Add Product" name="addProduct">
                    </td>
                    <td>
                            <input type="submit" value="Logout" name="logout">
                    </td>
                </tr>
                
            </table>
        </form>
        <form action="details.php" method="get">
            <table border=1>
               <th>
                   id
               </th>
               <th>
                    name
                </th>
                <th>
                    price
                </th>
                <th>
                    quantity
                </th>
                <th>
                    action
                </th>
                <th>
                    action
                </th>

              
                    <?php
                        while($row=$result->fetch_assoc())
                        {
                            $id=$row['id'];
                            $name=$row['name'];
                            $price=$row['price'];
                            $quantity=$row['quantity'];

                            echo ' 
                            <tr>
                            <td><a href="details.php?id='.$id.'" >'.$id.'</td>
                            <td><a href="details.php?id='.$id.'">'.$name.'</td>
                            <td><a href="details.php?id='.$id.'">'.$price.'</td>
                            <td><a href="details.php?id='.$id.'">'.$quantity.'</td>
                            <td><a href="#"> edit</td>
                            <td><a href="delete.php?details.php?id='.$id.'" > delete</td>
                            </tr> 
                            ';

                        }
                        
                    ?>
               
               

            </table>
        </form>
    </body>
</html>