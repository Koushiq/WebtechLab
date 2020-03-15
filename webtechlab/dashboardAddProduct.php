<?php
    session_start();
    $username="";
    $id="";
    $name="";
    $price="";
    $quantity="";
    $query="select id from product order by id desc;";
    $err="";
    $conn = new mysqli("localhost", "root", "","shop");
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
    if(isset($_POST['add']))
    {
        if( !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['quantity']))
        {
            $name=htmlspecialchars($_POST['name']);
            $price=htmlspecialchars($_POST['price']);
            $quantity=htmlspecialchars($_POST['quantity']);
            $result = $conn->query($query);
            if ($result->num_rows > 0)
            {
                echo "here";
                $row=$result->fetch_assoc();
                $id=$row['id'];
                $id=$id+1;
            }
            else
            {
                $id=1;
            }
            $sql = "INSERT INTO product (id,name, price, quantity) VALUES ('".$id."', '".$name."', '".$price."','".$quantity."')";
            if ($conn->query($sql) === TRUE)
            {
                echo "New record created successfully";
            } 
            else
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
        else
        {
            $err="Can't have empty fields";
        }

    }
   
// Check connection
   
?>



<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <h2>Welcome <?php echo $username?></h2>
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
                <tr>
                    <td>
                        name
                        <input type="text" name="name">
                    </td>
                    <td>
                        Price
                        <input type="text" name="price" >
                    </td>
                    <td>
                        Quantity
                        <input type="text" name="quantity" >
                    </td>
                    <td>
                        <input type="submit" name="add" value="Add">
                    </td>
                </tr>
            </table>

        </form>
        <?php echo $err ?>
    </body>
</html>