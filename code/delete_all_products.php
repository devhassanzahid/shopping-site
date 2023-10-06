<?php
include("connection.php");
$sql = "DELETE FROM products";
if (mysqli_query($conn, $sql)) {
    header("location:dashboard.php");
} else {
    echo "Error Occured!";
}
