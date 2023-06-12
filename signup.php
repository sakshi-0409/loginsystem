<title>Signup</title>
<?php require "partials/_nav.php"; ?>


<?php
$showAlert = false;
$passError = false;
$exists = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "partials/_dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exists = false;
    $existSql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $exists = true;
    } else {
        if (($password == $cpassword)) {
            $hash =
                $sql = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("location: login.php");
            }
        } else {
            $passError = true;
        }
    }
}
if ($passError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!!</strong>Mismatch Password.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!!</strong> Your account has been created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($exists) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!!</strong> Username already exists.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>



<div class="container">
    <h3>SignUp to our Website</h3>
    <form action="/loginsystem/signup.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" required class="form-control" id="username" placeholder="Enter username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" required class="form-control" id="password" placeholder="Enter password" name="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm password</label>
            <input type="password" required class="form-control" placeholder="Repeat password" id="cpassword" name="cpassword">
            <div id="emailHelp" class="form-text">Please make sure to type same password.</div>
        </div>
        <button type="submit" class="btn btn-primary">SignUp</button>
    </form>
</div>