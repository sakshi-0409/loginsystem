<?php
include "partials/_nav.php";
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
<div class="container my-5">
  <form action="post.php" method="post">
    <div class="row">
      <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
          <div class="card-body box">
            <p>Add new product :-</p>
            <input class="card-title" type="text" required placeholder="Enter your new product id" name="product_id" id="product_id"><br>
            <input class="card-title" type="text" required placeholder="Enter your new product name" name="product_name" id="product_name"><br>
            <input class="card-text" type="text" required placeholder="Enter your new product despription" name="product_des" id="product_des"><br>
            <input class="card-text" type="number" required placeholder="Enter product price" name="price" id="price"><br>
            <input type="file" placeholder="Insert product image" name="image" id="image"  alt="product image"><br>
            <button type="submit" name="submit" class="btn">Save</button>
            <button class="btn "><a class="cancel" href="welcome.php"> Cancel </a></button>
          </div>
        </div>
      </div>
  </form>
</div>