<?php
include("connection.php");
$username = $_POST['username'];
$password = $_POST['password'];
$username_error = $password_error = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!(empty($_POST["username"]["password"]))) {
        $username_error = "Username is required!";
    } else {
    }
}
$sql = "INSERT INTO user_logins(username,password) VALUES('$username','$password')";
if (mysqli_query($conn, $sql)) {
    echo "User Login Successfully!";
    // header("login.php");
} else {
    echo "Error Occured!";
}
mysqli_close($conn);

# to remove

mysqli_fetch_assoc($test);
if ($test) {
    mysqli_fetch_assoc($var);
}
