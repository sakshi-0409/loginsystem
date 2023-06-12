<?php
include "partials/_nav.php";
require "partials/_dbconnect.php";
    
   
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `products` WHERE `products`.`id` = $id";

    $result = mysqli_query($conn, $sql);
    if($result) {
      header('location: welcome.php');
    }
}
