<title>logout</title>
<?php
require "partials/_nav.php";

session_start();
session_unset();
session_destroy();

header("location: login.php");
exit;


?>