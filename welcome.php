<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
if ($_SESSION['username'] == "sakshi") {
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
    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th title="Product_id" scope="col">Product_id</th>
                    <th title="Product_name" scope="col">Product_name</th>
                    <th title="Product_des" scope="col">Product_des</th>
                    <th title="Price" scope="col">Price</th>
                    <th title="Image" scope="col">Image</th>
                    <th title="Last_updated" scope="col">Last_updated</th>
                    <th title="Action" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $id = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?=$id?></td>
                        <td title="<?= $row['product_id'] ?>"><?= $row['product_id'] ?></td>
                        <td title="<?= $row['product_name'] ?>"><?= $row['product_name'] ?></td>
                        <td title="<?= $row['product_des'] ?>"><?= $row['product_des'] ?></td>
                        <td title="<?= $row['price'] ?>"><?= $row['price'] ?></td>
                        <td><img height = "50" width="50" title="Product_image" src="<?= $row['image'] ?>" alt=""></td>
                        <td title="<?= $row['dt'] ?>"><?= $row['dt'] ?></td>
                        <td><a title="Edit" href="edit.php?id=<?php echo $row['id']; ?>&&product_id=<?php echo $row['product_id']; ?>&&product_name=<?php echo $row['product_name']; ?>&&product_des=<?php echo $row['product_des']; ?>&&price=<?php echo $row['price']; ?>&&image=<?php echo $row['image']; ?>" class="btn btn-primary">Edit</a>
                            <a title="Delete" href="delete.php?id=<?php echo $row['id']; ?>&&product_id=<?php echo $row['product_id']; ?>&&product_name=<?php echo $row['product_name']; ?>&&product_des=<?php echo $row['product_des']; ?>&&price=<?php echo $row['price']; ?> &&image=<?php echo $row['image']; ?>" class="btn btn-primary">Delete</a>
                        </td>
                    </tr>
                    <?php
            $id++;
        }
    }
    ?>
    </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script> let table = new DataTable('#myTable');</script>
