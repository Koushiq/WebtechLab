<?php
    session_start();
    $conn="";
    $query="";
    if(!isset($_SESSION['username']))
    {
        session_destroy();
        header("location:logout.php");
    }
    if(isset($_GET['id']))
    {
        $conn = new mysqli("localhost", "root", "","shop");
        $query= "select * from product where id = '".$_GET['id']."' ";
        $result = $conn->query($query);
            if ($result->num_rows > 0)
            {
               while($row=$result->fetch_assoc())
               {
                echo "product id = ".$row['id'];
                echo "<br>";
                echo "product name = ".$row['name'];
                echo "<br>";
                echo "product quantity = ".$row['quantity'];
                echo "<br>";
                echo "product price = ".$row['price'];
                echo "<br>";
               }
            }
    }
   
?>