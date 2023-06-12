<?php
include "partials/_nav.php";
require "partials/_dbconnect.php";
$id = $_REQUEST['id'];
$product_id = $_REQUEST['product_id'];
$product_name = $_REQUEST['product_name'];
$product_des = $_REQUEST['product_des'];
$price = $_REQUEST['price'];
// $image = $_REQUEST['image'];

if (isset($_POST["submit"])) {
  $id = $_REQUEST['id'];
  $product_id = $_REQUEST['product_id'];
  $product_name = $_REQUEST['product_name'];
  $product_des = $_REQUEST['product_des'];
  $price = $_REQUEST['price'];
  // $image = $_REQUEST['image'];

 $sql = "UPDATE `products` SET `product_id` = '$product_id', `product_name` = '$product_name', `product_des` = '$product_des', `price` = '$price' WHERE id = $id";
 

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header('location: welcome.php');
  }
}

?>
<style>
  input {
    padding: 3px;
    width: 50%;
    margin: 2px;
    border: 2px solid darkcyan;
    border-radius: 5px;
  }

  input:hover {
    background-color: lightcyan;
    padding: 4px;
    border: 3px solid darkcyan;
  }

  .box {
    border: 2px solid darkcyan;
    border-radius: 5px;
  }
  .cancel{
    text-decoration: none;
    color: rgb(174, 235, 235);
  }
  .cancel:hover{
    color: rgb(3, 65, 65);;
  }
</style>

<div class="container">
  <form action="edit.php" method="post">
    <div class="row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
          <div class="card-body">
            <p>Edit product details :-</p>
            <input class="card-title" type="text" placeholder="enter your new product id" hidden name="id" id="id" value="<?= $id ?>"><br>

            <input class="card-title" type="text" placeholder="enter your new product id" name="product_id" id="product_id" value="<?= $product_id ?>"><br>
            <input class="card-title" type="text" placeholder="enter your new product name" name="product_name" id="product_name" value="<?= $product_name ?>"><br>
            <input class="card-text" type="text" placeholder="enter your new product despription" name="product_des" id="product_des" value="<?= $product_des ?>"><br>
            <input class="card-text" type="number" placeholder="enter product price" name="price" id="price" value="<?= $price ?>"><br>
            <!-- <input type="file" name="image" value="<?= $image ?>" src="" alt=""><br> -->
            <button type="submit" name="submit" class="btn">update</button>
            <button class="btn "><a class="cancel" href="welcome.php"> Cancel </a></button>
          </div>
        </div>
      </div>
  </form>
</div>