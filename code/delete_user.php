<?php
include("connection.php");
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "DELETE FROM user_logins WHERE username=$username AND password=$password";
if (mysqli_query($conn, $sql)) {
    echo "User deleted!";
} else {
    echo "Operation failed!";
}
