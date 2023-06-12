<?php
include "partials/_nav.php";
require "partials/_dbconnect.php";
if (isset($_POST['submit'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_des = $_POST['product_des'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

    

    $sql = "INSERT INTO `products`( `product_id`, `product_name`, `product_des`, `price`, `image`) VALUES ('$product_id','$product_name','$product_des','$price','$image')";

    $result = mysqli_query($conn,$sql);    


    if($result){
        $insert = true;
        // echo 
        $status = "successfully inserted";
        header("Location:http://localhost/loginsystem/welcome.php");
        exit;
    }
    else{
        echo "error: $sql <br> $conn->error ";
    }
    // echo $sql;
    $conn->close();
    
}
