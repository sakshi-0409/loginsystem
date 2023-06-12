<title>login</title>
<?php
require "partials/_nav.php";
?>

<?php
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require "partials/_dbconnect.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users where username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
    } else {
        $showError = true;
    }
}

if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!!</strong> You have been logged in.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Opps!!</strong> Incorrect username or password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

?>

<!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!!</strong> Your account has been created. Now login to your account.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->
<div class="container">
    <h3>Login to our Website</h3>
    <form action="/loginsystem/login.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" required class="form-control" placeholder="Enter username" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" required class="form-control" placeholder="Enter password" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">login</button>
    </form>
</div>