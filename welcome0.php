<?php
require "partials/_nav.php";
require "partials/_dbconnect.php";


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location:login.php");
  exit();
}

?>
<title>Welcome - <?= $_SESSION['username']; ?></title>


<style>
  a,
  button {
    text-decoration: none;
  }

  .product-card {
    background-color: lightcyan;
  }

  .product-card:hover {
    background-color: #dcf7f7;
    border: 1px solid darkcyan;
  }
</style>



<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Welcome!!</strong> <?= $_SESSION['username']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
if ($_SESSION['username'] == "admin") {
?>
  <div class="container d-block text-center my-2 ">
    <h4>Here is the list of all of your products.</h4>
    <a title="Add more product" href="add_product.php"><button class="btn  m-3 ">Add more product</button></a>
  </div>
  <?php

  if (!$conn) {
    die("error" . $mysqli_connect_error());
  }
  // else{
  //     echo "success";
  // }
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_des = $_POST['product_des'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $dt = $_POST['dt'];
  }
  $sql = "SELECT * FROM products";
  $result = mysqli_query($conn, $sql);
  ?>
  <div class="container ">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="row my-2  ">
        <div class="row-sm-6  ">
          <div class="card ">
            <div class="card-body product-card">

              <h5 class="card-title" title="product id <?= $row['product_id'] ?>">Product id - <?= $row['product_id'] ?></h5>

              <h4 class="card-title" title="<?= $row['product_name'] ?>"><?= $row['product_name'] ?></h4>

              <p class="card-text" title="<?= $row['product_des'] ?>"><?= $row['product_des'] ?></p>

              <img src=<?= $row['image'] ?> alt=""><br>

              <p class="card-text" title="<?= $row['price'] ?>"><?= $row['price'] ?></p>

              <a title="Edit" href="edit.php?id=<?php echo $row['id']; ?>&&product_id=<?php echo $row['product_id']; ?>&&product_name=<?php echo $row['product_name']; ?>&&product_des=<?php echo $row['product_des']; ?>&&price=<?php echo $row['price']; ?>&&image=<?php echo $row['image']; ?>" class="btn btn-primary">Edit</a>

              <a title="Delete" href="delete.php?id=<?php echo $row['id']; ?>&&product_id=<?php echo $row['product_id']; ?>&&product_name=<?php echo $row['product_name']; ?>&&product_des=<?php echo $row['product_des']; ?>&&price=<?php echo $row['price']; ?>&&image=<?php echo $row['image']; ?>" class="btn btn-primary">Delete</a>
              <p title="Last updated - <?= $row['dt']; ?>" class="card-text">Last updated - <?= $row['dt']; ?></p>
            </div>
          </div>
        </div>
      </div>
  <?php
    }
  }
  ?>